<?php
global $wp_query;
$max_page = $wp_query->max_num_pages;
?>
<main class="blog-latest">
  <div class="blog-latest__container container-fluid">
      <?php get_template_part('template-parts/header-title', null, array(
        'heading' => __('Our Range', 'c2c'),
        'subtitle' => __('Hat’s that bring the fire', 'c2c'),
        'heading_class' => 'header-title__heading--big-space h1'
      )); ?>
      <div class="blog-latest__items" data-max="<?= $max_page ?>">
        <div class="blog-latest__row row">
          <?php if( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <?php get_template_part( 'template-parts/content', 'single'); ?>
            <?php endwhile; ?>
          <?php else : ?>
            <h3><?= __('Brak wpisów.', 'c2c') ?></h3>
          <?php endif; ?>
        </div>
      </div>
      <nav class="blog-latest__more readmore">
        <span class="readmore__bg-word"><?= __('More', 'c2c') ?></span>
        <button class="readmore__button btn btn-link"><span class="btn-lines"><?= __('+ Show more', 'c2c') ?></span></button>
      </nav>
  </div>
</main>