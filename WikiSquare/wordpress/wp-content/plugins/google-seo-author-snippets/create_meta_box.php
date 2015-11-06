<?php
class ADD_META_BOX {
	protected $meta_box;
	//Create meta box based on given data
	function __construct( $meta_box )  {
		$this->_meta_box = $meta_box;
        	add_action( 'add_meta_boxes', array( &$this, 'add' ) ); 
		add_action( 'save_post', array( &$this, 'save' ) );
	}
	//Add meta box for multiple post types
	function add() {
		global $wpdb;
                $post_var=get_option('post_check');
                foreach( $post_var as $page =>$value )
                   {   
			add_meta_box(
					$this->_meta_box['id'],
					$this->_meta_box['title'],
					array( &$this, 'show' ),
					$page,
					$this->_meta_box['context'],
					$this->_meta_box['priority']
				    );
		}
	}
	function save($post_id){

		$people=$this->_meta_box['people_fields'];
                foreach($people as $people_field) {
                $key = $people_field['id'];
                if(!empty($_POST[$key])) 
		        update_post_meta($post_id,$key,$_POST[$key]);
                 }
                foreach($this->_meta_box['org_fields'] as $org_field) {
                $org_key = $org_field['id'];
                  if(!empty($_POST[$org_key])) 
                update_post_meta($post_id,$org_key,$_POST[$org_key]);
                 } 
                foreach($this->_meta_box['events_fields'] as $event_field) {
                $event_key = $event_field['id']; 
                  if(!empty($_POST[$event_key]))
                update_post_meta($post_id,$event_key,$_POST[$event_key]);
                 } 
               foreach($this->_meta_box['product_fields'] as $product_field) {
                $product_key = $product_field['id'];
                  if(!empty($_POST[$product_key]))  
                update_post_meta($post_id,$product_key,$_POST[$product_key]);
                 } 
                foreach($this->_meta_box['music_fields'] as $music_field) {
                $music_key = $music_field['id'];
                  if(!empty($_POST[$music_key]))  
                update_post_meta($post_id,$music_key,$_POST[$music_key]);
                 } 
                foreach($this->_meta_box['receipes_fields'] as $receipes_field) {
                $receipes_key = $receipes_field['id'];
                  if(!empty($_POST[$receipes_key]))  
                update_post_meta($post_id,$receipes_key,$_POST[$receipes_key]);
                 } 
                foreach($this->_meta_box['software_fields'] as $software_field) {
                $software_key = $software_field['id'];
                  if(!empty($_POST[$software_key])) 
                update_post_meta($post_id,$software_key,$_POST[$software_key]);
                 } 
                foreach($this->_meta_box['videos_fields'] as $videos_field) {
                         $videos_key = $videos_field['id'];
                  if(!empty($_POST[$videos_key])) 
                update_post_meta($post_id,$videos_key,$_POST[$videos_key]);
                 }
		$review = $this->_meta_box['review_fields'];
		foreach($review as $review_fields){
		   $review_key = $review_fields['id'];
		 if(!empty($_POST[$review_key]))
		  update_post_meta($post_id,$review_key,$_POST[$review_key]);
		}
		$review_rating = $this->_meta_box['review_rating_fields'];
		foreach($review_rating as $review_rating_fields){
		  $review_rating_key = $review_rating_fields['id'];
		 if(!empty($_POST[$review_rating_key]))
		   update_post_meta($post_id,$review_rating_key,$_POST[$review_rating_key]);
		}
  
	}

