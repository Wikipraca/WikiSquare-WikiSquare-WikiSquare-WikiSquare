<?php

if ( !defined( 'ABSPATH' ) ) exit;

function google_seo_schema_receipes($text) {
         global $post;
         $prefix = 'google_snippets';
       // Get the receipes values for schema
        $google_seo_receipes_name         = get_post_meta( $post->ID, $prefix.'receipes_name', true );
        $google_seo_receipes_photo        =  get_post_meta( $post->ID, $prefix.'receipes_photo', true );
        $google_seo_receipes_author       = get_post_meta( $post->ID, $prefix.'receipes_author', true );
        $google_seo_receipes_published    = get_post_meta( $post->ID, $prefix.'receipes_published', true );
        $google_seo_receipes_summary      = get_post_meta( $post->ID, $prefix.'receipes_summary', true );
        $google_seo_receipes_preptime     = get_post_meta( $post->ID, $prefix.'receipes_preptime', true );
        $google_seo_receipes_cooktime     = get_post_meta( $post->ID, $prefix.'receipes_cooktime', true );
        $google_seo_receipes_totaltime    = get_post_meta( $post->ID, $prefix.'receipes_totaltime', true );
        $google_seo_receipes_yield        = get_post_meta( $post->ID, $prefix.'receipes_yield', true );
        $google_seo_receipes_nutrition    = get_post_meta( $post->ID, $prefix.'receipes_nutrition', true );
        $google_seo_receipes_ingredient   = get_post_meta( $post->ID, $prefix.'receipes_ingredient', true );
        $google_seo_receipes_servingsize  = get_post_meta( $post->ID, $prefix.'receipes_servingsize', true );
        $google_seo_receipes_calories     = get_post_meta( $post->ID, $prefix.'receipes_calories', true );
        $google_seo_receipes_fat          = get_post_meta( $post->ID, $prefix.'receipes_fat', true );
        $google_seo_receipes_instructions = get_post_meta( $post->ID, $prefix.'receipes_instructions', true );
        $google_seo_receipes_ingredient_amount = get_post_meta( $post->ID, $prefix.'receipes_ingredient_amount', true );
        
        $google_seo_schema_receipes       = '';
        $google_seo_schema_receipes      .= '<div itemscope itemtype="http://data-vocabulary.org/Recipe" >';
        $google_seo_schema_receipes      .= '<span style="visibility: hidden;">';
	if(isset($google_seo_receipes_name))
        $google_seo_schema_receipes      .= '<h1 itemprop="name">'.$google_seo_receipes_name.'</h1>';
	if(isset($google_seo_receipes_photo))
        $google_seo_schema_receipes      .= '<img style="width:75px;height:75px;" itemprop="photo" src="'.$google_seo_receipes_photo.'" />'; 
	if(isset($google_seo_receipes_author))
        $google_seo_schema_receipes      .= 'By <span itemprop="author">'.$google_seo_receipes_author.'</span>';
	if(isset($google_seo_receipes_published))
        $google_seo_schema_receipes      .= 'Published: <time datetime="'.$google_seo_receipes_published.'" itemprop="published">'.
                                             $google_seo_receipes_published .'</time>';
//        $google_seo_schema_receipes      .= '<span itemprop="summary">'.$google_seo_receipes_summary;
//        $google_seo_schema_receipes      .= '<span itemprop="review" itemscope itemtype="http://data-vocabulary.org/Review-aggregate">';
  //      $google_seo_schema_receipes      .= '<span itemprop="rating">4.0</span> stars based on<span itemprop="count">35</span> reviews </span>';
	if(isset($google_seo_receipes_preptime))
        $google_seo_schema_receipes      .=  'Prep time: <time datetime="PT30M" itemprop="prepTime">'.$google_seo_receipes_preptime.'</time>';
	if(isset($google_seo_receipes_cooktime))
        $google_seo_schema_receipes      .=  'Cook time: <time datetime="PT1H" itemprop="cookTime">'.$google_seo_receipes_cooktime.'</time>';
	if(isset($google_seo_receipes_totaltime))
        $google_seo_schema_receipes      .= ' Total time: <time datetime="PT1H30M" itemprop="totalTime">'.$google_seo_receipes_totaltime.'</time>';
	if(isset($google_seo_receipes_yield))
        $google_seo_schema_receipes      .= 'Yield: <span itemprop="yield">'.$google_seo_receipes_yield.'</span>';
        $google_seo_schema_receipes      .= '<span itemprop="nutrition" itemscope itemtype="http://data-vocabulary.org/Nutrition">';
	if(isset($google_seo_receipes_servingsize))
        $google_seo_schema_receipes      .= 'Serving size: <span itemprop="servingSize">'.$google_seo_receipes_servingsize.'</span>';
	if(isset($google_seo_receipes_calories))
        $google_seo_schema_receipes      .= 'Calories per serving: <span itemprop="calories">'.$google_seo_receipes_calories.'</span>';
	if(isset($google_seo_receipes_fat))
        $google_seo_schema_receipes      .= ' Fat per serving: <span itemprop="fat">'.$google_seo_receipes_fat.'</span></span>';
	if(isset($google_seo_receipes_ingredient) || isset($google_seo_receipes_ingredient_amount))
        $google_seo_schema_receipes      .= ' Ingredients:
                                             <span itemprop="ingredient" itemscope itemtype="http://data-vocabulary.org/RecipeIngredient">';
        $google_seo_schema_receipes      .= 'Thinly-sliced <span itemprop="name">'.$google_seo_receipes_ingredient.'</span>:
      <span itemprop="amount">'.$google_seo_receipes_ingredient_amount.'</span>
    </span>';
      //  $google_seo_schema_receipes      .= '<span itemprop="ingredient" itemscope itemtype="http://data-vocabulary.org/RecipeIngredient">';
      //  $google_seo_schema_receipes      .= '<span itemprop="name">White sugar</span>:';
        $google_seo_schema_receipes      .= '<span itemprop="amount">3/4 cup</span>  </span>...';
	if(isset($google_seo_receipes_instructions))
        $google_seo_schema_receipes      .= 'Directions: <div itemprop="instructions">
                                       '.$google_seo_receipes_instructions.'
      ...
    </div>';
	$google_seo_schema_receipes      .= '</span></div>';

return $text.$google_seo_schema_receipes;
}

function google_seo_schema_add_receipes() {
global $post;
$prefix = 'google_snippets';
$google_seo_receipes_name = get_post_meta( $post->ID, $prefix.'receipes_name', true );
if( $google_seo_receipes_name != '' && !is_home() ) {
add_filter( "the_content", "google_seo_schema_receipes" );
}
}
add_action( 'wp', 'google_seo_schema_add_receipes' );

?>
