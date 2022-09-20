<?php
// $args passed by get_template_part
?>
<section class="hero">
  <div class="hero__container container-fluid container-fluid--wide">
    <div class="hero__inner">
      <div class="hero__description">
        <?php if( !empty($args['subtitle']) ) : ?>
        <span class="hero__subtitle subtitle subtitle--up"><?= $args['subtitle'] ?></span>
        <?php endif; ?>
        <?php if( !empty($args['heading']) ) : ?>
        <h1 class="hero__heading"><?= $args['heading'] ?></h1>
        <?php endif; ?>
        <?php if( !empty($args['link']) && !empty($args['link_name']) ) : ?>
        <a href="<?= $args['link'] ?>" class="hero__btn btn"><?= $args['link_name'] ?></a>
        <?php endif; ?>
      </div>
      <?php if( !empty($args['photo']) || !empty($args['photo2']) ) : ?>
      <div class="hero__photo">
        <?php if( !empty($args['photo']) ) : ?>
          <div class="hero__img1"><img src="<?= $args['photo']['url']; ?>" alt="" loading="lazy"></div>
        <?php endif; ?>
        <?php if( !empty($args['photo2']) ) : ?>
          <div class="hero__img2"><img src="<?= $args['photo2']['url']; ?>" alt="" loading="lazy"></div>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>