<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/9 0009
 * Time: 14:36
 * 后台婚礼大讲堂审核、删除、搜索
 */

require_once('../../includes/database.php');
session_start();
if(!@$_SESSION['uid']){
    $url="../index.php";
    Header("HTTP/1.1 303 See Other");
    Header("Location: $url");
    exit;
}


    $id=$_GET['id'];
 $sql="select * from info where id = $id";
 $resule=mysql_query($sql);
 $row=mysql_fetch_array($resule);
require_once('./audit.html');

