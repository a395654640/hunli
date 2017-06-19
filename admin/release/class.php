<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14 0014
 * Time: 13:36
 * 行业资讯分类   二级分类
 */

require_once('../../includes/database.php');
session_start();
if(!@$_SESSION['uid']){
    $url="../index.php";
    Header("HTTP/1.1 303 See Other");
    Header("Location: $url");
    exit;
}

$sql="select * from relclass where sid = 0";
$resule=mysql_query($sql);
//$row=mysql_fetch_array($resule);
require_once('./class.html');