	function show()
	{
		global $post;
                $title = '';
                $id = ''; 
                global $wpdb;
                $post_values = array('post/product-title','post/product-image','product_category','product_description');
                $google = array( 'google_snippetspeople_name','google_snippetspeople_nick_name','google_snippetspeople_home_page_url','google_snippetspeople_street_address','google_snippetspeoeple_locality','google_snippetspeople_region','google_snippetspeople_postal_code','google_snippetspeople_country_name','google_snippetspeople_title','google_snippetspeople_affliation','google_snippetspeople_friend_name','google_snippetspeople_friend_url','google_snippetsorganisation_name','google_snippetsorganisation_url','google_snippetsorganisation_street_address','google_snippetsorganisation_address_locality','google_snippetsorganisation_address_region','google_snippetsorganisation_postal_code','google_snippetsorganisation_country','google_snippetsorganisation_telephone','google_snippetsorganisation_logo','google_snippetsorganisation_longitude','google_snippetsorganisation_latitude','google_snippetsevents_summary'
,'google_snippetsevents_url','google_snippetsevents_photo','google_snippetsevents_location','google_snippetsevents_description','google_snippetsevents_startdate','google_snippetsevents_enddate','google_snippetsevents_street_address','google_snippetsevents_locality','google_snippetsevents_region','google_snippetsevents_longitude','google_snippetsevents_latitude','google_snippetsevents_eventtype','google_snippetsevents_offer_aggregate','google_snippetslow_price','google_snippetshigh_price','google_snippetsoffer_url','google_snippetsevents_ticket_price','google_snippetsevents_website','google_snippetsevents_ticket_quantity','google_snippetsevents_tickets_price_valid','google_snippetsevents_tickets_currency','google_snippetsproduct_name' ,'google_snippetssku','google_snippetsproduct_image','google_snippetsproduct_description','google_snippetsproduct_category','google_snippetsproduct_currency','google_snippetsbrand_name','google_snippetsoffer_regular_price','google_snippetsoffer_sale_price','google_snippetsoffer_available_from','google_snippetsoffer_condition','google_snippetsproduct_seller','google_snippetsoffer_valid_upto','google_snippetsoffer_stock','google_snippetsmusic_group'
 ,'google_snippetstrack_name','google_snippetstrack_length','google_snippetsplay_count','google_snippetsplay_url','google_snippetsbuy_url','google_snippetsalbum_link','google_snippetsreceipes_name','google_snippetsreceipes_photo','google_snippetsreceipes_author','google_snippetsreceipes_published','google_snippetsreceipes_summary','google_snippetsreceipes_preptime','google_snippetsreceipes_cooktime','google_snippetsreceipes_totaltime','google_snippetsreceipes_yield','google_snippetsreceipes_nutrition'
 ,'google_snippetsreceipes_ingredient','google_snippetsreceipes_ingredient_amount','google_snippetsreceipes_servingsize'
 ,'google_snippetsreceipes_calories','google_snippetsreceipes_fat','google_snippetsreceipes_instructions'
 ,'google_snippetssoftware_name','google_snippetssoftware_description','google_snippetssoftware_url','google_snippetssoftware_image'  ,'google_snippetssoftware_author','google_snippetssoftware_aggregate_rating','google_snippetssoftware_reveiws','google_snippetssoftware_content_rating','google_snippetssoftware_operationg_systems','google_snippetssoftware_category','google_snippetssoftware_version','google_snippetssofware_interaction_count','google_snippetssofware_review_count','google_snippetssofware_review_author','google_snippetssofware_review_publish_date','google_snippetssofware_review_description','google_snippetssofware_price','google_snippetsvideo_name','google_snippetsvideo_image_src','google_snippetsvideo_video_src','google_snippetsupload_date','google_snippetsexpire_date','google_snippetsembed_url','google_snippetsvideo_description','google_snippetsvideo_type','google_snippetsvideo_duration' );
		$custom_fields = array();
		
                $custom_fields = get_post_custom_keys($post->ID);
		if(isset($custom_fields)){
		//$custom_fields = array($custom_fields);
		//$custom_field_keys = array();
                $custom_field_keys = array_merge($custom_fields,$post_values);
		}
            //    print_r($custom_field_keys);die;
                // foreach ( $custom_field_keys as $key => $value ) {
                // $valuet = trim($value);
                // if(!in_array($value, $google ,True))
                // echo $key . " => " . $value . "<br />";
                // }
                $get = get_option('snippet_settings');
                $get_avail_types = get_option('post_check');
                
                foreach($get as $key => $type) {
                     if( (isset($key)) && ($key ==  get_post_type($post->ID))) {          
                     if($type == 'Rich snippets - Events') { $events = 'Events *';  }
                         else { $events = 'Events';}
                     if($type == 'Rich snippets - Music') { $music = 'Music *';  }
                         else { $music = 'Music';}
                     if($type == 'Rich snippets - Organizations') { $org = 'Organisation *';  }
                         else { $org = 'Organisation';}
                     if($type == 'Rich snippets - People') { $people = 'People *'; }
                         else { $people = 'People';}
                     if($type == 'Rich snippets - Products') { $product = 'Products *';} 
                         else { $product = 'Products';}
                     if($type == 'Rich snippets - Recipes') { $receipes = 'Receipes *'; }
                         else { $receipes = 'Receipes';}
                     if($type == 'Rich snippets - Reviews') { $review = 'Review *';  }
                         else { $review = 'Review';}
                     if($type == 'Rich snippets - Software applications') { $soft = 'Software *';  }
                         else { $soft = 'Software';}
                     if($type == 'Rich snippets - Videos: Facebook Share and RDFa') { $video = 'Videos *';  }
                         else { $video = 'Videos';}


                }
                }
                ?>
               
                <div class = "google_seo_meta_box">
                      
                  <ul class="google_seo_metabox-tabs" id="google_seo_metabox-tabs">
			<li class="active people"><a class="active" href="javascript:void(null);"><?php _e($people); ?></a></li>
                        <li class="organization"><a href="javascript:void(null);"><?php _e($org ); ?></a></li>
                        <li class="events"><a href="javascript:void(null);"><?php _e($events); ?></a></li>
	           	<li class="product"><a href="javascript:void(null);"><?php _e($product); ?></a></li>
		<!--	<li class="breadcrumbs"><a href="javascript:void(null);"><?php //_e( 'Breadcrumbs' ); ?></a></li> -->
			<li class="music"><a href="javascript:void(null);"><?php _e($music); ?></a></li>
			<li class="receipes"><a href="javascript:void(null);"><?php _e($receipes); ?></a></li>
			<li class="software"><a href="javascript:void(null);"><?php _e($soft); ?></a></li>
			<li class="videos"><a href="javascript:void(null);"><?php _e($video); ?></a></li>
	        	<li class="review"><a href="javascript:void(null);"><?php  _e($review); ?></a></li> 
                  </ul>
                    
              <div class= "people">
                      <table class="form-table">
                       <h4 class="heading"><?php _e( 'people'); ?></h4>
                         <?php
		        foreach($this->_meta_box['people_fields'] as $field){
			$title=$field['name'];
			$id=$field['id'];
			$value=get_post_meta($post->ID,$id,true);
                       // echo '<pre>'; print_r($value); die; 
                         ?>
                        <tr valign="top"> <th> 
                        <label for="google_seo_meta_title"><?php  _e( $title );  ?></label>
                        </th>
			<!--<td>
			<?php if($field['type']=='checkbox'){ ?>
                        <div class="socialaccess">
                        <?php echo '<input type="checkbox" id="'.$field['id'].'" name="'.$field['id'].'" style="display:none"/><label for="'.$field['id'].'" /></label>' ?>
                        </div><?php } ?>
                        </td>-->
                         <td><?php
		         if(isset($field['type']) && ($field['type'] =='datepicker')){
                                   echo '<input type="date" id="'.$field['id'].'" name="'.$field['id'].'" value="'.$value.'" />';
                       echo '<script type="text/javascript">'.
                     '       jQuery(document).ready(function($) {'.
                     '          var dateField = "'. $field['id'] .'";'.
                     '          $(\'#\'+dateField).datepick({ '.
                     '           minDate: new Date()'.
                     '          });'.
                     '       });'.
                     '</script>';
			}elseif(isset($field['type'] ) && ($field['type'] == 'textarea')){ 
			     	echo '<textarea id="'.$field['id'].'" name="'.$field['id'].'"   row = "10" col ="10" class = "large_text" rows="2">'.$value.' </textarea>';
                                 }
                         else { ?>
                                  <input type="text"  class="large_text" id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" value="<?php echo $value;?>"  > <?php }?>
				</td>
                         </tr>
                   <?php }?>
                       </table>
                  </div> <!-- People -->   
              <div class= "organization">
                      <table class="form-table">
                       <h4 class="heading"><?php _e( 'organization'); ?></h4>
                         <?php
		        foreach($this->_meta_box['org_fields'] as $org_field){
			$org_title=$org_field['name'];
			$org_id=$org_field['id'];
			$org_value=get_post_meta($post->ID,$org_id,true);
                         ?>
                        <tr> <th> 
                         <label for="google_seo_meta_title"><?php  _e( $org_title );  ?></label>
                          </th>
                          <td><?php
		         if(isset($org_field['type']) && ($org_field['type']=='datepicker')){
                                   echo '<input type="date" id="'.$org_field['id'].'" name="'.$org_field['id'].'" value="'.$org_value.'" />';
                       echo '<script type="text/javascript">'.
                     '       jQuery(document).ready(function($) {'.
                     '          var dateField = "'. $org_field['id'] .'";'.
                     '          $(\'#\'+dateField).datepick({ '.
                     '           minDate: new Date()'.
                     '          });'.
                     '       });'.
                     '</script>';
			}
                         elseif(isset($org_field['type']) && ($org_field['type'] == 'textarea')){ 
                                echo '<textarea id="'.$org_field['id'].'" name="'.$org_field['id'].'"   class = "large_text" rows="2">'.$org_value.' </textarea>';
                                 }
                            else{ ?>
				
                                <input type="text" id="<?php echo $org_id; ?>" name="<?php echo $org_id; ?>"  class="large-text"  value="<?php echo $org_value; ?>" />     <?php }?>
				</td>
                         </tr>
                   <?php }?>
                       </table>
                  </div> <!-- org -->   
              <div class= "events">
                      <table class="form-table">
                       <h4 class="heading"><?php _e( 'Events'); ?></h4>
                         <?php
		        foreach($this->_meta_box['events_fields'] as $event_field){
                        $event_title=$event_field['name'];
			$event_id=$event_field['id'];
			$event_value=get_post_meta($post->ID,$event_id,true);
                         ?>
                        <tr> <th> 
                         <label for="google_seo_meta_title"><?php  _e( $event_title );  ?></label>
                          </th>
                          <td><?php
		         if(isset($event_field['type'] ) && ($event_field['type']=='datepicker')){
                                   echo '<input type="date" id="'.$event_field['id'].'" name="'.$event_field['id'].'" value="'.$event_value.'" />';
                       echo '<script type="text/javascript">'.
                     '       jQuery(document).ready(function($) {'.
                     '          var dateField = "'. $event_field['id'] .'";'.
                     '          $(\'#\'+dateField).datepick({ '.
                     '           minDate: new Date()'.
                     '          });'.
                     '       });'.
                     '</script>';
			}
                       else if(isset($event_field['type']) && ($event_field['type'] == 'textarea')){ 
                                echo '<textarea id="'.$event_field['id'].'" name="'.$event_field['id'].'"   class = "large_text" rows="2">'.$event_value.' </textarea>';
                                 }

                          else{ ?>
				
                                <input type="text" id="<?php echo $event_id; ?>" name="<?php echo $event_id; ?>"  class="large-text"  value="<?php echo $event_value; ?>" />     <?php }?>
				</td>
                         </tr>
                   <?php }?>
                       </table>
                  </div> <!-- Events -->   
              <div class= "product">
                      <table class="form-table">
                       <h4 class="heading"><?php _e( 'Products'); ?></h4>
                           
                        <?php
		        foreach($this->_meta_box['product_fields'] as $product_field){
                        $product_title=$product_field['name'];
			$product_id=$product_field['id'];
			$product_value=get_post_meta($post->ID,$product_id,true);
                        ?> 
                        <tr> <th>
                         <?php if(($product_title != 'ptype')  ) { ?> 
                         <label for="google_seo_meta_title"><?php  _e( $product_title );  ?></label>
                         <?php } ?>
                          </th>
				<td>
                        <?php if($product_field['type']=='checkbox'){ ?>
                        <div class="socialaccess" style="float:right;margin-top:2px;">
                        <?php echo '<input type="checkbox" id="'.$product_field['id'].'" name="'.$product_field['id'].'" style="display:none;"/><label for="'.$product_field['id'].'" /></label>' ?>
                        </div><?php } ?>
                        </td>
                          <td><?php
				 $get_auto = get_option('auto');
				 if(!empty($get_auto)){
				  $manual_product = '';
                                 foreach($get_auto as $auto_key => $auto_val) { if($auto_key == 'product') { 
                                  $manual_product = 'on'; } else { $manual_product = 'off'; }  }}
                                if(isset($manual_product) && ($manual_product != 'on')) {
		         if($product_field['type']=='datepicker'){
                                   echo '<input type="date" id="'.$product_field['id'].'" name="'.$product_field['id'].'" value="'.$product_value.'" />';
                       echo '<script type="text/javascript">'.
                     '       jQuery(document).ready(function($) {'.
                     '          var dateField = "'. $product_field['id'] .'";'.
                     '          $(\'#\'+dateField).datepick({ '.
                     '           minDate: new Date()'.
                     '          });'.
                     '       });'.
                     '</script>';
			}
                             if($product_field['type'] == 'textarea'){
                                echo '<textarea id="'.$product_field['id'].'" name="'.$product_field['id'].'"  class = "large_text" rows="2">'.$product_value.' </textarea>';
                                 }
                             if($product_field['type'] == 'text'){ ?>
			   <input type="text" id="<?php echo $product_id; ?>" name="<?php echo $product_id; ?>"  class="large-text"  value="<?php echo $product_value; ?>" /> 
                             <?php   } ?> 
                      <?php  if($product_field['type'] == 'checkbox' ) {
                                               echo '<label style = "float:left;"><input type = "hidden"  name = "'.$product_field['id'].'" id = "'.$product_field['id'].'"  value = "off" />  </label>'; ?> 
                      <?php } ?>
                       
                       
                        
                                        <?php  } else { ?>
                      <?php if($product_field['type'] != 'checkbox' ) {
                       ?> 
                           <select class="large_text" id="<?php echo $product_field['id'] ?>"  name= "<?php echo $product_field['id'] ?>" />                    <option value ="<?php  echo $product_value;?> " > <?php echo $product_value; ?> </option>
                           <?php if(isset($custom_field_keys)){foreach ( $custom_field_keys as $cf_key => $cf_val ) {
                           if((!in_array($cf_val, $google ,TRUE)) && ($cf_val != '_edit_last') && ($cf_val != '_edit_lock'))  { ?>
                           <?php if((isset($cf_val)) && (trim($cf_val)) ) ?>
                           <option value= "<?echo $cf_val;?>"> <?php echo $cf_val;?>  </option>     <?php } }} ?>
                           </select>    
                      <?php } else { ?>
                              <div style = "float:left"> <?php
                        echo '<label style = "float:left;"><input type = "hidden"  name = "'.$product_field['id'].'" id = "'.$product_field['id'].'"  value = "on"                        /> </label>'; ?>
                           
                        </div>
                           <?php } }?> 
			</td></tr>
                           <?php }?>
                       </table>
                  </div> <!-- Products -->   
              <div class= "music">
                      <table class="form-table">
                       <h4 class="heading"><?php _e( 'Music'); ?></h4>
                         <?php
		        foreach($this->_meta_box['music_fields'] as $music_field){
                        $music_title=$music_field['name'];
			$music_id=$music_field['id'];
			$music_value=get_post_meta($post->ID,$music_id,true);
                         ?>
                        <tr> <th> 
                         <label for="google_seo_meta_title"><?php  _e( $music_title );  ?></label>
                          </th>
                          <td><?php
		         if(isset($music_field['type']) && ($music_field['type']=='datepicker')){
                                   echo '<label>'.$music_field['name'].'</label><input type="date" id="'.$music_field['id'].'" name="'.$music_field['id'].'" value="'.$music_value.'" />';
                       echo '<script type="text/javascript">'.
                     '       jQuery(document).ready(function($) {'.
                     '          var dateField = "'. $music_field['id'] .'";'.
                     '          $(\'#\'+dateField).datepick({ '.
                     '           minDate: new Date()'.
                     '          });'.
                     '       });'.
                     '</script>';
			}else{ ?>
				
                                <input type="text" id="<?php echo $music_id; ?>" name="<?php echo $music_id; ?>"  class="large-text"  value="<?php echo $music_value; ?>" />     <?php }?>
				</td>
                         </tr>
                   <?php }?>
                       </table>
                  </div> <!-- Music -->   
              <div class= "receipes">
                      <table class="form-table">
                       <h4 class="heading"><?php _e( 'Receipes'); ?></h4>
                         <?php
		        foreach($this->_meta_box['receipes_fields'] as $receipes_field){
                        $receipes_title=$receipes_field['name'];
			$receipes_id=$receipes_field['id'];
			$receipes_value=get_post_meta($post->ID,$receipes_id,true);
                         ?>
                        <tr> <th> 
                         <label for="google_seo_meta_title"><?php  _e( $receipes_title );  ?></label>
                          </th>
                          <td><?php
		         if(isset($receipes_field['type']) && ($receipes_field['type']=='datepicker')){
                                   echo '<input type="date" id="'.$receipes_field['id'].'" name="'.$receipes_field['id'].'" value="'.$receipes_value.'" />';
                       echo '<script type="text/javascript">'.
                     '       jQuery(document).ready(function($) {'.
                     '          var dateField = "'. $receipes_field['id'] .'";'.
                     '          $(\'#\'+dateField).datepick({ '.
                     '           minDate: new Date()'.
                     '          });'.
                     '       });'.
                     '</script>';
			}else{ ?>
				
                                <input type="text" id="<?php echo $receipes_id; ?>" name="<?php echo $receipes_id; ?>"  class="large-text"  value="<?php echo $receipes_value; ?>" />     <?php }?>
				</td>
                         </tr>
                   <?php }?>
                       </table>
                  </div> <!-- Receipes -->   
              <div class= "software"><!-- Software -->
                      <table class="form-table">
                       <h4 class="heading"><?php _e( 'Software'); ?></h4>
                         <?php
		        foreach($this->_meta_box['software_fields'] as $software_field){
                        $software_title=$software_field['name'];
			$software_id=$software_field['id'];
			$software_value=get_post_meta($post->ID,$software_id,true);
                         ?>
                        <tr> <th> 
                         <label for="google_seo_meta_title"><?php  _e( $software_title );  ?></label>
                          </th>
                          <td><?php
		         if(isset($software_field['type']) && ($software_field['type']=='datepicker')){
                                   echo '<input type="date" id="'.$software_field['id'].'" name="'.$software_field['id'].'" value="'.$software_value.'" />';
                       echo '<script type="text/javascript">'.
                     '       jQuery(document).ready(function($) {'.
                     '          var dateField = "'. $software_field['id'] .'";'.
                     '          $(\'#\'+dateField).datepick({ '.
                     '           minDate: new Date()'.
                     '          });'.
                     '       });'.
                     '</script>';
			}
                        else if(isset($software_field['type']) && ($software_field['type'] == 'textarea')){
                                echo '<textarea id="'.$software_field['id'].'" name="'.$software_field['id'].'"  class = "large_text" rows="2">'.$software_value.' </textarea>';
                                 }

                      else{ ?>
				
                                <input type="text" id="<?php echo $software_id; ?>" name="<?php echo $software_id; ?>"  class="large-text"  value="<?php echo $software_value; ?>" />     <?php }?>
				</td>
                         </tr>
                   <?php }?>
                       </table>
                  </div> <!-- Sorftware  -->   
              <div class= "videos"><!-- Software -->
                      <table class="form-table">
                       <h4 class="heading"><?php _e( 'Videos'); ?></h4>
                         <?php
		        foreach($this->_meta_box['videos_fields'] as $videos_field){
                        $videos_title=$videos_field['name'];
			$videos_id=$videos_field['id'];
			$videos_value=get_post_meta($post->ID,$videos_id,true);
                         ?>
                        <tr> <th> 
                         <label for="google_seo_meta_title"><?php  _e( $videos_title );  ?></label>
                          </th>
                          <td><?php
		         if(isset($videos_field['type']) && ($videos_field['type']=='datepicker')){
                                   echo '<input type="date" id="'.$videos_field['id'].'" name="'.$videos_field['id'].'" value="'.$videos_value.'" />';
                       echo '<script type="text/javascript">'.
                     '       jQuery(document).ready(function($) {'.
                     '          var dateField = "'. $videos_field['id'] .'";'.
                     '          $(\'#\'+dateField).datepick({ '.
                     '           minDate: new Date()'.
                     '          });'.
                     '       });'.
                     '</script>';
			}else{ ?>
				
                                <input type="text" id="<?php echo $videos_id; ?>" name="<?php echo $videos_id; ?>"  class="large-text"  value="<?php echo $videos_value; ?>" />     <?php }?>
				</td>
                         </tr>
                   <?php }?>
                       </table>
                  </div> <!-- Sorftware  -->  
                   <div class= "review"><!-- Review -->
                      <table class="form-table">
                       <h4 class="heading"><?php _e( 'Review'); ?></h4>
                         <?php
                        foreach($this->_meta_box['review_fields'] as $review_field){
                        $review_title=$review_field['name'];
                        $review_id=$review_field['id'];
                        $review_value=get_post_meta($post->ID,$review_id,true);
                         ?>
                        <tr> <th>
                         <label for="google_seo_meta_title"><?php  _e( $review_title );  ?></label>
                          </th>
                          <td><?php
                             $i = 1;
                             if($i ==1) {
                         if(isset($review_field['type']) && ($review_field['type']=='datepicker')){
                                   echo '<input type="date" id="'.$review_field['id'].'" name="'.$review_field['id'].'" value="'.$review_value.'" />';
                       echo '<script type="text/javascript">'.
                     '       jQuery(document).ready(function($) {'.
                     '          var dateField = "'. $review_field['id'] .'";'.
                     '          $(\'#\'+dateField).datepick({ '.
                     '           minDate: new Date()'.
                     '          });'.
                     '       });'.
                     '</script>';
                        }else{ ?>

                                <input type="text" id="<?php echo $review_id; ?>" name="<?php echo $review_id; ?>"  class="large-text"  value="<?php echo $review_value; ?>" />     <?php } } else {
                                 if($review_field['type'] != 'checkbox' ) {
                       ?>


                           <select class="large_text" id="<?php echo $review_field['id'] ?>"  name= "<?php echo $review_field['id'] ?>" />                    <option value ="<?php  echo $review_value;?> " > <?php echo $review_value; ?> </option>
                           <?php foreach ( $custom_field_keys as $cf_key => $cf_val ) {
                           if((!in_array($cf_val, $google ,TRUE)) && ($cf_val != '_edit_last') && ($cf_val != '_edit_lock'))  { ?>
                           <?php if((isset($cf_val)) && (trim($cf_val)) ) ?>
                           <option value= "<?echo $cf_val;?>"> <?php echo $cf_val;?>  <option>     <?php } } ?>
                           </select>
                      <?php } else { ?>
                              <div style = "float:left"> <?php
                        echo '<label style = "float:left;"><input type = "hidden"  name = "'.$review_title.'" id = "'.$review_id.'"                             /> </label>'; ?>

                        </div>
                           <?php } }?>

                                </td>
                         </tr>
                   <?php }   ?>

                       
                       </table>
                  </div> <!-- Review  -->
 
                 </div><!-- End Meta Box -->
     <?php
        }
}
//$prefix = '';
$prefix='google_snippets';
$meta_box=array();
$meta = array();
$meta_box[]=array(
		'id'=>'metagroup',
		'title'=>'Google SEO Pressor Rich Snippets',
		'pages'=> array('post','page','custom_type'),
		'context' => 'advanced',
		'priority' => 'high',
		'people_fields'=>array(
			array( 'id'=>$prefix.'people_name', 'name'=>'Name','type'=>'Text','eg'=>'// Eg: Sa' ),
			array( 'id'=>$prefix.'people_nick_name','name'=>'Nick Name','type'=>'Text','eg'=>'//Enter The People Nick Name ' ),
			array( 'id'=>$prefix.'people_home_page_url', 'name'=>'Home page url'),
			array( 'id'=>$prefix.'people_street_address', 'name'=>'Street Address','type' =>'textarea' ),
			array( 'id'=>$prefix.'people_role', 'name'=>'Role','type'=>'Text'),
			array( 'id'=>$prefix.'peoeple_locality', 'name'=>'Locality' ),
			array( 'id'=>$prefix.'people_region', 'name'=>'Region'),
			array( 'id'=>$prefix.'people_postal_code', 'name'=>'Postal Code'),
			array( 'id'=>$prefix.'people_country_name','name'=>'Country Name'),
			array( 'id'=>$prefix.'people_title', 'name'=>'Person Title'),
			array( 'id'=>$prefix.'people_affliation', 'name'=>'Affiliation' ),
			array( 'id'=>$prefix.'people_friend_name', 'name'=>'Friend Name'),
			array( 'id'=>$prefix.'people_friend_url', 'name'=>'Friend Url' )
			     ),
			
		'events_fields' =>  array(
			array( 'id'=>$prefix.'events_summary', 'name'=>'Summary' ),
			array( 'id'=>$prefix.'events_url', 'name'=>'Events Url'),
			array( 'id'=>$prefix.'events_photo','name'=>'Photo'),
		        array( 'id'=>$prefix.'events_location','name'=>'Location'),
			array( 'id'=>$prefix.'events_description','name'=>'Description','type' => 'textarea'),
			array( 'id'=>$prefix.'events_startdate', 'name'=>'Start Date','type'=>'datepicker'),
		        array( 'id'=>$prefix.'events_enddate', 'name'=>'End Date', 'type'=>'datepicker' ),
			array( 'id'=>$prefix.'events_street_address', 'name'=>'Street Address'),
			array( 'id'=>$prefix.'events_locality', 'name'=>'Locality' ),
		        array( 'id'=>$prefix.'events_region', 'name'=>'Region' ),
			array( 'id'=>$prefix.'events_longitude', 'name'=>'Longitude'),
		        array( 'id'=>$prefix.'events_latitude', 'name'=>'Latitude' ),
                        array( 'id'=>$prefix.'events_eventtype', 'name'=>'Event type' ),
			array( 'id'=>$prefix.'events_offer_aggregate', 'name'=>'Offer aggregate' ),
			array( 'id'=>$prefix.'low_price', 'name'=>'Low Price' ),
			array( 'id'=>$prefix.'high_price', 'name'=>'High Price' ),
			array( 'id'=>$prefix.'offer_url', 'name'=>'Offer Url' ),
		        array( 'id'=>$prefix.'events_ticket_price', 'name'=>'Price' ),
		        array( 'id'=>$prefix.'events_website', 'name'=>'Events Website' ),
			array( 'id'=>$prefix.'events_ticket_quantity', 'name'=>'Ticket Quantity' ),
			array( 'id'=>$prefix.'events_tickets_price_valid', 'name'=>'Price valid Until', 'type'=>'datepicker'),
			array( 'id'=>$prefix.'events_tickets_currency', 'name'=>'Tickets currency' ) ), 
						    
                 'music_fields' => array(
                        array( 'id'=>$prefix.'music_group', 'name'=>'Music Group'),
                        array( 'id'=>$prefix.'track_name', 'name'=>'Track Name'),
                        array( 'id'=>$prefix.'track_length', 'name'=>'Album Duration Time' ),
                        array( 'id'=>$prefix.'play_count', 'name'=>'No.of time plays' ),
                        array( 'id'=>$prefix.'play_url', 'name'=>'Play Track' ),
                        array( 'id'=>$prefix.'buy_url', 'name'=>'Buy Track ' ),
                        array( 'id'=>$prefix.'album_link', 'name'=>'Album Link')
                                          ),
		 'org_fields' => array(
			array( 'id'=>$prefix.'organisation_name','name'=>'Name'),
			array( 'id'=>$prefix.'organisation_url', 'name'=>'Url' ),
			array( 'id'=>$prefix.'organisation_street_address', 'name'=>'street address' ,'type' => 'textarea'),
			array( 'id'=>$prefix.'organisation_address_locality', 'name'=>'Address Locality' ),
			array( 'id'=>$prefix.'organisation_address_region', 'name'=>'Address Region' ),
			array( 'id'=>$prefix.'organisation_postal_code', 'name'=>'Postal code' ),
			array( 'id'=>$prefix.'organisation_country', 'name'=>'Country' ),
		        array( 'id'=>$prefix.'organisation_telephone', 'name'=>'Telephone' ),
			array( 'id'=>$prefix.'organisation_logo', 'name'=>'Logo' ),
			array( 'id'=>$prefix.'organisation_longitude', 'name'=>'Longitude' ),
			array( 'id'=>$prefix.'organisation_latitude', 'name'=>'Latitude' )
				     ),
		 'product_fields' => array(

//			array( 'id'=>$prefix.'product_manual_auto', 'name'=>'Manual/Auto product','type'=>'checkbox'),
                        array( 'id'=>$prefix.'product_name', 'name'=>'Product Name', 'type' => 'text'),
                        array( 'id'=>$prefix.'sku', 'name'=>'Sku' , 'type' => 'text' ),
                        array( 'id'=>$prefix.'product_image', 'name'=>'Product Image' ,'type'=> 'text'),
			array( 'id'=>$prefix.'product_price', 'name'=>'Price' ,'type'=> 'text'),
                        array( 'id'=>$prefix.'product_category', 'name'=>'Product Category','type' => 'text'),
                        array( 'id'=>$prefix.'product_currency', 'name'=>'Product Currency','type' => 'text'),
                        array( 'id'=>$prefix.'brand_name', 'name'=>'Brand Name','type' => 'text'),
                        array( 'id'=>$prefix.'offer_regular_price', 'name'=>'Offer Regular Price','type' => 'text'),
                        array( 'id'=>$prefix.'offer_sale_price', 'name'=>'Offer Sale Price','type' => 'text'),
                        array( 'id'=>$prefix.'offer_available_from','name'=>'Offer Available From','type' => 'datepicker'),
                        array( 'id'=>$prefix.'offer_condition', 'name'=>'Offer Condition','type' => 'datepicker'),
                        array( 'id'=>$prefix.'product_seller', 'name'=>'Seller', 'type' => 'text'),
                        array( 'id'=>$prefix.'offer_valid_upto', 'name'=>'Offer Valid Upto' ,'type'=>'datepicker'),
                        array( 'id'=>$prefix.'offer_stock', 'name'=>'Offer Stock','type' => 'text'),
                                     ),
		 'receipes_fields' => array(
                        array( 'id'=>$prefix.'receipes_name', 'name'=>'Receipes Name'),
                        array( 'id'=>$prefix.'receipes_photo', 'name'=>'Receipes Photo'),
                        array( 'id'=>$prefix.'receipes_author', 'name'=>'Receipes Author' ),
                        array( 'id'=>$prefix.'receipes_published', 'name'=>'Receipes Published','type'=> 'datepicker'),
                        array( 'id'=>$prefix.'receipes_summary', 'name'=>'Receipes Summary','type' => 'textarea' ),
                        array( 'id'=>$prefix.'receipes_preptime', 'name'=>'Receipes Preptime' ),
                        array( 'id'=>$prefix.'receipes_cooktime', 'name'=>'Receipes Cooktime' ),
                        array( 'id'=>$prefix.'receipes_totaltime', 'name'=>'Receipes Totaltime' ),
                        array( 'id'=>$prefix.'receipes_yield', 'name'=>'Receipes Yield' ),
                        array( 'id'=>$prefix.'receipes_nutrition', 'name'=>'Receipes Nutrition' ),
                        array( 'id'=>$prefix.'receipes_ingredient', 'name'=>'Receipes Ingredient' ),
                        array( 'id'=>$prefix.'receipes_ingredient_amount', 'name'=>'Ingredient Amount' ),
                        array( 'id'=>$prefix.'receipes_servingsize', 'name'=>'Receipes Serving Size'),
                        array( 'id'=>$prefix.'receipes_calories', 'name'=>'Receipes Calories' ),
                        array( 'id'=>$prefix.'receipes_fat', 'name'=>'Receipes Fat' ),
                        array( 'id'=>$prefix.'receipes_instructions', 'name'=>'Receipes Instructions' ,'type' => 'textarea')
                                             ),
		 'review_rating_fields' => array(
                        array( 'id'=>$prefix.'reviews_average', 'name'=>'Reviews Average' ),
                        array( 'id'=>$prefix.'reviews_best', 'name'=>'Reviews Best' ),
                        array( 'id'=>$prefix.'reviews_count', 'name'=>'Reviews Count')
                                                                                       
								     ),
		'review_fields' => array(
                         array( 'id'=>$prefix.'review_item_reviewed', 'name'=>'Item Reviewed' ),
                         array( 'id'=>$prefix.'review_rating', 'name'=>'Rating' ),
                         array( 'id'=>$prefix.'review_reviewer', 'name'=>'Reviewer' ),
                         array( 'id'=>$prefix.'review_date_reviewed', 'name'=>'Date Reviewed','type'=>'datepicker' ),
                         array( 'id'=>$prefix.'review_description', 'name'=>'Description','type' => 'textarea' ),
                         array( 'id'=>$prefix.'review_summary', 'name'=>'Summary')

								     ),
		'software_fields' => array(
                         array( 'id'=>$prefix.'software_name', 'name'=>'Name' ),
                         array( 'id'=>$prefix.'software_description', 'name'=>'Description','type'=> 'textarea' ),
                         array( 'id'=>$prefix.'software_url', 'name'=>'Url' ),
                         array( 'id'=>$prefix.'software_image', 'name'=>'Image' ),
                         array( 'id'=>$prefix.'software_author', 'name'=>'Author' ),
                         array( 'id'=>$prefix.'software_aggregate_rating', 'name'=>'Aggregate Rating' ),
                         array( 'id'=>$prefix.'software_reveiws', 'name'=>'Reviews'),
                       // array( 'id'=>$prefix.'software_offer', 'name'=>'Offers' ),
                         array( 'id'=>$prefix.'software_content_rating', 'name'=>'Content Rating' ),
                       //  array( 'id'=>$prefix.'software_date_published', 'name'=>'Date Published', 'type'=>'datepicker' ), 
                      //   array( 'id'=>$prefix.'software_inlanguage', 'name'=>'inLanguage' ),     
                         array( 'id'=>$prefix.'software_operationg_systems', 'name'=>'Operating Systems' ),   
                       //  array( 'id'=>$prefix.'software_filesize', 'name'=>'File size' ),     
                       //  array( 'id'=>$prefix.'software_file_format', 'name'=>'File format' ),   
                         array( 'id'=>$prefix.'software_category', 'name'=>'Software Application category'),
                       //  array( 'id'=>$prefix.'sofware_sub_category', 'name'=>'Software Application sub category' ),
                       //  array( 'id'=>$prefix.'software_downloadurl', 'name'=>'Download Url' ),
                         array( 'id'=>$prefix.'software_version', 'name'=>'Software version'),
 		       //  array( 'id'=>$prefix.'software_version_changes', 'name'=>'Version Changes' ),
                        // array( 'id'=>$prefix.'software_date_updated', 'name'=>'Software updated','type'=>'datepicker' ),
                       //  array( 'id'=>$prefix.'software_installurl', 'name'=>'Install url' ),
                       //  array( 'id'=>$prefix.'software_requiered_features', 'name'=>'Requierd Features' ),
                       //  array( 'id'=>$prefix.'software_provided_features', 'name'=>'Provided Features' ),
                         array( 'id'=>$prefix.'sofware_interaction_count', 'name'=>'User Downloads' ),
                         array( 'id'=>$prefix.'sofware_review_count', 'name'=>'Total Reviews' ),
                         array( 'id'=>$prefix.'sofware_review_author', 'name'=>'Review Author' ),
                         array( 'id'=>$prefix.'sofware_review_publish_date', 'name'=>'Review Date','type'=>'datepicker' ),
                         array( 'id'=>$prefix.'sofware_review_description', 'name'=>'Review Description' ),
                         array( 'id'=>$prefix.'sofware_price', 'name'=>'Software Price' ),
                       //  array( 'id'=>$prefix.'software_videos', 'name'=>'Videos' ),
                       //  array( 'id'=>$prefix.'software_screenshot', 'name'=>'screenshots' ),
                       //  array( 'id'=>$prefix.'software_permission', 'name'=>'Software permission' )
                          ),
		'videos_fields' => array(
 		         array(	'id'=>$prefix.'video_name', 'name'=>'Video Name' ),
 		         array(	'id'=>$prefix.'video_image_src', 'name'=>'Thumbnail Url' ),
                         array( 'id'=>$prefix.'video_video_src', 'name'=>'Video Url' ),
 		         array( 'id'=>$prefix.'upload_date', 'name'=>'Upload date' , 'type'=>'datepicker'),
 		         array( 'id'=>$prefix.'expire_date', 'name'=>'Expire date' , 'type'=>'datepicker'),
                         array( 'id'=>$prefix.'embed_url', 'name'=>'Embed Url' ),
                         array( 'id'=>$prefix.'video_description', 'name'=>'Video Description','type' => 'textarea' ),
                         array( 'id'=>$prefix.'video_type', 'name'=>'Video Type'),
                         array( 'id'=>$prefix.'video_duration', 'name'=>'Video Duration' )
                                                                             
								     )
                                                      );
foreach( $meta_box as $meta_b )
{
	new ADD_META_BOX( $meta_b );
}
