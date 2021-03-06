<?php
/**
 * Helper utilities for working with Twitter API data.
 * @author Tim Whitlock
 */




/**
 * Utility for rendering tweet text with clickable links
 * @param string plain text tweet
 * @param string optional target for links, defaults to _blank
 * @param bool optionally specify that passed text is already escaped HTML
 * @return string HTML source of tweet text
 */
function twitter_api_html( $src, $target = '_blank', $alreadyhtml = false ){
    if( ! $alreadyhtml ){
        $src = esc_html( $src );
    }
    // linkify URLs
    $src = twitter_api_html_linkify_urls( $src, $target );
    // linkify @names
    $src = preg_replace('!@([a-z0-9_]{1,15})!i', '<a class="twitter-screen-name" href="https://twitter.com/\\1" target="'.$target.'" rel="nofollow">\\0</a>', $src );
    // linkify #hashtags
    $src = preg_replace('/(?<!&)#(\w+)/i', '<a class="twitter-hashtag" href="https://twitter.com/search?q=%23\\1&amp;src=hash" target="'.$target.'" rel="nofollow">\\0</a>', $src );
    return $src;
} 



/**
 * Utility for rendering tweet text as clickable links, from *original* tweet text with entity data.
 * If you don't have entity data, then use twitter_api_html
 * @param string plain text tweet
 * @param array optionally pass known tweet entities to save string parsing
 * @param string optional target for links, defaults to _blank
 * @return string HTML source of tweet text
 */
function twitter_api_html_with_entities( $src, array $entities, $target = '_blank' ){

    // Raw tweet not expected to be encoded
    $src = esc_html( $src );
    
    // purposefully not using indicies, due to weird inaccuracies and chances previous filtering
    $replace = array();
    
    // Expand URLs, like twitter.com except using actual links
    if( isset($entities['urls']) && is_array($entities['urls']) ){
        foreach( $entities['urls'] as $r ){
            $find = esc_html( $r['url'] );
            $replace[ $find ] = twitter_api_html_linkify_urls($r['expanded_url']);
        }
    }
    if( isset($entities['media']) && is_array($entities['media']) ){
        foreach( $entities['media'] as $r ){
            $find = esc_html( $r['url'] );
            if( 0 === strpos($r['display_url'], 'pic.twitter.com' ) ) {
                $replace[ $find ] = twitter_api_html_linkify_urls( 'https://'.$r['display_url'] );
            }
            else {
                $replace[ $find ] = twitter_api_html_linkify_urls( $r['expanded_url'] );
            }
        }
    }
    // linkify @names using known mentions from twitter if passed
    if( isset($entities['user_mentions']) ){
        foreach( (array) $entities['user_mentions'] as $entity ){
            if( ! empty($entity['screen_name']) && isset($entity['indices']) ){
                $name = $entity['screen_name'];
                $find = '@'.$name;
                $repl = '&#x40;'.$name;
                $replace[$find] = '<a class="twitter-screen-name" href="https://twitter.com/'.$name.'" target="'.$target.'">'.$repl.'</a>';
            }
        }
    }
    // linkify #hashtags using known entities from twitter if passed
    if( isset($entities['hashtags']) ){
        foreach( (array) $entities['hashtags'] as $entity ){
            if( ! empty($entity['text']) && isset($entity['indices']) ){
                $query = array( 'q' => '#'.$entity['text'], 'src' => 'hash' );
                $href = 'https://twitter.com/search?'.http_build_query($query);
                $html = esc_html( $entity['text'] );
                $find = '#'.$html;
                $repl = '&#x23;'.$html;
                $replace[$find] = '<a class="twitter-hashtag" href="'.$href.'" target="'.$target.'">'.$repl.'</a>';
            }
        }
    }
    // perform final replacement on encoded text
    if( $replace ){
        return str_replace( array_keys($replace), array_values($replace), $src );
    }    
    return $src;
} 




/**
 * linkify URLs (restricting to 30 chars as per twitter.com)
 */
