<?php
 header('Access-Control-Allow-Origin: http://127.0.0.1');  //允许任何外部js操作本页面,但这是相当危险的
 header('Access-Control-Allow-Methods:POST,GET');
 header('Access-Control-Allow-Credentials:true');    //Credentials 美 [krə'dɛnʃlz]，证书凭证 （为了安全建议设置成为false）
 header("Content-Type: application/json;charset=utf-8");

 echo '[{"name":"test","site":"测试"}]';
?>