<?php get_header(); ?>

<div id="content_page">
  <div class="wrap">
 <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <div class="postb">
      <div class="wrap">
        <a href="<?php the_permalink(); ?>"><h3>
          <?php the_title(); ?>
          </h3></a>
        <?php $timezone_format = ('j \d\e F \d\e Y \à\s\ g:i'); ?>
        <div class="data"><?php print date_i18n($timezone_format); ?></div>
        <div class="entry">
          <?php the_post_thumbnail(); ?>
          <?php  if (has_excerpt() ) { ?>
<?php the_excerpt(); ?>
<?php } ?>
                   <p class="postmetadata">
            <?php _e(''); ?>
            <?php the_category(', ') ?>
           </p>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <div class="navigation">
      <?php posts_nav_link(); ?>
    </div>
    <?php endif; ?>


  </div>
</div>
<?php get_footer(); ?>
