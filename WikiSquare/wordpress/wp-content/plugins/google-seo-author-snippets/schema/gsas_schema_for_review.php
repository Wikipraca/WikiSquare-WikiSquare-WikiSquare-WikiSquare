<?php

if ( !defined( 'ABSPATH' ) ) exit;


function google_seo_schema_review($text) {
         global $post;
         $prefix = 'google_snippets';
         $data_prefix = 'auto_product';

       // Get the review values for schema
        $google_seo_item_reviewed            = get_post_meta( $post->ID, $prefix.'review_item_reviewed', true );
        $google_seo_review_rating            = get_post_meta( $post->ID, $prefix.'review_rating', true );
        $google_seo_review_reviewer          = get_post_meta( $post->ID, $prefix.'review_reviewer', true );
        $google_seo_review_date_reviewed     = get_post_meta( $post->ID, $prefix.'review_date_reviewed', true );
        $google_seo_review_description       = get_post_meta( $post->ID, $prefix.'review_description', true );
        $google_seo_review_summary           = get_post_meta( $post->ID, $prefix.'review_summary', true );


          $google_seo_schema_review  =  '';
          $google_seo_schema_review .= '<div itemscope itemtype="http://data-vocabulary.org/Review">';
          $google_seo_schema_review .= '<span style="visibility: hidden;">';
	  if(isset($google_seo_item_reviewed))
          $google_seo_schema_review .= '<span itemprop="itemreviewed">'.$google_seo_item_reviewed.'</span>';
	  if(isset($google_seo_review_reviewer))
          $google_seo_schema_review .= 'Reviewed by <span itemprop="reviewer">'.$google_seo_review_reviewer.'</span> on';
	  if(isset($google_seo_review_date_reviewed))
          $google_seo_schema_review .= '<time itemprop="dtreviewed" datetime="'.$google_seo_review_date_reviewed.'">'.$google_seo_review_date_reviewed.'</time>.';
	  if(isset($google_seo_review_summary))
          $google_seo_schema_review .= '<span itemprop="summary">'.$google_seo_review_summary.'</span>';
	  if(isset($google_seo_review_description))
          $google_seo_schema_review .= '<span itemprop="description">'.$google_seo_review_description.' </span>';
	  if(isset($google_seo_review_rating))
          $google_seo_schema_review .= 'Rating: <span itemprop="rating">'.$google_seo_review_rating.'</span>';
          $google_seo_schema_review .= ' </span> </div>';
          
          return $text.$google_seo_schema_review;

}
function google_seo_schema_add_review() {
 global $post;
$prefix = 'google_snippets';
$google_seo_schema_review = get_post_meta( $post->ID, $prefix.'review_item_reviewed', true );


 if($google_seo_schema_review != '' && !is_home() ) {
 add_filter( "the_content", "google_seo_schema_review" );
 }
 }
add_action( 'wp', 'google_seo_schema_add_review' );

