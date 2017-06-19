<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/6 0006
 * Time: 14:45
 * 后台添加行业资讯分类
 * type值 1为添加   2为保存  3为修改  4为删除
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
if($type == 1 ){
    $sql="select * from newsclass where sid = 0";//查询所有一级分类
    $resule=mysql_query($sql);
    require_once('./add.html');
}elseif($type == 2){
 $id=@$_POST['id'];
    if($id){//id存在时更新数据  不存在时写入数据
        $sql="update newsclass set name= '{$_POST['name']}',sid = '{$_POST['sid']}'  where id = {$_POST['id']} ";
    }else{
        $sql="insert into newsclass  (name,sid) VALUE ('{$_POST['name']}','{$_POST['sid']}') ";
    }
    $jieguo=mysql_query($sql);
    // echo $sql;
    if($jieguo){
        echo "<script type='text/javascript'>alert('分类更新成功！');history.go(-1);</script>";
        exit();
    }else{
        echo "<script type='text/javascript'>alert('分类更新失败！');history.go(-1);</script>";
        exit();
    }
}elseif($type == 3){
    $id=$_GET['id'];//查询id对应数据
    $sql="select * from newsclass where sid = 0";
    $resule=mysql_query($sql);
    $sqlc="select * from newsclass where id = $id";
    $resulec=mysql_query($sqlc);
    $class=mysql_fetch_array($resulec);
    require_once('./add.html');
}elseif($type == 4){
    $id=$_GET['id'];
    $sql="delete from newsclass where id=$id";
    $rc=mysql_query($sql);
    if($rc){
        echo "<script type='text/javascript'>alert('分类删除成功！');history.go(-1);</script>";
        exit;
    }else{
        echo "<script type='text/javascript'>alert('分类删除失败！');history.go(-1);</script>";
        exit;
    }
}




