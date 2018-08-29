<?php
// 定义首页广告 API
add_action( 'rest_api_init', function () {
	register_rest_route( 'wechat/v1', 'adsense/index', array(
		'methods' => 'GET',
		'callback' => 'getIndexAdsense'
	));
});
function getIndexAdsense($request) {    
    $data=get_index_ad_data(); 
    if (empty($data)) {
        return new WP_Error( 'error', 'post adsense is error', array( 'status' => 404 ) );
    }
    $response = new WP_REST_Response($data);
    $response->set_status( 200 ); 
    return $response;
}
function get_index_ad_data(){
    $adType = get_option('index_option');
	$adImage = get_option('index_adpic');
	$adLink = get_option('index_adpage');
	$adNumber = get_option('index_adnum');
	$data =array();
	//$siteurl= site_url();	      
    if(!empty($adType) && !empty($adImage)) {
		if($adType=='minapp') {
			$_data["type"] = $adType;
			$_data["thumbnail"] = $adImage;
			$_data['link'] = $adLink;
			$_data['appid'] = $adNumber;
		}
		if($adType=='picture') {
			$_data["type"] = $adType;
			$_data["thumbnail"] = $adImage;
			$_data['telphone'] = $adNumber;
		}
		$data[] = $_data;
        $result["code"]="success";
        $result["message"]= "get post adsense success";
        $result["status"]="200";
        $result["data"]=$data;      
        return $result;
    } else {
        $result["code"]="success";
        $result["message"]="get post adsense error";
        $result["status"]="500";                   
        return $result;
    }
}
// 定义列表页广告 API
add_action( 'rest_api_init', function () {
	register_rest_route( 'wechat/v1', 'adsense/list', array(
		'methods' => 'GET',
		'callback' => 'getListAdsense'
	));
});
function getListAdsense($request) {    
    $data=get_list_ad_data(); 
    if (empty($data)) {
        return new WP_Error( 'error', 'post adsense is error', array( 'status' => 404 ) );
    }
    $response = new WP_REST_Response($data);
    $response->set_status( 200 ); 
    return $response;
}
function get_list_ad_data(){
    $adType = get_option('list_option');
	$adImage = get_option('list_adpic');
	$adLink = get_option('list_adpage');
	$adNumber = get_option('list_adnum');
	$data =array();      
    if(!empty($adType) && !empty($adImage)) {
		if($adType=='minapp') {
			$_data["type"] = $adType;
			$_data["thumbnail"] = $adImage;
			$_data['link'] = $adLink;
			$_data['appid'] = $adNumber;
		}
		if($adType=='picture') {
			$_data["type"] = $adType;
			$_data["thumbnail"] = $adImage;
			$_data['telphone'] = $adNumber;
		}
		$data[] = $_data;
        $result["code"]="success";
        $result["message"]= "get post adsense success";
        $result["status"]="200";
        $result["data"]=$data;      
        return $result;
    } else {
        $result["code"]="success";
        $result["message"]="get post adsense error";
        $result["status"]="500";                   
        return $result;
    }
}
// 定义详情页广告 API
add_action( 'rest_api_init', function () {
	register_rest_route( 'wechat/v1', 'adsense/detail', array(
		'methods' => 'GET',
		'callback' => 'getDetailAdsense'
	));
});
function getDetailAdsense($request) {    
    $data=get_detail_ad_data(); 
    if (empty($data)) {
        return new WP_Error( 'error', 'post adsense is error', array( 'status' => 404 ) );
    }
    $response = new WP_REST_Response($data);
    $response->set_status( 200 ); 
    return $response;
}
function get_detail_ad_data(){
    $adType = get_option('detail_option');
	$adImage = get_option('detail_adpic');
	$adLink = get_option('detail_adpage');
	$adNumber = get_option('detail_adnum');
	$data =array();      
    if(!empty($adType) && !empty($adImage)) {
		if($adType=='minapp') {
			$_data["type"] = $adType;
			$_data["thumbnail"] = $adImage;
			$_data['link'] = $adLink;
			$_data['appid'] = $adNumber;
		}
		if($adType=='picture') {
			$_data["type"] = $adType;
			$_data["thumbnail"] = $adImage;
			$_data['telphone'] = $adNumber;
		}
		$data[] = $_data;
        $result["code"]="success";
        $result["message"]= "get post adsense success";
        $result["status"]="200";
        $result["data"]=$data;      
        return $result;
    } else {
        $result["code"]="success";
        $result["message"]="get post adsense error";
        $result["status"]="500";                   
        return $result;
    }
}