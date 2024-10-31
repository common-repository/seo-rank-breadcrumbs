<?php
// Prevent direct access.
  if ( ! defined( 'ABSPATH' ) ) {
	  
   die( 'Nice try, But not here!!!' );
   
  }

// Adding settings menu to admin panel.
  add_action( 'admin_menu', 'seo_rank_breadcrumbs_menu' );

// Settings menu initialization.
  function seo_rank_breadcrumbs_menu()
 { 

   add_menu_page ( 
		          'SEO Rank Breadcrumbs Settings',
		          'SEO Rank Breadcrumbs',
		          'manage_options',
		          'seo_rank_breadcrumbs',
              'seo_rank_breadcrumbs_settings_page',
              'dashicons-nametag',
              99
              );

// Registering settings option keys.
   add_action( 'admin_init', 'register_seo_rank_breadcrumbs_settings_setup' );

// Adding default values once.
seo_rank_breadcrumbs_default_settings(get_option ('sbc_default_settings'));

 }


function seo_rank_breadcrumbs_default_settings ($flag) {
  if( $flag == "" ) {
  $arr1 = array ( 'id', 'separator','home','before_bgcolor','after_bgcolor','before_fontcolor','after_fontcolor','separator_color');
  $arr2 = array ( 'style0', '&#155;','Home','#00aaff','#ff0000','#3377bc','#00ffff','#000000');
  for ( $x=0; $x<count($arr1); $x++ ) {
  update_option( 'sbc_' . $arr1[$x], $arr2[$x] ); 
  }
  update_option( 'sbc_default_settings',"completed");
  }
}


// Option values validator.
function seo_rank_breadcrumbs_settings_validator ( $value )  {

if( false == preg_match('/^#[a-f0-9]{6}$/i', $value) ){
$type = 'error';
$message = "Please use Hexa color values on color styles!";
    add_settings_error(
        'seo_rank_breadcrumbs_errors',
        esc_attr( 'setting-error-colors' ),
        $message,
        $type
    );
} else {
return $value; }
}


// Settings options register and sanitize callback functions.
function  register_seo_rank_breadcrumbs_settings_setup()
 {
  $arr = array('default','id','separator','home','before_bgcolor','after_bgcolor','before_fontcolor','after_fontcolor','separator_color');
  for ( $x=0; $x<count($arr); $x++) {
  if( $x > 4 ) {
       register_setting( 'seo-breadcrumbs-settings-group', 'sbc_'.$arr[$x],'seo_rank_breadcrumbs_settings_validator');
  } else {
  register_setting( 'seo-breadcrumbs-settings-group', 'sbc_'.$arr[$x]);
  }
  }
}

