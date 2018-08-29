<?php
// 定义开启首页广告 API
add_action( 'rest_api_init', function () {
  register_rest_route( 'wechat/v1', 'adenable/index', array(
    'methods' => 'GET',
    'callback' => 'getEnableIndexAds'    
  ));
});
function getEnableIndexAds($data) {
	$data=get_enableIndex_data(); 
	if (empty($data)) {
		return new WP_Error( 'no options', 'no options', array( 'status' => 404 ) );
	} 
	// Create the response object
	$response = new WP_REST_Response( $data ); 
	// Add a custom status code
	$response->set_status( 200 );
	return $response;
}
function get_enableIndex_data() {
    $enableAds  =get_option('index_adv');
    if ($enableAds) {
        $result["code"]="success";
        $result["message"]="get enableAdsense success";
        $result["status"]="200";
        $result["adsense"]="true";
        return $result;
    } else {
        $result["code"]="success";
        $result["message"]="get enableAdsense fail";
        $result["status"]="200";
        $result["adsense"]="false";
        return $result;
    }
}
// 定义开启列表页广告 API
add_action( 'rest_api_init', function () {
  register_rest_route( 'wechat/v1', 'adenable/list', array(
    'methods' => 'GET',
    'callback' => 'getEnableListAds'    
  ));
});
function getEnableListAds($data) {
	$data=get_enableList_data(); 
	if (empty($data)) {
		return new WP_Error( 'no options', 'no options', array( 'status' => 404 ) );
	} 
	// Create the response object
	$response = new WP_REST_Response( $data ); 
	// Add a custom status code
	$response->set_status( 200 );
	return $response;
}
function get_enableList_data() {
    $enableAds  =get_option('list_adv');
    if ($enableAds) {
        $result["code"]="success";
        $result["message"]="get enableAdsense success";
        $result["status"]="200";
        $result["adsense"]="true";
        return $result;
    } else {
        $result["code"]="success";
        $result["message"]="get enableAdsense fail";
        $result["status"]="200";
        $result["adsense"]="false";
        return $result;
    }
}
// 定义开启详情页广告 API
add_action( 'rest_api_init', function () {
  register_rest_route( 'wechat/v1', 'adenable/detail', array(
    'methods' => 'GET',
    'callback' => 'getEnableDetailAds'    
  ));
});
function getEnableDetailAds($data) {
	$data=get_enableDetail_data(); 
	if (empty($data)) {
		return new WP_Error( 'no options', 'no options', array( 'status' => 404 ) );
	} 
	// Create the response object
	$response = new WP_REST_Response( $data ); 
	// Add a custom status code
	$response->set_status( 200 );
	return $response;
}
function get_enableDetail_data() {
    $enableAds  =get_option('detail_adv');
    if ($enableAds) {
        $result["code"]="success";
        $result["message"]="get enableAdsense success";
        $result["status"]="200";
        $result["adsense"]="true";
        return $result;
    } else {
        $result["code"]="success";
        $result["message"]="get enableAdsense fail";
        $result["status"]="200";
        $result["adsense"]="false";
        return $result;
    }
}