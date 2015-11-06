<?php
$options = get_option('hssocial_badges');
$hssocial_facebook = $options['hssocial_facebook'];
$hssocial_linkedin = $options['hssocial_linkedin'];
$hssocial_youtube = $options['hssocial_youtube'];
$hssocial_twitter = $options['hssocial_twitter'];
$hssocial_google = $options['hssocial_google'];
$hssocial_pintrest = $options['hssocial_pintrest'];
$hssocial_ur_web = $options['hssocial_ur_web'];
$hssocial_mail = $options['hssocial_mail'];
$hssocial_skype = $options['hssocial_skype'];
$hssocial_instagram = $options['hssocial_instagram'];
$hssocial_flickr = $options['hssocial_flickr'];
$hssocial_xing = $options['hssocial_xing'];
$hssocial_tumblr = $options['hssocial_tumblr'];
$pos_lr = $options['pos_lr'];
$top_px = $options['top_px'];
$effect_bt = $options['effect_bt'];
$hide_mobile = $options['mobile'];
$plugin_url = WP_PLUGIN_URL . '/hs-social-media-buttons';
?>
<!--[if IE]>
<style>
   .social-icon {
    background-color: #33353B;
    background-image: url('<?php echo $plugin_url; ?>/images/social-icons.png'); 
}

</style>
<![endif]-->


<?php global $is_opera;
if ($is_opera == "yes") : ?>
    <style>
        .social-icon {
            background-color: #33353B;
            background-image: url('<?php echo $plugin_url; ?>/images/social-icons.png'); 
        }
    </style>    
<?php endif; ?>
<?php 
if($hide_mobile == 1):
?> 
    <style>
        @media (max-width:640px){
            .social-icon {
                display: none;
            }
        }
    </style>  
<?php endif; ?>
<div class="social-icons" style="top:<?php echo $top_px ?>px;">
    <?php if ($hssocial_facebook): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_facebook); ?>" id="facebook-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Facebook</span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_linkedin): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_linkedin); ?>" id="linkedin-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Linkedin</span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_twitter): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_twitter); ?>" id="twitter-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Twitter</span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_youtube): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_youtube); ?>" id="youtube-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Youtube</span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_google): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_google); ?>" id="google-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Google</span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_pintrest): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_pintrest); ?>" id="pintrest-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Pinterest</span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_instagram): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_instagram); ?>" id="instagram-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Instagram</span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_flickr): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_flickr); ?>" id="flickr-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Flickr</span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_xing): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_xing); ?>" id="xing-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Xing</span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_tumblr): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_tumblr); ?>" id="tumblr-btn">
            <span  class="social-icon">
                <span class="social-text">Follow via Tumblr</span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_ur_web): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_ur_web); ?>" id="web-btn">
            <span  class="social-icon">
                <span class="social-text">Go to</span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_mail): ?>
        <a class="socialitems" target="_blank" href="mailto:<?php echo $hssocial_mail; ?>" id="mail-btn">
            <span  class="social-icon">
                <span class="social-text">Mail to</span>
            </span>
        </a>
    <?php endif; ?> 

	<?php if ($hssocial_skype): ?>
        <a class="socialitems" href="skype:<?php echo $hssocial_skype; ?>?call" id="skype-btn">		
            <span  class="social-icon">
                <span class="social-text">Skype Call</span>
            </span>
        </a>
		
    <?php endif; ?>

</div>

<script>
    $mtkb(window).load(function(){
        $mtkb('.social-icons .social-icon').mouseenter(function(){
            $mtkb(this).stop();
            $mtkb(this).animate({width:'160'}, 500, '<?php echo $effect_bt; ?>',function(){});
        });
        $mtkb('.social-icons .social-icon').mouseleave(function(){
            $mtkb(this).stop();
            $mtkb(this).animate({width:'43'}, 500, '<?php echo $effect_bt; ?>',function(){});
        });
    });
</script>
