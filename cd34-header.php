<?php
/*
Plugin Name: Facebook OpenGraph meta and Google+ link rel/publisher meta
Version: 0.5
Plugin URI: http://cd34.com/
Description: Put OpenGraph and Google+ link rel/publisher meta in header
Author: Chris Davies
Author URI: http://cd34.com/
*/

function cd34_social_header() {
    global $post;
    $cd34_temp = get_the_title();
    $cd34_media = get_option('cd34_header_image');
    if (is_front_page() ) {
      $cd34_temp = get_bloginfo('name');
      $cd34_url = site_url();
    } else {
      $cd34_url = get_permalink($post->ID);
      $res = preg_match('/<img\ .*src="(.*)"\ alt/', $post->post_content, 
                 $matches);
      if ($res == 1) {
        $cd34_media = $matches[1];
      }
    }
?>
<meta property="og:title" content="<?php echo $cd34_temp; ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $cd34_url; ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<?php 
    if ($cd34_media != "") {
?>
<meta property="og:image" content="<?php echo $cd34_media;?>" />
<?php
    }
    $cd34_temp = get_option('cd34_header_fbadmins');
    if ($cd34_temp != "") {
?>
<meta property="fb:admins" content="<?php echo $cd34_temp;?>" />
<?php
    }
    $cd34_temp = get_option('cd34_header_gplus');
    if ($cd34_temp != "") {
?>
<link href="https://plus.google.com/<?php echo $cd34_temp; ?>" rel="publisher" />
<?php
    $cd34_temp = get_option('cd34_header_google_verify');
    if ($cd34_temp != "") {
?>
<meta content="<?php echo $cd34_temp;?>" name="google-site-verification" />
<?php
    }
  }
}

function cd34_social_header_menu() {
  add_options_page('cd34 Social Header Options', 'cd34 Social Header', 'manage_options', 'cd34-social-header', 'cd34_social_header_options');
}

function cd34_social_header_options() {
    if (!current_user_can('manage_options'))  {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }
?>

<div class="wrap">
<h2>cd34 Social Header</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'cd34-header' ); ?>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Path to Image</th>
        <td><input type="text" name="cd34_header_image" value="<?php echo get_option('cd34_header_image'); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Facebook Admin User Id(s)</th>
        <td><input type="text" name="cd34_header_fbadmins" value="<?php echo get_option('cd34_header_fbadmins'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Google+ Page ID/User ID</th>
        <td><input type="text" name="cd34_header_gplus" value="<?php echo get_option('cd34_header_gplus'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Google Site Verification Code</th>
        <td><input type="text" name="cd34_header_google_verify" value="<?php echo get_option('cd34_header_google_verify'); ?>" /></td>
        </tr>
    </table>

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
<h3>Path to Image:</h3>
Facebook and Google+ will use a 125x125 image as the thumbnail if an image
is not found in the post. If your Image is less than 125x125, Facebook will
scale the image, but, Google+ will ignore it.
<br/>
<h3>How to get your Facebook User ID:</h3>
Go to <a href="http://facebook.com/">Facebook</a>. Click on your name. Click Photos. Click on one of your photos. Look for the set= portion of the URL. Your ID will be the last section separated by .<br/>
For Example, the url:
<br/>
<pre>
https://www.facebook.com/photo.php?fbid=11111135576112851&set=a.111111577850.111111.<strong>111111850</strong>&type=3&theater
</pre>
The Number you're looking for is 111111850.
<br/>
<h3>How to get your Google+ ID:</h3>
Go to <a href="https://plus.google.com/">Google+</a>. Select your page or click your name.

Page:
<pre>
https://plus.google.com/b/<strong>111111116333370035178</strong>/
</pre>

Profile:
<pre>
https://plus.google.com/<strong>111111114818451765084</strong>/posts
</pre>

You're looking for the number from your URLs that correspond with the bolded
section of the above urls.
</div>
<?php
}

function cd34_social_header_init() {
    register_setting('cd34-header', 'cd34_header_image');
    register_setting('cd34-header', 'cd34_header_fbadmins');
    register_setting('cd34-header', 'cd34_header_gplus');
    register_setting('cd34-header', 'cd34_header_google_verify');
}

add_action('admin_menu', 'cd34_social_header_menu');
add_action('admin_init', 'cd34_social_header_init');
add_filter('wp_head', 'cd34_social_header', 1968);

?>
