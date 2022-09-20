<?php if( !empty($args['items']) ) : ?>
<section class="features">
  <div class="features__container container-fluid container-fluid--wide">
    <div class="features__row row">
    <?php foreach($args['items'] as $feature) : ?>
      <div class="feature__item feature col-xs-12 col-md-4">
        <h3 class="feature__name"><?= $feature['feature_name'] ?></h3>
        <div class="feature__desc"><?= $feature['feature_description'] ?></div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>