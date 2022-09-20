<section class="promo">
  <div class="promo__container container-fluid container-fluid--wide">
    <div class="promo__inner">
      <?php if( !empty($args['photo']) ) : ?>
      <div class="promo__photo">
        <?php if( !empty($args['photo']) ) : ?>
          <div class="promo__img">
            <?php if( !empty($args['link']) ) : ?>
              <a href="<?= $args['link'] ?>">
            <?php endif; ?>
            <img src="<?= $args['photo']['url']; ?>" alt="<?= $args['photo']['alt']; ?>" loading="lazy">
            <?php if( !empty($args['link']) ) : ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      <div class="promo__description">
        <?php if( !empty($args['subtitle']) ) : ?>
        <span class="promo__subtitle subtitle subtitle--up"><?= $args['subtitle'] ?></span>
        <?php endif; ?>
        <?php if( !empty($args['heading']) ) : ?>
        <h2 class="promo__heading h1"><?= $args['heading'] ?></h2>
        <?php endif; ?>
        <?php if( !empty($args['link']) && !empty($args['link_name']) ) : ?>
          <div class="promo__btns">
            <a href="<?= $args['link'] ?>" class="promo__btn btn"><?= $args['link_name'] ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>