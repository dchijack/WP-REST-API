<?php
// 插件参数选项
$themename = "小程序设置选项";
$version = "2018.7.31";
$options = array();
$options[] = array (
	"name" => $themename,
	"type" => "title");
	   
// 常规设置

$options[] = array(
	"name" => "常规设置",
    "type" => "section");
		   
$options[] = array( "type" => "open");

$options[] = array(
	"name" => "AppId",
	"desc" => "说明：微信小程序 AppId 需要到微信小程序后台获取",
    "id" => "appid",
    "type" => "text",
    "std" => "");
	
$options[] = array(
	"name" => "AppSecret",
	"desc" => "说明：微信小程序 AppSecret 需要到微信小程序后台获取",
	"id" => "secretkey",
	"type" => "text",
	"std" => "");

$options[] = array(
	"name" => "焦点幻灯片",
	"desc" => "说明：焦点幻灯片文章 ID 需要到网站后台查看获取",
    "id" => "swipe",
    "type" => "text",
	"std" => "");
	
$options[] = array(
	"name" => "自定义栏目",
    "id" => "meta_list",
	"desc" => "自定义标签 Key , 使用英文 ',' 逗号隔开",
    "type" => "text",
	"std" => "");

$options[] = array(
	"name" => "默认海报",
	"desc" => "说明：默认生成海报宣传头图",
	"id" => "prefix",
	"type" => "text",
	"class" => "imglink",
	"std" => "");
	
$options[] = array( "type" => "close");

// 辅助功能

$options[] = array(
	"name" => "辅助功能",
	"type" => "section");

$options[] = array( "type" => "open");

$options[] = array(
	"name" => "",
    "id" => "encomments",
	"desc" => "是否开启小程序评论功能",
    "type" => "checkbox",
	"std" => "false");
	
$options[] = array(
	"name" => "",
    "id" => "user_sers",
	"desc" => "是否禁用小程序用户列表 API",
    "type" => "checkbox",
	"std" => "false");
	
$options[] = array(
	"name" => "",
    "id" => "post_excerpt",
	"desc" => "是否禁止文章输出 excerpt 摘要项目",
    "type" => "checkbox",
	"std" => "false");
	
$options[] = array(
	"name" => "",
    "id" => "post_format",
	"desc" => "是否禁止文章输出 format 文章格式",
    "type" => "checkbox",
	"std" => "false");
	
$options[] = array(
	"name" => "",
    "id" => "post_type",
	"desc" => "是否禁止文章输出 type 标签项目",
    "type" => "checkbox",
	"std" => "false");
	
$options[] = array(
	"name" => "",
    "id" => "post_author",
	"desc" => "是否禁止文章输出 author 标签项目",
    "type" => "checkbox",
	"std" => "false");
	
$options[] = array(
	"name" => "",
    "id" => "post_meta",
	"desc" => "是否禁止文章输出 meta 标签项目",
    "type" => "checkbox",
	"std" => "false");
	
$options[] = array(
	"name" => "",
    "id" => "post_prev",
	"desc" => "是否开启文章输出上一篇及下一篇",
    "type" => "checkbox",
	"std" => "false");
	
$options[] = array(
	"name" => "",
    "id" => "qvideo",
	"desc" => "是否开启解析腾讯视频文章类型, 仅支持解析一个视频",
    "type" => "checkbox",
	"std" => "false");

$options[] = array( "type" => "close");

// 广告设置

$options[] = array(
	"name" => "广告设置",
	"type" => "section");

$options[] = array( "type" => "open");

$options[] = array(
	"name" => "",
    "id" => "index_adv",
	"desc" => "是否开启首页广告",
    "type" => "checkbox",
	"std" => "false");

$options[] = array(
	"name" => "首页广告类型",
    "desc" => "",
    "id" => "index_option",
    "type" => "select",
    'options' => array('minapp','picture'));
	
$options[] = array(
	"name" => "",
	"desc" => "说明：填写广告展示图片地址",
    "id" => "index_adpic",
    "type" => "text",
	"class" => "intext",
	"std" => "");
	
$options[] = array(
	"name" => "",
	"desc" => "说明：类型为 minapp 时,请填写广告链接路径;类型为 picture 时,请留空",
    "id" => "index_adpage",
    "type" => "text",
	"class" => "intext",
	"std" => "");
	
$options[] = array(
	"name" => "",
	"desc" => "说明：类型为 minapp 时,请填写小程序 appid ; 类型为 picture 时,请填写广告电话号码",
    "id" => "index_adnum",
    "type" => "text",
	"std" => "");
	
$options[] = array(
	"name" => "",
    "id" => "list_adv",
	"desc" => "是否开启列表页广告",
    "type" => "checkbox",
	"std" => "false");

$options[] = array(
	"name" => "列表页广告类型",
    "desc" => "",
    "id" => "list_option",
    "type" => "select",
    'options' => array('minapp','picture'));
	
$options[] = array(
	"name" => "",
	"desc" => "说明：填写广告展示图片地址",
    "id" => "list_adpic",
    "type" => "text",
	"class" => "intext",
	"std" => "");
	
$options[] = array(
	"name" => "",
	"desc" => "说明：类型为 minapp 时,请填写广告链接路径;类型为 picture 时,请留空",
    "id" => "list_adpage",
    "type" => "text",
	"class" => "intext",
	"std" => "");
	
$options[] = array(
	"name" => "",
	"desc" => "说明：类型为 minapp 时,请填写小程序 appid ; 类型为 picture 时,请填写广告电话号码",
    "id" => "list_adnum",
    "type" => "text",
	"std" => "");
	
$options[] = array(
	"name" => "",
    "id" => "detail_adv",
	"desc" => "是否开启详情页广告",
    "type" => "checkbox",
	"std" => "false");

$options[] = array(
	"name" => "详情页广告类型",
    "desc" => "",
    "id" => "detail_option",
    "type" => "select",
    'options' => array('minapp','picture'));
	
$options[] = array(
	"name" => "",
	"desc" => "说明：填写广告展示图片地址",
    "id" => "detail_adpic",
    "type" => "text",
	"class" => "intext",
	"std" => "");
	
$options[] = array(
	"name" => "",
	"desc" => "说明：类型为 minapp 时,请填写广告链接路径;类型为 picture 时,请留空",
    "id" => "detail_adpage",
    "type" => "text",
	"class" => "intext",
	"std" => "");
	
$options[] = array(
	"name" => "",
	"desc" => "说明：类型为 minapp 时,请填写小程序 appid ; 类型为 picture 时,请填写广告电话号码",
    "id" => "detail_adnum",
    "type" => "text",
	"std" => "");

$options[] = array(	"type" => "close");

return $options;
