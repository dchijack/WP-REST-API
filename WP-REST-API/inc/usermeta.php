<?php
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
// 获取登录用户ID
add_action( 'rest_api_init', function () {
	register_rest_route( 'wechat/v1', 'user/get', array(
		'methods' => 'get',
		'callback' => 'get_user_id'
	));
});
function get_user_id($request) {
	$openid = $request['openid'];
	if (empty($openid)) {
		return new WP_Error( 'error', 'openid is empty', array( 'status' => 500 ) );
	} else {
		$data=get_userid_by_login($openid); 
		if (empty($data)) {
			return new WP_Error( 'error', 'add comment error', array( 'status' => 404 ) );
		}
		$response = new WP_REST_Response($data);
		$response->set_status( 200 ); 
		return $response;
	}
}
function get_userid_by_login($openid) {
	global $wpdb;
    $user_id = '';
	$sql = $wpdb->prepare("SELECT ID FROM ".$wpdb->users." WHERE user_login='%s'",$openid);
    $users = $wpdb->get_results($sql);
    foreach ($users as $user) {
        $user_id = (int)$user->ID;
    }
	if(!empty($user_id)) {
		$result["code"]="success";
		$result["message"] = "get login user id success";
		$result["status"]="200"; 
		$result["userid"]=$user_id;  
        return $result;
	} else {
		$result["code"]="success";
        $result["message"]= "get login user id error";
        $result["status"]="500";
		$result["userid"]='';
		return $result;
	}
}