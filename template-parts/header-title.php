<?php
if( !empty($args['heading']) ) :
  $subtitle_class = ( !empty($args['subtitle_class']) ) ? $args['subtitle_class'] : 'subtitle--up';
  $heading_class = ( !empty($args['heading_class']) ) ? $args['heading_class'] : 'h1';
?>
<header class="header-title header-title--center">
  <?php if( !empty($args['subtitle']) ) : ?>
  <span class="header-title__subtitle subtitle <?= $subtitle_class ?>"><?= $args['subtitle'] ?></span>
  <?php endif; ?>
  <h3 class="header-title__heading <?= $heading_class ?>"><?= $args['heading'] ?></h3>
</header>
<?php endif; ?>