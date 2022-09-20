<div class="col-xs-12 col-md-6">
  <article class="entry">
    <?php if(has_post_thumbnail()) { ?>
      <div class="entry__thumbnail">
        <a href="<?php the_permalink() ?>">
          <?php the_post_thumbnail('blog', array('class' => 'latest__img')); ?>
        </a>
      </div>
    <?php } ?>
    <header class="entry__content">
      <h2 class="entry__title h2"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
      <div class="entry__excerpt"><?php the_excerpt(); ?></div>
    </header>
  </article>
</div>