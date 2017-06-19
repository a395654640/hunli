<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/6 0006
 * Time: 10:34
 * 后台会员添加与编辑页面
 * 删除会员数据
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
if(@$_GET['del']){
    $sql="delete from admin where id=$id";
    $rc=mysql_query($sql);
    if($rc){
        echo "<script type='text/javascript'>alert('管理员删除成功！');history.go(-1);</script>";
        exit;
    }
}



$sql="select * from admin where id = $id";
$row=mysql_query($sql);
$member=mysql_fetch_array($row);

require_once('./member.html');