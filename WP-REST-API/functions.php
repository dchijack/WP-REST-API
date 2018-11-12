<?php
/*
 * 
 * WordPres 连接微信小程序
 * Author: jianbo + 艾码汇
 * github:  https://github.com/dchijack/WP-REST-API
 * 基于 守望轩 WP REST API For App 开源插件定制
 * 
 */
// 插件参数选项
include(WP_REST_API_PRO.'options.php');
// 定义管理面板
add_action('admin_menu', function () {
	add_menu_page('小程序设置选项', "小程序", 'edit_themes', 'api-settings', 'settings_panel', 'dashicons-editor-code', 2);
});
add_action('admin_init', function () {
	global $options;
	foreach ($options as $value) {
		register_setting( 'apiset', $value['id'] );
	}
	wp_enqueue_style("tabs", plugins_url('',__FILE__)."/css/tabs.css", false, "1.0", "all");
	wp_enqueue_script("tabs", plugins_url('',__FILE__)."/css/tabs.min.js", false, "1.0");
});
function get_jquery_source() {
	$url = plugins_url('',__FILE__);
	echo '<script type="text/javascript" src="'.$url.'/css/jquery.min.js?ver=1.10.1"></script>';
}
// WP_REST_API_PRO
include(WP_REST_API_PRO.'inc/category.php');
include(WP_REST_API_PRO.'inc/comments.php');
include(WP_REST_API_PRO.'inc/message.php');
include(WP_REST_API_PRO.'inc/openid.php');
include(WP_REST_API_PRO.'inc/posts.php');
include(WP_REST_API_PRO.'inc/swipe.php');
include(WP_REST_API_PRO.'inc/thumbs.php');
include(WP_REST_API_PRO.'inc/views.php');
include(WP_REST_API_PRO.'inc/subscribe.php');
include(WP_REST_API_PRO.'inc/random.php');
include(WP_REST_API_PRO.'inc/adsense.php');
include(WP_REST_API_PRO.'inc/prefix.php');
require WP_REST_API_PRO.'/inc/thumbnail.php';
require WP_REST_API_PRO.'/inc/usermeta.php';
require WP_REST_API_PRO.'/inc/custom.php';
// 腾讯视频解析
if (get_setting_option('qvideo')) {
	include(WP_REST_API_PRO.'inc/video.php');
}
// 数据设置
function get_setting_option($name) {
	return get_option($name);
}
// 文章格式类型
if (get_setting_option('formats')) {
	$formats = wp_get_option('formats');
	add_theme_support( 'post-formats', explode(',',$formats) );
}
// 描述清理HTML标签
function deletehtml($description) {
	$description = trim($description);
	$description = strip_tags($description,"");
	return ($description);
}
if (get_setting_option('deletehtml')) {
	add_filter('category_description', 'deletehtml');
}
// get_setting_option
if (get_setting_option('reupload')) {
	function git_upload_filter($file) {
		$time = date("YmdHis");
		$file['name'] = $time . "" . mt_rand(1, 100) . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
		return $file;
	}
	add_filter('wp_handle_upload_prefilter', 'git_upload_filter');
}
// 时间格式
function time_tran($the_time) {
    $now_time = date("Y-m-d H:i:s",time()+8*60*60); 
    $now_time = strtotime($now_time);
    $show_time = strtotime($the_time);
    $dur = $now_time - $show_time;
    if ($dur < 0) {
        return $the_time; 
    } else {
        if ($dur < 60) {
            return $dur.'秒前'; 
        } else {
            if ($dur < 3600) {
				return floor($dur/60).'分钟前'; 
			} else {
				if ($dur < 86400) {
					return floor($dur/3600).'小时前';
				} else {
					if ($dur < 259200) {//3天内
						return floor($dur/86400).'天前';
					} else {
						return date("Y-m-d",$show_time); 
					}
				}
			}
		}
	}
}
// 获取文章数据
function get_content_post($url,$post_data=array(),$header=array()) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_AUTOREFERER,true);
    $content = curl_exec($ch);
    $info = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL);
    $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
    if($code == "200"){
        return $content;
    }else{
        return "error";
    }
}
// 发起 HTTPS 请求
function https_request($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl,  CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);  
    $data = curl_exec($curl);
    if (curl_errno($curl)){
        return 'ERROR';
    }
    curl_close($curl);
    return $data;
}
