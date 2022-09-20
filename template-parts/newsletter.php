<?php
if( !empty($args['contact_form_id']) ) :
?>
<section class="newsletter">
  <div class="newsletter__container container-fluid">
    <?php get_template_part('template-parts/header-title', null, array(
        'heading' => $args['heading'], //just an example
        'subtitle' => $args['subtitle'],
    )); ?>
    <div class="newsletter__form">
      <?php echo do_shortcode('[contact-form-7 id="' . $args['contact_form_id'] . '"]'); ?>
    </div>
  </div>
</section>
<?php endif; ?>