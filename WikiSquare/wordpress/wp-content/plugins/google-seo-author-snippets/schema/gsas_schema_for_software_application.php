<?php
if ( !defined( 'ABSPATH' ) ) exit;

function google_seo_schema_software($text) {
         global $post;
         $prefix = 'google_snippets';
       // Get the product values for schema
        $google_seo_software_name = get_post_meta( $post->ID, $prefix.'software_name', true );
        $google_seo_software_description = get_post_meta( $post->ID, $prefix.'software_description', true );
        $google_seo_software_url = get_post_meta( $post->ID, $prefix.'software_url', true );
        $google_seo_software_image = get_post_meta( $post->ID, $prefix.'software_image', true );
        $google_seo_software_author = get_post_meta( $post->ID, $prefix.'software_author', true );
        $google_seo_software_aggregate_rating = get_post_meta( $post->ID, $prefix.'software_aggregate_rating', true );
        $google_seo_software_reveiws = get_post_meta( $post->ID, $prefix.'software_reveiws', true );
        $google_seo_software_offer = get_post_meta( $post->ID, $prefix.'software_offer', true );
        $google_seo_software_content_rating = get_post_meta( $post->ID, $prefix.'software_content_rating', true );
        $google_seo_software_date_published = get_post_meta( $post->ID, $prefix.'software_date_published', true );
      //  $google_seo_software_inlanguage = get_post_meta( $post->ID, $prefix.'software_inlanguage', true );
        $google_seo_software_operationg_systems = get_post_meta( $post->ID, $prefix.'software_operating_systems', true );
        $google_seo_software_filesize = get_post_meta( $post->ID, $prefix.'software_filesize', true );
       // $google_seo_software_file_format = get_post_meta( $post->ID, $prefix.'software_file_format', true );
        $google_seo_software_category = get_post_meta( $post->ID, $prefix.'software_category', true );
      //  $google_seo_sofware_sub_category = get_post_meta( $post->ID, $prefix.'sofware_sub_category', true );
      //  $google_seo_software_downloadurl = get_post_meta( $post->ID, $prefix.'software_downloadurl', true );
        $google_seo_software_version = get_post_meta( $post->ID, $prefix.'software_version', true );
       // $google_seo_software_version_changes = get_post_meta( $post->ID, $prefix.'software_version_changes', true );
        $google_seo_software_date_updated = get_post_meta( $post->ID, $prefix.'software_date_updated', true );
        $google_seo_sofware_review_count = get_post_meta( $post->ID, $prefix.'sofware_review_count', true );
        $google_seo_sofware_review_author = get_post_meta( $post->ID, $prefix.'sofware_review_author', true );
        $google_seo_sofware_review_publish_date = get_post_meta( $post->ID, $prefix.'sofware_review_publish_date', true );
        $google_seo_sofware_review_description = get_post_meta( $post->ID, $prefix.'sofware_review_description', true );
        $google_seo_sofware_price = get_post_meta( $post->ID, $prefix.'sofware_price', true );
     //   $google_seo_software_installurl = get_post_meta( $post->ID, $prefix.'software_installurl', true );
      //  $google_seo_software_requiered_features = get_post_meta( $post->ID, $prefix.'software_requiered_features', true );
        $google_seo_software_interaction_count = get_post_meta( $post->ID, $prefix.'software_interaction_count', true );
       // $google_seo_software_videos = get_post_meta( $post->ID, $prefix.'software_videos', true );
       // $google_seo_software_screenshot = get_post_meta( $post->ID, $prefix.'software_screenshot', true );
       // $google_seo_software_permission = get_post_meta( $post->ID, $prefix.'software_permission', true );
        $google_seo_schema_software =""; 
        $google_seo_schema_software .= ' <div itemscope itemtype="http://schema.org/SoftwareApplication">';
        $google_seo_schema_software .= '<span style="visibility: hidden;">';
	if(isset($google_seo_software_image))
        $google_seo_schema_software .= ' <img itemprop="image" src="'.$google_seo_software_image.'" />';
	if(isset($google_seo_software_name))
        $google_seo_schema_software .= ' <span itemprop="name">'.$google_seo_software_name.'</span> - ';
	if(isset($google_seo_software_url) || isset($google_seo_software_name))
	$google_seo_schema_software .= '
        <div itemprop="author" itemscope itemtype="http://schema.org/Organization">';
        $google_seo_schema_software .= '<a itemprop="url" href="'.$google_seo_software_url.'"><span itemprop="name">'.$google_seo_software_name.'</span></a>
</div>';
	if(isset($google_seo_software_description))
        $google_seo_schema_software .= '<span itemprop="description">'.$google_seo_software_description.' </span>';
	if(isset($google_seo_software_content_rating))
        $google_seo_schema_software .= 'CONTENT RATING: <span itemprop="contentRating">'.$google_seo_software_content_rating.'</span>';
	if(isset($google_seo_software_date_published))
	$google_seo_schema_software .= 'UPDATED: <time itemprop="datePublished" datetime="'.$google_seo_software_date_published.'">'.$google_seo_software_date_published.'</time>';
	if(isset($google_seo_software_operationg_systems) || isset($google_seo_software_version))
        $google_seo_schema_software .= 'REQUIRES <span itemprop="operatingSystems">'.$google_seo_software_operationg_systems.'</span>: <span itemprop="SoftwareVersion">'.$google_seo_software_version.'</span> and up';
        $google_seo_schema_software .= '<link itemprop="SoftwareApplicationCategory" href="http://schema.org/GameApplication"/>';
	if(isset($google_seo_software_category) || isset($google_seo_software_filesize))
        $google_seo_schema_software .= 'CATEGORY: <span itemprop="SoftwareApplicationSubCategory">'.$google_seo_software_category.'</span>
        SIZE:'.$google_seo_software_filesize;
        $google_seo_schema_software .= '<meta itemprop="fileSize" content="'.$google_seo_software_filesize.'"/>';
        $google_seo_schema_software .= 'INSTALLS: <meta itemprop="interactionCount" content=”UserDownloads:'.$google_seo_software_interaction_count.'"/>'.$google_seo_software_interaction_count.'
        RATING:';
        $google_seo_schema_software .= '<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';
	if(isset($google_seo_software_aggregate_rating) || isset($google_seo_sofware_review_count))
        $google_seo_schema_software .= '<span itemprop="ratingValue">'.$google_seo_software_aggregate_rating.'</span>( <span itemprop="ratingCount">'.$google_seo_sofware_review_count.'</span>)';
        $google_seo_schema_software .= '<meta itemprop="reviewCount" content="'.$google_seo_sofware_review_count.'" />
                                         </div>';

        $google_seo_schema_software .= '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">';
	if(isset($google_seo_sofware_price))
	$google_seo_schema_software .= ' Price: <span itemprop="price">'.$google_seo_sofware_price.'</span>';
        $google_seo_schema_software .= '<meta itemprop="priceCurrency" content="USD" />';
        $google_seo_schema_software .= '<link itemprop="availability" href="http://schema.org/InStock" />INSTALL
                                        </div>';
        $google_seo_schema_software .= ' Reviews:  <div itemprop="reviews" itemscope itemtype="http://schema.org/Review">';
	if(isset($google_seo_software_content_rating) || isset($google_seo_sofware_review_author))
        $google_seo_schema_software .= '<span itemprop="reviewRating">'.$google_seo_software_content_rating.'</span> stars -
 
  <span itemprop="author">'.$google_seo_sofware_review_author.'</span>,';
	if(isset($google_seo_sofware_review_publish_date))
        $google_seo_schema_software .= ' Written on <time itemprop="dateCreated" datetime="'.$google_seo_sofware_review_publish_date.'">'.$google_seo_sofware_review_publish_date.'</time>';
	if(isset($google_seo_sofware_review_description))
	$google_seo_schema_software .= ' <span itemprop="reviewBody">'.$google_seo_sofware_review_description.' </span>';
	$google_seo_schema_software .= '</div></span>
</div>';
 return $text.$google_seo_schema_software;

}

function google_seo_schema_add_software() {
global $post;
$prefix = 'google_snippets';
$google_seo_software_name = get_post_meta( $post->ID, $prefix.'software_name', true );
if( $google_seo_software_name != '' && !is_home() ) {
add_filter( "the_content", "google_seo_schema_software" );
}
}
add_action( 'wp', 'google_seo_schema_add_software' );

