<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/7 0007
 * Time: 16:41
 * 前台首页图标 因图标特殊性不提供删除和添加
 * 1为查询列表
 * 2为查询详情
 * 3为修改
 */
require_once('../../includes/database.php');
session_start();

if(!@$_SESSION['uid']){
    $url="../index.php";
    Header("HTTP/1.1 303 See Other");
    Header("Location: $url");
    exit;
}
$type=$_GET['type'];

if($type == 1){
    $sql="select * from icon";
    $result = mysql_query($sql);
    require_once('./i.html');
}elseif ($type == 2){
   $id=$_GET['id'];
    $sql="select * from icon where id = {$id}";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    require_once('./edit.html');
}elseif ($type == 3){
    $id=$_POST['id'];
    $pImg=$_FILES['img'];//缩略图
    if($pImg['error']==UPLOAD_ERR_OK){
        header('Content-type: text/html; charset=utf8');
        $extName=strtolower(@end(explode('.',$pImg['name'])));
        $filename=$id.".".$extName;
        $dest="../../upload/icon/".$filename;
        move_uploaded_file($pImg['tmp_name'],$dest);
        $iurl="/upload/icon/".$filename;
        $time=time();
        $sql="update icon set image = '{$iurl}' , time = '{$time}' where id = {$id}";
        $row=mysql_query($sql);
        if($row){
            echo "<script type='text/javascript'>alert('图标更换成功！');history.go(-1);</script>";
            exit;
        }else{
            echo "<script type='text/javascript'>alert('图标更换失败！');history.go(-1);</script>";
            exit;
        }
    }
}




