<?php get_header(); ?>

<div id="content">
  <div class="wrap">
  
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <div class="postb">

         <div class="entry">
          <?php the_post_thumbnail(); ?>
          <?php the_content(); ?>
          <p class="postmetadata">
       
            
              
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
<div class="top">


   <div id="sidebar">
    <div class="wrap">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Direita') ) : ?>
<?php endif; ?>
     </div>
  </div>
 </div>
<?php get_footer(); ?>
