<?php
/*
Plugin Name: WP REST API
Plugin URI: https://github.com/dchijack/WP-REST-API
Description: WordPress REST API 定制版。参考 <a href="https://github.com/iamxjb/wp-rest-api-for-app" target="_blank">守望轩</a> 小程序开源插件定制开发
Version: 2018.12
Author: 艾码汇
Author URI: https://www.imahui.com/
License: GPL v3
*/
// 定义插件目录
define('WP_REST_API_PRO', plugin_dir_path(__FILE__));
// 插件函数调用
include(WP_REST_API_PRO.'functions.php');
// 插件设置面板
function settings_panel() { 
	global $themename, $version, $options;
	if ( $_REQUEST['settings-updated'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 设置已保存</strong></p></div>';
?>
<div class="wrap">
<h2><div class="dashicons dashicons-admin-settings"></div><?php echo $themename; ?><span class="version">Version：<?php echo $version; ?></span></h2>
<p>WordPress REST API 定制版。基于<a href="https://github.com/iamxjb/wp-rest-api-for-app" target="_blank">守望轩</a>开源插件定制版。By <a href="https://www.imahui.com/" target="_blank">艾码汇</a></p>
<form method="post" action="options.php">
<?php settings_fields( 'apiset' ); ?>
<?php do_settings_sections( 'apiset' ); ?>
<div class="responsive-tabs">
<?php foreach ($options as $value) { switch ( $value['type'] ) { case "open": ?>
<?php break; case "close": ?>
</div>
<?php break; case "title": ?>
<?php break; case 'text': ?>
<div id="section_<?php echo $value['id']; ?>">
<h4 class="heading"><?php echo $value['name']; ?></h4>
<div class="option">
<input <?php if (!empty($value['class'])) { echo 'class="'.$value['class'].'"'; } ?> name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
<?php if (!empty($value['desc'])) { echo '<small>'.$value['desc'].'</small>'; } ?>
<div class="clearfix"></div>
</div>
</div>
<?php break; case 'textarea': ?>
<div id="section_<?php echo $value['id']; ?>">
<h4 class="heading"><?php echo $value['name']; ?></h4>
<div class="option">
<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
<?php if (!empty($value['desc'])) { echo '<small>'.$value['desc'].'</small>'; } ?>
 <div class="clearfix"></div>
</div>
</div>
<?php break; case 'select': ?>
<div id="section_<?php echo $value['id']; ?>">
<h4 class="heading"><?php echo $value['name']; ?></h4>
<div class="option">
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select>
<?php if (!empty($value['desc'])) { echo '<small>'.$value['desc'].'</small>'; } ?>
<div class="clearfix"></div>
</div>
</div>
<?php break; case "checkbox": ?>
<div id="section_<?php echo $value['id']; ?>">
<h4 class="heading"><?php echo $value['name']; ?></h4>
<div class="option">
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; $checkvalue = "true"; }else{ $checked = ""; $checkvalue = $value['std'];} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php echo $checkvalue; ?>" <?php echo $checked; ?> />
<?php if (!empty($value['desc'])) { echo '<small>'.$value['desc'].'</small>'; } ?>
<div class="clearfix"></div>
</div>
</div>
<?php break; case "page": ?>
<div id="section_<?php echo $value['id']; ?>">
<h4 class="heading"><?php echo $value['name']; ?></h4>
<div class="option">
<?php if (!empty($value['desc'])) { echo $value['desc']; } ?>
<div class="clearfix"></div>
</div>
</div>
<?php break; case "section": $i++ ?>
<?php if (!empty($value['name'])) { echo '<h2>'.$value['name'].'</h2>';} ?>
<div class="<?php echo $value['type']; ?>">
<?php break; } } ?>
<?php submit_button();?>
<?php wp_enqueue_media(); ?>
</div>
</form>
<?php get_jquery_source(); ?>
<script>
$(document).ready(function() {
	RESPONSIVEUI.responsiveTabs();
	if($("input[name=post_meta]").attr('checked')) {
		$("#section_meta_list").addClass("hide");
	}
});
</script>
<?php }?>
