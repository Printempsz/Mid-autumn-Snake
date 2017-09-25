<?php
//获取前端传来的值
$code = $_GET['code'];
$appid = $_GET['appid'];
$appsecret = $_GET['secret'];
$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
$result = file_get_contents($url);
$jsoninfo = json_decode($result, true);

$openid = $jsoninfo["openid"];
$access_token = $jsoninfo["access_token"];

$getuserinfo = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
$objuserinfo = file_get_contents($getuserinfo);
echo $objuserinfo;//json对象送回前端
