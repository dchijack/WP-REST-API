<?php
/*
 * 
 * WordPres 连接微信小程序
 * Author: jianbo + 艾码汇
 * github:  https://github.com/dchijack/WP-REST-API
 * 基于 守望轩 WP REST API For App 开源插件定制
 * 
 */
// 定义微信头像
function add_wechat_user_avatar( $user_contact ) {
	$user_contact['wxavatar'] = __( '微信头像' );
	$user_contact['openid'] = __( 'OpenId' );
	return $user_contact;
}
add_filter( 'user_contactmethods', 'add_wechat_user_avatar' );
// 禁止用户列表
if (get_setting_option('user_users')) {
	add_filter( 'rest_endpoints', function( $endpoints ){
		if ( isset( $endpoints['/wp/v2/users'] ) ) {
			unset( $endpoints['/wp/v2/users'] );
		}
		if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
			unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
		}
		return $endpoints;
	});
}