<?php

if ( !defined( 'ABSPATH' ) ) exit;


function google_seo_schema_product($text) {
         global $post;
         $prefix = 'google_snippets';
         
         
       // Get the product values for schema
        
	$google_seo_product_name             = get_post_meta( $post->ID, $prefix.'product_name', true );
	$google_seo_product_price            = get_post_meta( $post->ID, $prefix.'product_price', true );
	$google_seo_product_sku              = get_post_meta( $post->ID, $prefix.'sku', true );
	$google_seo_product_image            = get_post_meta( $post->ID, $prefix.'product_image', true );
	$google_seo_product_description      = get_post_meta( $post->ID, $prefix.'product_description', true );
	$google_seo_product_category         = get_post_meta( $post->ID, $prefix.'product_category', true );
	$google_seo_product_currency         = get_post_meta( $post->ID, $prefix.'product_currency', true );
	$google_seo_brand_name               = get_post_meta( $post->ID, $prefix.'brand_name', true );
	$google_seo_offer_regular_price      = get_post_meta( $post->ID, $prefix.'offer_regular_price', true );
	$google_seo_offer_sale_price         = get_post_meta( $post->ID, $prefix.'offer_sale_price', true );
	$google_seo_offer_available_from     = get_post_meta( $post->ID, $prefix.'offer_available_from', true );
	$google_seo_offer_condition          = get_post_meta( $post->ID, $prefix.'offer_condition', true );
	$google_seo_offer_stock              = get_post_meta( $post->ID, $prefix.'offer_stock', true );
	$google_seo_offer_valid_upto         = get_post_meta( $post->ID, $prefix.'offer_valid_upto', true );
	$google_seo_product_seller           = get_post_meta( $post->ID, $prefix.'product_seller', true ); 
	$google_seo_product_auto             = get_post_meta( $post->ID, $prefix.'product_auto', true );
        if(isset($google_seo_product_auto) && ($google_seo_product_auto == "on" )) { 
                         $auto = "google_auto_"; 
                 } else {
                         $auto = "google_seo_"; }
   /* ==================================================================================================== */
        $ID = $post->ID;
           $google_auto_product_name = get_the_title( $ID ); 
           $google_auto_product_description = get_the_content( $ID ); 
           $google_auto_product_sku         = get_post_meta($post->ID , $google_seo_product_sku , true); 
           $google_auto_offer_stock          = get_post_meta($post->ID , $google_seo_offer_stock , true); 
           $google_auto_product_category      = get_post_meta($post->ID,$google_seo_product_category,true);
           $google_auto_offer_regular_price   = get_post_meta($post->ID , $google_seo_offer_regular_price , true); 
           $google_auto_offer_sale_price     = get_post_meta($post->ID , '_sale_price' , true); 
           if (has_post_thumbnail( $post->ID ) ) { 
           $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
           $google_auto_product_image          = $image[0];
           }
           $google_auto_product_stock = get_post_meta($post->ID , $google_seo_offer_stock , 'true');
           $google_auto_offer_available_from = get_post_meta($post->ID , $google_seo_offer_available_from ,'true');
           $google_auto_offer_valid_upto = get_post_meta($post->ID , $google_seo_offer_valid_upto ,'true');
           $google_auto_product_seller   = get_post_meta($post->ID , $google_seo_product_seller, 'true' );
        
        
     //   $data_prefix.'_'.$               = get_post_meta($post->ID , '_sku' , true);

        $google_seo_schema_product = '';
        $google_seo_schema_product .= '<div itemscope itemtype="http://data-vocabulary.org/Product">';
        $google_seo_schema_product .=    '<span style="visibility: hidden;">';
           $product_name = $auto."product_name";
	if(isset($product_name)) 
        $google_seo_schema_product .=   "<span itemprop='brand'>".$$product_name."</span> <span itemprop='name'>".$$product_name."</span>";
           $product_image = $auto."product_image";
	if(isset($product_image))
        $google_seo_schema_product .=' <img  style="width:75px;height:75px;" itemprop="image" src="'.$$product_image.'" />';
           $product_description = $auto."product_description";
	if(isset($product_description))
        $google_seo_schema_product .= '<span itemprop="description">' .$$product_description.' </span>';
	$product_price = $auto."product_price";
        if(isset($product_price))
        $google_seo_schema_product .="<span itemprop='price'>".$$product_price."</span>";
           $product_cat = $auto."product_category";
	if(isset($product_cat))
        $google_seo_schema_product .= 'Category: <span itemprop="category" content="'.$$product_cat.'">'.$$product_cat.'</span>';
           $product_sku = $auto."product_sku"; 
	if(isset($product_sku))
       	$google_seo_schema_product .= '  Product #: <span itemprop="identifier" content="'.$$product_sku.'">'.$$product_sku.'</span>';
       	$google_seo_schema_product .= '<span itemprop="offerDetails" itemscope itemtype="http://data-vocabulary.org/Offer">';
           $product_regular_price  = $auto."offer_regular_price";      
	if(isset($product_regular_price))
       	$google_seo_schema_product .= 'Regular price:$' .$$product_regular_price.
                                    '<meta itemprop="priceCurrency" content="USD" />';
           $product_sale_price = $auto."offer_sale_price";        
	if(isset($product_sale_price))
                                     '$<span itemprop="'.$$product_sale_price.'">'.$$product_sale_price.'</span>';
           $product_offer_valid_upto = $auto."offer_valid_upto";
	if(isset($product_offer_valid_upto))
        $google_seo_schema_product .= ' (Sale ends <time itemprop="priceValidUntil" datetime="'.$$product_offer_valid_upto.'">!</time>) ';
           $product_seller = $auto."product_seller";
           if(isset($product_seller)) 
        $google_seo_schema_product .=' Available from: <span itemprop="'.$$product_seller.'">'.$$product_seller.'</span>';
           $product_offer = $auto."offer_condition";
        $google_seo_schema_product .= 'Condition: <span itemprop="condition" content="Good"> Good </span>';
           $product_stock = $auto."offer_stock"; 
	if(isset($product_stock))
        $google_seo_schema_product .= '<span itemprop="availability" content="in_stock"> '.$$product_stock.'! Order now!</span>';
	$google_seo_schema_product .= '</span> </span></div>';
 return  $text.$google_seo_schema_product;

 }

function google_seo_schema_add_product() {
global $post;
$prefix = 'google_snippets';
$google_seo_schema_product = get_post_meta( $post->ID, $prefix.'product_name', true );

if($google_seo_schema_product != '' && !is_home() ) {
add_filter( "the_content", "google_seo_schema_product" );
}
}
add_action( 'wp', 'google_seo_schema_add_product' ); 

?>
