<?php
/*
 * 
 * WordPres 连接微信小程序
 * Author: jianbo + 艾码汇
 * github:  https://github.com/dchijack/WP-REST-API-PRO
 * 基于 守望轩 WP REST API For App 开源插件定制
 * 
 */
$host = site_url();
$api_about = '
<h2>小程序 API</h2>
<p>以下 API 属于自定义增强 API 。未有列明的 API ，可以登录 http://v2.wp-api.org/ 查阅</p>
<h5>文章相关 API</h5>
<p>随机文章 API：'.$host.'/wp-json/wechat/v1/views/random</p>
<p>滑动文章 API：'.$host.'/wp-json/wechat/v1/views/swipe</p>
<p>阅读统计 API：'.$host.'/wp-json/wechat/v1/views/update/id(文章ID)</p>
<p>热门阅读 API：'.$host.'/wp-json/wechat/v1/views/most</p>
<p>热门点赞 API：'.$host.'/wp-json/wechat/v1/thumbs/most</p>
<h5>点赞相关 API</h5>
<p>用户点赞 API：'.$host.'/wp-json/wechat/v1/thumbs/up</p>
<p>是否点赞 API：'.$host.'/wp-json/wechat/v1/thumbs/get</p>
<p>个人点赞文章：'.$host.'/wp-json/wechat/v1/thumbs/user</p>
<h5>订阅相关 API</h5>
<p>订阅分类 API：'.$host.'/wp-json/wechat/v1/category/sub</p>
<p>是否订阅 API：'.$host.'/wp-json/wechat/v1/category/get</p>
<h5>评论相关 API</h5>
<p>开启评论功能：'.$host.'/wp-json/wechat/v1/comment/setting</p>
<p>热门评论 API：'.$host.'/wp-json/wechat/v1/comment/most</p>
<p>最新评论 API：'.$host.'/wp-json/wechat/v1/comment/recent</p>
<p>评论回复 API：'.$host.'/wp-json/wechat/v1/comment/comments</p>
<p>微信提交评论：'.$host.'/wp-json/wechat/v1/comment/add</p>
<p>微信评论 API：'.$host.'/wp-json/wechat/v1/comment/get</p>
<h5>用户相关 API</h5>
<p>获取用户 ID：'.$host.'/wp-json/wechat/v1/user/get</p>
<h5>用户微信 OPENID</h5>
<p>微信 OPENID API：'.$host.'/wp-json/wechat/v1/user/openid</p>
<h5>消息相关 API</h5>
<p>发送消息 API：'.$host.'/wp-json/wechat/v1/message/send</p>
<h5>海报相关 API</h5>
<p>生成二维码 API：'.$host.'/wp-json/wechat/v1/qrcode/creat</p>
<h5>广告相关 API</h5>
<p>开启首页广告：'.$host.'/wp-json/wechat/v1/adenable/index</p>
<p>首页广告 API：'.$host.'/wp-json/wechat/v1/adsense/index</p>
<p>开启列表页广告：'.$host.'/wp-json/wechat/v1/adenable/list</p>
<p>列表页广告 API：'.$host.'/wp-json/wechat/v1/adsense/list</p>
<p>开启详情页广告：'.$host.'/wp-json/wechat/v1/adenable/detail</p>
<p>详情页广告 API：'.$host.'/wp-json/wechat/v1/adsense/detail</p>
';
$plugin_about = '
<h2>关于 WordPress 连接微信小程序的插件</h2>
<p><a href="https://www.imahui.com/design/840.html" target="_blank">WordPress 连接微信小程序的插件</a>是 <a href="https://www.imahui.com/" target="_blank">艾码汇</a> 基于守望轩开源插件 <a href="https://github.com/iamxjb/wp-rest-api-for-app">wp-rest-api-for-app</a> 整合定制优化版。部分功能与守望轩原版相同，但是整体的数据展现方式有所不同，以及后台设置分别采用 <a href="http://blog.wpjam.com/project/wpjam-basic/" target="_blank">WPJAM BASIC</a> 插件框架以及普通设置版本。</p>
<h3>公众号</h3>
<p>欢迎关注个人微信公众号，关于 WordPress 连接微信小程序的插件以及相关小程序，以后将会在这里第一时间发布。</p>
<p><img src="https://www.imahui.com/uploads/gh_27bef5445476_258.jpg" /></p>
';