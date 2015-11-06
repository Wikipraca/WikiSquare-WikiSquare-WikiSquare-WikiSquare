<?php

if ( !defined( 'ABSPATH' ) ) exit;

function google_seo_schema_videos($text) {
         global $post;
         $prefix = 'google_snippets';
       // Get the product values for schema
        $google_seo_video_title          = get_post_meta( $post->ID, $prefix.'video_name', true );
        $google_seo_video_image_src      = get_post_meta( $post->ID, $prefix.'video_image_src', true );
        $google_seo_video_video_src      = get_post_meta( $post->ID, $prefix.'video_video_src', true );
        $google_seo_upload_date          = get_post_meta( $post->ID, $prefix.'upload_date', true );
        $google_seo_expire_date          = get_post_meta( $post->ID, $prefix.'expire_date', true );
        $google_seo_video_type           = get_post_meta( $post->ID, $prefix.'video_type', true );
        $google_seo_video_description    = get_post_meta( $post->ID, $prefix.'video_description', true );
        $google_seo_video_duration       = get_post_meta( $post->ID, $prefix.'video_duration', true );
        $google_seo_embed_url            = get_post_meta( $post->ID, $prefix.'embed_url', true );
       
        $google_seo_schema_videos = '';
        $google_seo_schema_videos .= '<div itemprop="video" itemscope itemtype="http://schema.org/VideoObject">';
        $google_seo_schema_videos .= '<span style="visibility: hidden;">';
        if(isset($google_seo_video_title))
        $google_seo_schema_videos .= '<meta itemprop="name" content="' . $google_seo_video_title . '" />';
        if(isset($google_seo_video_description))
        $google_seo_schema_videos .= '<meta itemprop="description" content="' . $google_seo_video_description . '" />';
        if(isset($google_seo_video_image_src))
        $google_seo_schema_videos .= '<meta itemprop="thumbnailUrl" content="' . $google_seo_video_image_src . '" />';
        if(isset($google_seo_video_duration))
        $google_seo_schema_videos .=' <meta itemprop="duration" content="'.$google_seo_video_duration.'" />';
        if(isset($google_seo_video_video_src))
	$google_seo_schema_videos .= '<meta itemprop="contentURL" content="' . $google_seo_video_video_src . '"/>';
        if(isset($google_seo_embed_url))
        $google_seo_schema_videos .= '<meta itemprop="embedURL" content="' . $google_seo_embed_url . '" />';
        if(isset($google_seo_upload_date))
        $google_seo_schema_videos .= '<meta itemprop="uploadDate" content="' . $google_seo_upload_date . '" />';
        if(isset($google_seo_video_type))  
        $google_seo_schema_videos .= '<meta itemprop="type" content="' . $google_seo_video_type . '" />';
        $google_seo_schema_videos .= ' </span></div>';



	return $text.$google_seo_schema_videos;


}

function google_seo_schema_add_video() {
global $post;
$prefix = 'google_snippets';
$google_seo_video_name = get_post_meta( $post->ID, $prefix.'video_name', true );
if( $google_seo_video_name != '' && !is_home() ) {
add_filter( "the_content", "google_seo_schema_videos" );
}
}
add_action( 'wp', 'google_seo_schema_add_video' );


?>
