<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/6 0006
 * Time: 10:34
 * 后台会员添加与修改数据处理页面
 */
require_once('../../includes/database.php');
session_start();
if(!@$_SESSION['uid']){
    $url="../index.php";
    Header("HTTP/1.1 303 See Other");
    Header("Location: $url");
    exit;
}


//var_dump($_POST);


if($_POST['id']){
//id存在的话进行数据更新
    $sql="update member set tel= '{$_POST['tel']}' , score = '{$_POST['score']}' , money = '{$_POST['money']}' where id = {$_POST['id']} ";
    if($_POST['pass']){
        if($_POST['pass'] === $_POST['word'] ){
            $pass=sha1(md5(md5($_POST['pass'])));
            $sql="update member set pass= '{$pass}' , tel= '{$_POST['tel']}' , score = '{$_POST['score']}' , money = '{$_POST['money']}' where id = {$_POST['id']} ";
        }else{
            echo "<script type='text/javascript'>alert('两次密码不一致！');history.go(-1);</script>";
            exit;
        }
    }
    $row=mysql_query($sql);
    if($row){
        echo "<script type='text/javascript'>alert('信息修改成功！');history.go(-1);</script>";
        exit;
    }else{
        echo "<script type='text/javascript'>alert('信息修改失败！');history.go(-1);</script>";
        exit;
    }
}else{
//id不存在进行数据写入
    if(empty($_POST['name'])){
        echo "<script type='text/javascript'>alert('请输入用户名！');history.go(-1);</script>";
        exit();
    }
    if(empty($_POST['pass'])){
        echo "<script type='text/javascript'>alert('密码不能为空！');history.go(-1);</script>";
        exit();
    }
    if($_POST['pass'] != $_POST['word']){
        echo "<script type='text/javascript'>alert('两次密码不一致！');history.go(-1);</script>";
        exit();
    }
    if(empty($_POST['tel'])){
        echo "<script type='text/javascript'>alert('请输入电话！');history.go(-1);</script>";
        exit();
    }
    $csql="select * from member where tel = '{$_POST['tel']}'";
    $pass=sha1(md5(md5($_POST['pass'])));
    $time=time();
    $cjg=mysql_query($csql);
    $hui=mysql_fetch_array($cjg);
    if(!$hui){
       $sql="insert into member (name,tel,pass,type,score,money,time) VALUE ('{$_POST['name']}','{$_POST['tel']}','{$pass}','1','{$_POST['score']}','{$_POST['money']}','{$time}') ";
        $jieguo=mysql_query($sql);
        if($jieguo){
            echo "<script type='text/javascript'>alert('会员添加成功！');history.go(-1);</script>";
            exit();
        }else{
            echo "<script type='text/javascript'>alert('会员添加失败！');history.go(-1);</script>";
            exit();
        }
    }else{
        echo "<script type='text/javascript'>alert('手机号已存在！');history.go(-1);</script>";
        exit();
    }
}
