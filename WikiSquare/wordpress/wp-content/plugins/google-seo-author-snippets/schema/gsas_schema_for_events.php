<?php
if ( !defined( 'ABSPATH' ) ) exit;

function google_seo_schema_events($text) {
         global $post;
         $prefix = 'google_snippets';
       // Get the product values for schema
        $google_seo_events_summary = get_post_meta( $post->ID, $prefix.'events_summary', true );
        $google_seo_events_url = get_post_meta( $post->ID, $prefix.'events_url', true );
        $google_seo_events_photo = get_post_meta( $post->ID, $prefix.'events_photo', true );
        $google_seo_events_location = get_post_meta( $post->ID, $prefix.'events_location', true );
        $google_seo_events_description = get_post_meta( $post->ID, $prefix.'events_description', true );
        $google_seo_events_startdate = get_post_meta( $post->ID, $prefix.'events_startdate', true );
        $google_seo_events_enddate = get_post_meta( $post->ID, $prefix.'events_enddate', true );
        $google_seo_events_street_address = get_post_meta( $post->ID, $prefix.'events_street_address', true );
        $google_seo_events_locality = get_post_meta( $post->ID, $prefix.'events_locality', true );
        $google_seo_events_region = get_post_meta( $post->ID, $prefix.'events_region', true );
        $google_seo_events_longitude = get_post_meta( $post->ID, $prefix.'events_longitude', true );
        $google_seo_events_latitude = get_post_meta( $post->ID, $prefix.'events_latitude', true );
        $google_seo_events_offer_aggregate = get_post_meta( $post->ID, $prefix.'events_offer_aggregate', true );
        $google_seo_low_price = get_post_meta( $post->ID, $prefix.'low_price', true );
        $google_seo_high_price = get_post_meta( $post->ID, $prefix.'high_price', true );
        $google_seo_offer_url = get_post_meta( $post->ID, $prefix.'offer_url', true );
        $google_seo_events_type = get_post_meta( $post->ID, $prefix.'events_type', true );
        $google_seo_events_website = get_post_meta( $post->ID, $prefix.'events_website', true );
        $google_seo_events_ticket_price = get_post_meta( $post->ID, $prefix.'events_ticket_price', true );
        $google_seo_events_ticket_quantity = get_post_meta( $post->ID, $prefix.'events_ticket_quantity', true );
        $google_seo_events_tickets_price_valid = get_post_meta( $post->ID, $prefix.'events_tickets_price_valid', true );
        $google_seo_events_tickets_currency = get_post_meta( $post->ID, $prefix.'events_tickets_currency', true );

        $google_seo_schema_events = '';
        if(isset($google_seo_events_url))
        $google_seo_schema_events .= '<div itemscope itemtype="http://data-vocabulary.org/Event">​<a href="'.$google_seo_events_url.'" itemprop="url" >';
        $google_seo_schema_events .= '<span style="visibility: hidden;">';
        if(isset($google_seo_events_summary))
        $google_seo_schema_events .= '<span itemprop="summary">'.$google_seo_events_summary.'</span>';
        if(isset($google_seo_events_photo))
        $google_seo_schema_events .= ' </a> <img  style="width:75px;height:75px;" itemprop="photo" src="'.$google_seo_events_photo.'" />';
        if(isset($google_seo_events_description))
        $google_seo_schema_events .= '<span itemprop="description">'.$google_seo_events_description.'</span>';
        if(isset($google_seo_events_startdate))
       $google_seo_schema_events .= 'When: <time itemprop="startDate" datetime="'.$google_seo_events_startdate.'">'.$google_seo_events_startdate.'</time>- ';
       if(isset($google_seo_events_enddate))
       $google_seo_schema_events .= '<time itemprop="endDate" datetime="'.$google_seo_events_enddate.'">'.$google_seo_events_enddate.'</time>';
       if(isset($google_seo_events_location))
       $google_seo_schema_events .= ' Where:'.$google_seo_events_location;
       $google_seo_schema_events .= '
  ​<span itemprop="location" itemscope itemtype="http://data-vocabulary.org/​Organization">';
       $google_seo_schema_events .= ' ​<span itemprop="name">'.$google_seo_events_location.'</span>';
       $google_seo_schema_events .= '<span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">';
       if(isset($google_seo_events_street_address))
       $google_seo_schema_events .= ' <span itemprop="street-address">'.$google_seo_events_street_address.'</span>, ';
       if(isset($google_seo_events_locality))
       $google_seo_schema_events .= '  <span itemprop="locality">'.$google_seo_events_locality.'</span>, ';
       if(isset($google_seo_events_region))
       $google_seo_schema_events .='  <span itemprop="region">'.$google_seo_events_region.'</span> </span>';
       $google_seo_schema_events .='<span itemprop="geo" itemscope itemtype="http://data-vocabulary.org/​Geo">';
       if(isset($google_seo_events_latitude))
       $google_seo_schema_events .=' <meta itemprop="latitude" content="'.$google_seo_events_latitude.'" />';
       if(isset($google_seo_events_longitude))
       $google_seo_schema_events .= ' <meta itemprop="longitude" content="'.$google_seo_events_longitude.'" /> </span> </span>
          Category: <span itemprop="eventType">'.$google_seo_events_type.'</span>
  <span itemprop="ticketAggregate" itemscope itemtype="http://data-vocabulary.org/Offer-aggregate"> ';
       if((isset($google_seo_low_price)) && (isset($google_seo_high_price))) 
       $google_seo_schema_events .=' Tickets from $<span itemprop="lowPrice">'.$google_seo_low_price.'</span>-$<span itemprop="highPrice">'.$google_seo_high_price.'</span>';
       if(isset($google_seo_events_tickets_currency))
       $google_seo_schema_events .= '<span itemprop="currency" content="'.$google_seo_events_tickets_currency.'" /> ';
       if(isset($google_seo_events_ticket_quantity))
       $google_seo_schema_events .=' <span itemprop="offerCount">'.$google_seo_events_ticket_quantity.'</span> tickets available
    <span><a href="'.$google_seo_offer_url.'" itemprop="offerurl">
      '.$google_seo_events_website.'</span>See all available tickets</a>
  </span>';
       $google_seo_schema_events .='<span itemprop="tickets" itemscope itemtype="http://data-vocabulary.org/Offer"> 
    <a href="'.$google_seo_offer_url.'" itemprop="offerurl">Presale tickets</a>'; 
       $google_seo_schema_events .=' <span itemprop="price">$'.$google_seo_events_ticket_price.'</span><span itemprop="currency" content="'.$google_seo_events_tickets_currency.'" />';
       $google_seo_schema_events .=' till <time itemprop="priceValidUntil" datetime="'.$google_seo_events_tickets_price_valid.'">'.$google_seo_events_tickets_price_valid.'</time> ';
       $google_seo_schema_events .= ' (<span itemprop="quantity">'.$google_seo_events_ticket_quantity.'</span> available)  </span> ';
       $google_seo_schema_events .= '<span itemprop="tickets" itemscope itemtype="http://data-vocabulary.org/Offer">';
       $google_seo_schema_events .= '<a href="'.$google_seo_offer_url.'" itemprop="offerurl">Full-price tickets</a> ';
      $google_seo_schema_events .= ' <span itemprop="price">$'.$google_seo_events_ticket_price.'</span><span itemprop="currency" content="'.$google_seo_events_tickets_currency.'" /> 
  </span>
 </span>
</div>';

      return $text.$google_seo_schema_events;
}
function google_seo_schema_add_events() {
global $post;
$prefix = 'google_snippets';
$google_seo_event_name = get_post_meta( $post->ID, $prefix.'events_summary', true );
if( $google_seo_event_name != '' && !is_home() ) {
add_filter( "the_content", "google_seo_schema_events" );
}
}
add_action('wp', 'google_seo_schema_add_events');
?>