function twitter_api_html_linkify_urls( $src, $target = '_blank' ){
    $src = preg_replace_callback('!(https?://)(\S+)!', 'twitter_api_html_linkify_callback', $src );
    if( '_blank' !== $target ){
        $src = str_replace( '"_blank"', '"'.$target.'"', $src );
    }
    return $src;
}



/**
 * @internal
 */
function twitter_api_html_linkify_callback( array $r ){
    list( , $proto, $label ) = $r;
    $href = $proto.html_entity_decode( $label );
    if( isset($label{30}) ){
        $label = substr_replace( $label, '&hellip;', 30 );
    }
    $label = rtrim( str_replace( '#', '&#35;', $label ), '/#?');
    return '<a href="'.$href.'" target="_blank" rel="nofollow">'.$label.'</a>';
}





/**
 * Utility converts the date [of a tweet] to relative time descriprion, e.g. about 2 minutes ago
 * 
 */
function twitter_api_relative_date( $strdate ){
    // get universal time now.
    static $t, $y, $m, $d, $h, $i, $s, $o;
    if( ! isset($t) ){
        $t = time();
        sscanf(gmdate('Y m d H i s',$t), '%u %u %u %u %u %u', $y,$m,$d,$h,$i,$s);
    }
    // get universal time of tweet
    $tt = is_int($strdate) ? $strdate : strtotime($strdate);
    if( ! $tt || $tt > $t ){
        // slight difference between our clock and Twitter's clock can cause problem here - just pretend it was zero seconds ago
        $tt = $t;
        $tdiff = 0;
    }
    else {
        sscanf(gmdate('Y m d H i s',$tt), '%u %u %u %u %u %u', $yy,$mm,$dd,$hh,$ii,$ss);
        // Calculate relative date string
        $tdiff = $t - $tt;
    }
    // Less than a minute ago?
    if( $tdiff < 60 ){
        return __('Just now');
    }
    // within last hour? X minutes ago
    if( $tdiff < 3600 ){
        $idiff = (int) floor( $tdiff / 60 );
        return sprintf( _n( '%u minute ago', '%u minutes ago', $idiff ), $idiff );
    }
    // within same day? About X hours ago
    $samey = ($y === $yy) and
    $samem = ($m === $mm) and
    $samed = ($d === $dd);
    if( ! empty($samed) ){
        $hdiff = (int) floor( $tdiff / 3600 );
        return sprintf( _n( 'About an hour ago', 'About %u hours ago', $hdiff ), $hdiff );
    }
    $tf = get_option('time_format') or $tf = 'g:i A';
    // within 24 hours?
    if( $tdiff < 86400 ){
        return __('Yesterday at').date_i18n(' '.$tf, $tt );
    }
    // else return formatted date, e.g. "Oct 20th 2008 9:27 PM" */
    $df = get_option('date_format') or $df= 'M jS Y'; 
    return date_i18n( $df.' '.$tf, $tt );
}   



/**
 * Clean four-byte Emoji icons out of tweet text.
 * MySQL utf8 columns cannot store four byte Unicode sequences
 */
function twitter_api_strip_emoji( $text ){
    // four byte utf8: 11110www 10xxxxxx 10yyyyyy 10zzzzzz
    return preg_replace('/[\xF0-\xF7][\x80-\xBF]{3}/', '', $text );
}



/**
 * Resolve shortened url fields via entities
 * @return string
 */ 
function twitter_api_expand_urls( $text, array $entities ){
    if( isset($entities['urls']) && is_array($entities['urls']) ){
        foreach( $entities['urls'] as $r ){
            $text = str_replace( $r['url'], $r['expanded_url'], $text );
        }
    }
    if( isset($entities['media']) && is_array($entities['media']) ){
        foreach( $entities['media'] as $r ){
            if( 0 === strpos($r['display_url'], 'pic.twitter.com' ) ) {
                $text = str_replace( $r['url'], 'https://'.$r['display_url'], $text );
            }
            else {
                $text = str_replace( $r['url'], $r['expanded_url'], $text );
            }
        }
    }
    return $text;
}        



