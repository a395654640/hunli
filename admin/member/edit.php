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


/*
 * 统计会员数量
 * */
$msql="select count(id) from member";
$mc=mysql_query($msql);
$mcount=mysql_fetch_array($mc);
//var_dump($mcount);
/*
 * 统计各类型会员数量
 * 1为个人会员
 * 2为个体会员
 * 3为商家会员
 * */
//个人会员数量
$rsql="select count(id) from member where type = 1";
$rc=mysql_query($rsql);
$rcount=mysql_fetch_array($rc);
//个体会员数量
$tsql="select count(id) from member where type = 2";
$tc=mysql_query($tsql);
$tcount=mysql_fetch_array($tc);
// 商家会员数量
$ssql="select count(id) from member where type = 3";
$sc=mysql_query($ssql);
$scount=mysql_fetch_array($sc);

$id=$_GET['id'];
if(@$_GET['del']){
    $sql="delete from member where id=$id";
    $rc=mysql_query($sql);
    if($rc){
        echo "<script type='text/javascript'>alert('会员删除成功！');history.go(-1);</script>";
        exit;
    }
}



$sql="select * from member where id = $id";
$row=mysql_query($sql);
$member=mysql_fetch_array($row);

require_once('./member.html');