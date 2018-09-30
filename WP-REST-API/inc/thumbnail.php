<?php
/*
 * 
 * WordPres 连接微信小程序
 * Author: jianbo + 艾码汇
 * github:  https://github.com/dchijack/WP-REST-API
 * 基于 守望轩 WP REST API For App 开源插件定制
 * 
 */
// 定义缩略图地址
function get_post_thumbnail($post_id){
    $post = get_post($post_id);
	$thumbnails = get_post_meta($post_id, 'thumbnail', true);
	if (!empty($thumbnails)) {
		$post_thumbnail = $thumbnails;
		return $post_thumbnail;
    } else if (has_post_thumbnail()) {
        $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'full');
		$post_thumbnail = $attachment[0];
        return $post_thumbnail;
	} else { 
		$post_thumbnail = '';
		ob_start();
		ob_end_clean();
		$firstImage = preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 
		$thumbnails = $matches[1]; 
		if(!empty($thumbnails)){
			$post_thumbnail = $thumbnails;
		} else {
			$post_thumbnail = get_setting_option('prefix');
		}
		return $post_thumbnail;
    }
}