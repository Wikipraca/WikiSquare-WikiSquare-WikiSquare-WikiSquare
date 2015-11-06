jQuery(document).ready(function() {
        // tab between them
        jQuery('.google_seo_metabox-tabs li a').each(function(i) {
                var thisTab = jQuery(this).parent().attr('class').replace(/active /, '');

                if ( 'active' != jQuery(this).attr('class') )
                        jQuery('div.' + thisTab).hide();

                jQuery('div.' + thisTab).addClass('tab-content');

                jQuery(this).click(function(){
                        // hide all child content
                        jQuery(this).parent().parent().parent().children('div').hide();

                        // remove all active tabs
                        jQuery(this).parent().parent('ul').find('li.active').removeClass('active');

                        // show selected content
                        jQuery(this).parent().parent().parent().find('div.'+thisTab).show();
                        jQuery(this).parent().parent().parent().find('li.'+thisTab).addClass('active');
                });
        });

        jQuery('.heading').hide();
        jQuery('.google_seo_metabox-tabs').show();
// choose_product();
        /******* Added for rating Start *******/
        /********* Added for repeating group directions End *************/
});

function enable_imageset() {
	if(document.getElementById('enable').checked == true){
		document.getElementById('smack-container').style.display='';
	}
	else{
		document.getElementById('smack-container').style.display='none';
	}
}

function disable_imageset() {
	if(document.getElementById('disable').checked == true){
		document.getElementById('smack-container').style.display='none';
	}
	else{
		document.getElementById('smack-container').style.display='';
	}
}

function choose_snippets(id) {
	if(id == 'post_type') {
		document.getElementById('disp_posttype').style.display= '';
	//	document.getElementById('disp_categories').style.display= 'none';
	}
	//if(id == 'taxo_type') { 
           else {
//		document.getElementById('disp_categories').style.display = '';
		document.getElementById('disp_posttype').style.display = 'none';
	} 

}
function choose_product(id ) {
   if(id == 'google_snippetsproduct_manual') {
   document.getElementById('manual').style.display = 'block';
   document.getElementById('auto').style.display = 'none';
   }
   else if(id == 'google_snippetsproduct_auto') {
     document.getElementById('manual').style.display = 'none';
     document.getElementById('auto').style.display = 'block';
   }

}
function auto(id) {  
     if(id != 'product') { 
      document.getElementById('showdanger').style.display = '';
      document.getElementById('showdanger').innerHTML = '<p style = "color:red;font-size:20px;margin-left:100px;" > This feature is only available for product post type </p>';
      jQuery("#showdanger").fadeOut(10000); 
          } 
  }  
function twit(id) { 
      document.getElementById('showdanger').style.display = '';
      document.getElementById('showdanger').innerHTML = '<p style = "color:red;font-size:20px;margin-left:100px;" > This feature is not available in this version</p>';
      jQuery("#showdanger").fadeOut(10000); 
} 
function post_format(id) 
    {
      document.getElementById('showdanger').style.display = '';
      document.getElementById('showdanger').innerHTML = '<p style = "color:red;font-size:20px;margin-left:100px;" > This feature is not available in this version</p>';
      jQuery("#showdanger").fadeOut(10000); 
       
     }

function sendemail2smackers() {
        var message_content = document.getElementById('message').value;
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
       var postdata = new Array();
	postdata ={'fname':firstname,'lname':lastname,'msg':message_content,}
        if(message_content != '' && firstname != '' && lastname != '') {
		
       jQuery.ajax({
		type: 'POST',
		url: ajaxurl,
		data: {
		    'action'   : 'send2smackers',
		    'postdata' : postdata,
		},
		success:function(data) {
		if(data == 'true') {  document.getElementById('warn').style.display = ''; 
                                      document.getElementById('warn').innerHTML = '<p style = "color:green" >Your Mail Has Been Sent Successfully</p>';
		jQuery("#warn").fadeOut(10000);
                                   } 
                else {
                          document.getElementById('warn').style.display = '';       
                          document.getElementById('warn').innerHTML = '<p style = "color:red" >Your Mail has been Failed to sent</p>';
		jQuery("#warn").fadeOut(10000);
                 }	
		},
		error: function(errorThrown){
			console.log(errorThrown);
		}
	});
        return true;   
        }
	else {
		document.getElementById('showMsg').style.display = '';
		document.getElementById('showMsg').innerHTML = '<p id="warning-msg" class="alert alert-warning">Fill all mandatory fields.</p>';
		jQuery("#showMsg").fadeOut(10000);
		return false;
     }
}
/*Js UI align*/
function gplusprofile(id) {
         if(document.getElementById('googleplus').checked == true)  {
                jQuery('#gpluslabel').removeClass("disableprofile");
                jQuery('#gpluslabel').addClass("enableprofile");
         }
	else {
		jQuery('#gpluslabel').addClass("disableprofile");
                jQuery('#gpluslabel').removeClass("enableprofile");
 	}
}
function fbprofile(id) {
        if(document.getElementById('facebook').checked == true) {
                jQuery('#fblabel').removeClass("disableprofile");
                jQuery('#fblabel').addClass("enableprofile");
        }
	else {
		jQuery('#fblabel').removeClass("enableprofile");
                jQuery('#fblabel').addClass("disableprofile");
	}
}
function twitprofile(id) {
	if(document.getElementById('twitter').checked == true) {
                jQuery('#twitlabel').removeClass("disableprofile");
                jQuery('#twitlabel').addClass("enableprofile");
        }
	else {
		jQuery('#twitlabel').removeClass("enableprofile");
                jQuery('#twitlabel').addClass("disableprofile");
 	}
 }
function linkinprofile(id) {
	if(document.getElementById('linkedin').checked == true) {
                jQuery('#linkinlabel').removeClass("disableprofile");
               jQuery('#linkinlabel').addClass("enableprofile");
	}
	else {
		jQuery('#linkinlabel').removeClass("enableprofile");
                jQuery('#linkinlabel').addClass("disableprofile");
	}
}
function geolocprofile(id) {
       	if(document.getElementById('location').checked == true) {
                jQuery('#geoloclabel').removeClass("disableprofile");
                jQuery('#geoloclabel').addClass("enableprofile");
	}
	else {
		jQuery('#geoloclabel').removeClass("enableprofile");
                jQuery('#geoloclabel').addClass("disableprofile");
        }
}
