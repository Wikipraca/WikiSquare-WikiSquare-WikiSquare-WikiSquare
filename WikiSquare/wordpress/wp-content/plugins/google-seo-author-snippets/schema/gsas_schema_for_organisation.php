<?php
if ( !defined( 'ABSPATH' ) ) exit;

function google_seo_schema_organisation($text) {
         global $post;
         $prefix = 'google_snippets';
       // Get the product values for schema
        $google_seo_organisation_name = get_post_meta( $post->ID, $prefix.'organisation_name', true );
        $google_seo_organisation_url = get_post_meta( $post->ID, $prefix.'organisation_url', true );
        $google_seo_organisation_street_address = get_post_meta( $post->ID, $prefix.'organisation_street_address', true );
        $google_seo_organisation_address_locality = get_post_meta( $post->ID, $prefix.'organisation_address_locality', true );
        $google_seo_organisation_address_region = get_post_meta( $post->ID, $prefix.'organisation_address_region', true );
        $google_seo_organisation_postal_code = get_post_meta( $post->ID, $prefix.'organisation_postal_code', true );
        $google_seo_organisation_country = get_post_meta( $post->ID, $prefix.'organisation_country', true );
        $google_seo_organisation_telephone = get_post_meta( $post->ID, $prefix.'organisation_telephone', true );
        $google_seo_organisation_logo = get_post_meta( $post->ID, $prefix.'organisation_logo', true );
        $google_seo_organisation_longitude = get_post_meta( $post->ID, $prefix.'organisation_longitude', true );

        $google_seo_schema_organisation = '';
        $google_seo_schema_organisation .= '<div vocab="http://schema.org/" typeof="Organization"> ';
        $google_seo_schema_organisation .= '<span style="visibility: hidden;">';
	if(isset($google_seo_organisation_name))
        $google_seo_schema_organisation .= '<span property="name">'.$google_seo_organisation_name.'</span>'; 
        $google_seo_schema_organisation .= 'Located at <div property="address" typeof="PostalAddress">';
	if(isset($google_seo_organisation_street_address))
        $google_seo_schema_organisation .='<span property="streetAddress">'.$google_seo_organisation_street_address.'</span>,';
	if(isset($google_seo_organisation_address_locality))
        $google_seo_schema_organisation .= '<span property="addressLocality">'.$google_seo_organisation_address_locality.'</span>,';
	if(isset($google_seo_organisation_address_region))
        $google_seo_schema_organisation .= '<span property="addressRegion">'.$google_seo_organisation_address_region.'</span>.';
        $google_seo_schema_organisation .= '</div>';
	if(isset($google_seo_organisation_logo))
        $google_seo_schema_organisation .='<img property="logo" src="'.$google_seo_organisation_logo.'" />';
	if(isset($google_seo_organisation_telephone))
        $google_seo_schema_organisation .= 'Phone: <span property="telephone">'.$google_seo_organisation_telephone.'</span>';
	if(isset($google_seo_organisation_url))
        $google_seo_schema_organisation .= '<a href="'.$google_seo_organisation_url.'" property="url">'.$google_seo_organisation_url.'</a>';
	$google_seo_schema_organisation .= '</span>  </div>';
       return $text.$google_seo_schema_organisation;
}

function google_seo_schema_add_org() {
global $post;
$prefix = 'google_snippets';
$google_seo_org_name = get_post_meta( $post->ID, $prefix.'organisation_name', true );
if( $google_seo_org_name != '' && !is_home() ) {
add_filter( "the_content", "google_seo_schema_organisation" );
}
}
add_action( 'wp', 'google_seo_schema_add_org' );

?>
