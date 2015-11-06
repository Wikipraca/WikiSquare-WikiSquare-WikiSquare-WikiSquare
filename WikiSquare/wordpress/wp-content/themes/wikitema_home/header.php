<!DOCTYPE html>

<html <?php language_attributes(); ?>>
   <head>
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <meta charset="<?php bloginfo( 'charset' ); ?>" />
   <title>
   <?php wp_title ( '|', true,'right' ); ?>
   </title>
   <link rel="profile" href="http://gmpg.org/xfn/11" />
   <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
   <?php

    /* 

     *  Add this to support sites with sites with threaded comments enabled.

     */

    if ( is_singular() && get_option( 'thread_comments' ) )

        wp_enqueue_script( 'comment-reply' );

 

    wp_head();

     

    wp_get_archives('type=monthly&format=link');

?>
   <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   <script>
$(document).ready(function(){
    var colors = ["#aa047f","#bf1e2e","#8cc63e","#662e93","#ed008c","#a01e66","#1a75bc","#662e93"];
    $('.netsposts-content').each(function() {
        var rand = Math.floor(Math.random()*colors.length);
        $(this).css("background-color", colors[rand]);
    });
});
</script>
   
   <link rel="stylesheet" href="http://wikipraca.org/teste/wp-content/themes/wikitema_home/js/responsive-nav.css">
   <script src="http://wikipraca.org/teste/wp-content/themes/wikitema_home/js/responsive-nav.js"></script>
   <style type="text/css">
<!--
#rotator{
background: url(http://wikipraca.org/teste/wp-content/themes/wikitema_home/img/flags/<?php echo $selectedBg; ?>) no-repeat;
}
-->
</style>
   </head>

   <body>
   <?php
  $bg = array('wikipraca_tags1.png', 'wikipraca_tags2.png', 'wikipraca_tags3.png', 'wikipraca_tags4.png'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>
  
<div id="main">
<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) ); ?>
<script>
      var navigation = responsiveNav(".nav");
    </script>
<div id="cont">
  

<div class="top<?php if ( is_page('cartografia-afetiva') ) echo "_map"; ?>">
     <div id="sidebar">
    <div class="wrap">
         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Esquerda') ) : ?>
         <?php endif; ?>
       </div>
  </div>
   </div>
