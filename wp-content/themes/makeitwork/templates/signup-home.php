<div class="signup content-block">
  <?php
    $form = get_field('form_name');
    gravity_form_enqueue_scripts($form->id, true);
    gravity_form($form->id, true, true, false, '', true, 1);
  ?>
</div>