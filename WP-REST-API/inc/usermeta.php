<?php
// 定义微信头像
function add_wechat_user_avatar( $user_contact ) {
	$user_contact['wxavatar'] = __( '微信头像' );
	$user_contact['openid'] = __( 'OpenId' );
	return $user_contact;
}
add_filter( 'user_contactmethods', 'add_wechat_user_avatar' );
