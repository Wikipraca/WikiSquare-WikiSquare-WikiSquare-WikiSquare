<?php get_header(); ?>

<div id="content_page<?php if ( is_page('cartografia-afetiva') ) echo "_map"; ?>">
  <div class="wrap">
  
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <div class="postb">
      <div class="wrap">
        <h3><a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a></h3>
        <?php $timezone_format = ('j \d\e F \d\e Y \à\s\ g:i'); ?>
        <div class="data"><?php print date_i18n($timezone_format); ?></div>
        <div class="entry">
          <?php the_post_thumbnail(); ?>
          <?php the_content(); ?>
          <p class="postmetadata">
            <?php _e(''); ?>
            <?php the_category(', ') ?>
            <?php _e('por'); ?>
            <?php  the_author(); ?>
            <br />
             <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=493794687312902";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="http://wikipraca.org/?p=<?php the_ID(); ?>" data-num-posts="10" data-width="auto" style="margin-top:20px; float:left"></div>
              
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