// Setting page html php mixed markup.
  function  seo_rank_breadcrumbs_settings_page()
 {
?>
<div class="wrap">

<p style="line-height:45px;">
<img src="<?php echo plugins_url ("images/seo-breadcrumbs.png",__FILE__); ?>" style="float:left; clear:both; display:inline-block;margin-right:8px;border:5px solid #e0e0e0;border-radius:5px;box-shadow:0px 0px 5px rgba(0,0,0,.5);" width="45" height="45" /> <h1>SEO Rank Breadcrumbs </h1></p><br/>
<p><?php settings_errors(); ?></p>

<form method="post" action="options.php"  name="seo_rank_breadcrumbs">
  <?php settings_fields( 'seo-breadcrumbs-settings-group' ); ?>
  <?php do_settings_sections( 'seo-breadcrumbs-settings-group' ); ?>
   <table class="form-table sbc">
       <tr valign="top">
       <th scope="row"> Breadcrumbs Layout Style : </th>
      <td>
      <p>
      <input type="radio" name="sbc_id" value="style0" <?php checked(get_option('sbc_id'),'style0' ); ?> > Default ( Universal ) <font style="color:green;font-weight:bolder;"> recommended </font> <br/>
      <img src="<?php echo plugins_url( 'images/style0.png', __FILE__ ); ?>" />
      </p>

      <p>
      <input type="radio" name="sbc_id" value="style1" <?php checked(get_option('sbc_id'),'style1' ); ?> > Style 1 ( Suitable for Tab, Desktop ) <br/>
      <img src="<?php echo plugins_url( 'images/style1.png', __FILE__ ); ?>" />
      </p>

      <p>
      <input type="radio" name="sbc_id" value="style2" <?php checked(get_option('sbc_id'),'style2' ); ?> > Style 2 ( Suitable for Desktop )
      <br/>
      <img src="<?php echo plugins_url( 'images/style2.png', __FILE__ ); ?>" />
      </p>

      <p>
      <input type="radio" name="sbc_id" value="style3" <?php checked(get_option('sbc_id'),'style3' ); ?> > Style 3 ( Suitable for Desktop ) <br/>
      <img src="<?php echo plugins_url( 'images/style3.png', __FILE__ ); ?>" />
      </p>

      <p>
      <input type="radio" name="sbc_id" value="style4" <?php checked(get_option('sbc_id'),'style4' ); ?> > Style 4 ( Suitable for Desktop ) <br/>
      <img src="<?php echo plugins_url( 'images/style4.png', __FILE__ ); ?>" />
      </p>

      <p>
      <input type="radio" name="sbc_id" value="style5" <?php checked(get_option('sbc_id'),'style5' ); ?> > Style 5 ( Suitable for Mobile, Tab, Desktop ) <br/>
      <img src="<?php echo plugins_url( 'images/style5.png', __FILE__ ); ?>" />
      </p>

      <p>
      <input type="radio" name="sbc_id" value="style6" <?php checked(get_option('sbc_id'),'style6' ); ?> > Style 6 ( Suitable for Desktop ) <br/>
      <img src="<?php echo plugins_url( 'images/style6.png', __FILE__ ); ?>" />
      </p>

      <p>
      <input type="radio" name="sbc_id" value="style7" <?php checked(get_option('sbc_id'),'style7' ); ?> > Style 7 ( Suitable for Mobile, Tab, Desktop ) <br/>
      <img src="<?php echo plugins_url( 'images/style7.png', __FILE__ ); ?>" />
      </p>

      <p>
      <input type="radio" name="sbc_id" value="style8" <?php checked(get_option('sbc_id'),'style8' ); ?> > Style 8 ( Suitable for Mobile, Tab, Desktop ) <br/>
      <img src="<?php echo plugins_url( 'images/style8.png', __FILE__ ); ?>" />
      <style>.breadcrumbs {
          width: 98%;
          margin: 1%;
          overflow: hidden;
          border-radius: 6px;
          background-color: #fff;
          padding: 10px 8px !important;
      }</style>
      </p>

      <p><span>Description:  </span> You can select the breadcrumbs styles what you want. We recommend if you want responsive to all devices use <i> Default </i> style. If your website is desktop fit sites, prefer and use other seven styles for attractive look on your website. </p>
       </tr>
      <tr valign="top">
         <th scope="row"> Color Styles : </th>
         <td>
        <input type="text" name="sbc_before_bgcolor" value="<?php echo esc_attr( get_option('sbc_before_bgcolor') ) ?>" class="wp_color_picker" /> <label for="sbc_before_bgcolor"> - Before bgcolor  </label> <br/>
        <input type="text" name="sbc_after_bgcolor" value="<?php echo esc_attr( get_option('sbc_after_bgcolor') ) ?>" class="wp_color_picker" /><label for="sbc_after_bgcolor"> - After bgcolor </label><br/>
        <input type="text" name="sbc_before_fontcolor" value="<?php echo esc_attr( get_option('sbc_before_fontcolor') ) ?>" class="wp_color_picker" />
        <label for="sbc_before_fontcolor"> - Before fontcolor</label> <br/>
        <input type="text" name="sbc_after_fontcolor" value="<?php echo esc_attr( get_option('sbc_after_fontcolor') ) ?>" class="wp_color_picker" /><label for="sbc_font_bgcolor"> - After fontcolor</label> <br/>
        <input type="text" name="sbc_separator_color" value="<?php echo esc_attr( get_option('sbc_separator_color') ) ?>" class="wp_color_picker" />
        <label for="sbc_separator_color"> - Separator color</label> <br/>
        <p><span>Description:  </span> You can customize the breadcrumbs colors before after and sparator colors etc.</p>
        </td>
        </tr>
       <tr valign="top">
       <th scope="row"> Home Style : </th>
       <?php $Homename = esc_attr( get_option('sbc_home') ) ? esc_attr( get_option('sbc_home') ) : 'Home'; ?>
        <td><input type="text" name="sbc_home" value="<?php echo $Homename  ?>" placeholder="ie. Home" />
      <p> <span>Description: </span> Enter the name of starting crumb. You can also use fontawesome-icons or boostrap and dash-icons etc...
      </p>
      </td>
       </tr>
      <tr valign="top">
       <th scope="row">Separator Style :</th>
       <td>
         <?php $Separator = esc_attr( get_option('sbc_separator') ) ? esc_attr( get_option('sbc_separator') ) : '›'; ?>
      <input type="text" name="sbc_separator" value="<?php echo esc_attr( get_option('sbc_separator') ) ?>" placeholder="ie. &#155;" />
      <p><span>Description:  </span> If you want to change crumb separator, you can set the symbol or any font icon.  This option only works on Default style mode, in other styles their is not separator. </p>
       </tr>
  </table>
  <?php submit_button(); ?>
</form>
<h4><b style="color: green;font-weight: bolder;"">Note: Use Shortcode</b> [seo-rank-breadcrumbs] </h4>
</div>
<?php } ?>