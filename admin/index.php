<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/2 0002
 * Time: 11:48
 * 后台登录页
 */
//var_dump($_POST);
if($_POST){ //判断是否提交表单

    require_once('../includes/database.php');
    $user=$_POST['username'];
    $pwd=$_POST['pwd'];
    if(empty($user)){
        echo "<script type='text/javascript'>alert('请输入用户名！');history.go(-1);</script>";
        exit();
    }
    if(empty($user)){
        echo "<script type='text/javascript'>alert('密码不能为空！');history.go(-1);</script>";
        exit();
    }
    $sql="select * from admin where username = '{$user}'";//查询用户数据
    $upd=mysql_query($sql);
    $up=mysql_fetch_array($upd);
   if(!$up){//判断用户是否存在
       echo "<script type='text/javascript'>alert('用户不存在请重试！');history.go(-1);</script>";
       exit();
   }
   if($up['password'] != sha1(md5(md5($pwd))) ){//判断用户密码是否正确
       echo "<script type='text/javascript'>alert('用户名或密码错误！');history.go(-1);</script>";
       exit();
   }
    session_start();
    $_SESSION['name']=$user;
    $_SESSION['uid']=$up['id'];
    $_SESSION['type']=$up['type'];
    Header("HTTP/1.1 303 See Other");
    $url="./index/index.php";
    Header("Location: $url");
    exit;
}
header('Content-type: text/html; charset=utf8');
session_start();
unset($_SESSION['name']);
unset($_SESSION['type']);
unset($_SESSION['uid']);

require_once('./login.html');