<?php
/*
Plugin Name: PM Latest Tweets
Plugin URI: http://petermartin.me/
Description: Show latest tweet
Author: Peter Martin
Version: 0.1
Author URI: http://petermartin.me/
*/


ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "14401125-9MvwSuCkykbWbQzBhJhs30w5lPbJyEksgBuIksJhH",
    'oauth_access_token_secret' => "hVRAjbZPqkdxLQ92J1PJmtsG3W4LTsm7R2gWuT3UiEFza",
    'consumer_key' => "aLT6hd7k7hB1lzCVY5FG6kYFJ",
    'consumer_secret' => "z0nIv6uaWrxdVYpSq3JbeM4Kct0SvjcH51lWcg8ej0lOfFtmoP"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock',
    'skip_status' => '1'
);

/** Perform a POST request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/followers/ids.json';
$getfield = '?screen_name=J7mbo';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
