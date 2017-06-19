<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/2 0002
 * Time: 11:53
 * 后台会员管理
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


$type=$_GET['type'];

/*
 * 1为个人会员
 * 2为个体会员
 * 3为商家会员
 * */
switch ($type){
    case 'all';
        $query="select count(*) from member";
        break;
    case 1;
        $query="select count(*) from member where type= {$type}";
        break;
    case 2;
        $query="select count(*) from member where type= {$type}";
        break;
    case 3;
        $query="select count(*) from member where type= {$type}";
        break;
}

//设置每页显示多少条
$PageSize = 15;
$result = mysql_query($query);
$row = mysql_fetch_row($result);//$row的结果集是个数组
//echo $query;
//var_dump($row);

$amount = $row[0];  //$amount的值为记录条数，是个整数。

//计算共有多少页
if($amount){   //$PageCount表示总共有多少页。

    if($amount<$PageSize){$PageCount = 1;}//如果总数据量小于每页数量则总页数为1
    if($amount%$PageSize){
        $PageCount = (int)($amount/$PageSize)+1;
    }
    else{
        $PageCount = $amount/$PageSize;
    }
}
else{
    $PageCount = 0;
}

//获取当前页数
if(isset($_GET['page'])){
    $page = intval($_GET['page']);
}
else{
    $page = 1;
}

switch ($type){
    case 'all';
        $sql="select * from member  order by id desc limit ".($page-1)*$PageSize.",".$PageSize;//注意limit后边有一空格。
        break;
    case 1;
        $sql="select * from member where type= {$type} order by id desc limit ".($page-1)*$PageSize.",".$PageSize;
        break;
    case 2;
        $sql="select * from member where type= {$type} order by id desc limit ".($page-1)*$PageSize.",".$PageSize;
        break;
    case 3;
        $sql="select * from member where type= {$type} order by id desc limit ".($page-1)*$PageSize.",".$PageSize;
        break;
}

$result = mysql_query($sql);

//翻页链接
$PageString = '';//用来保存要转到的页数按钮。
if($page==1){    //不能写成$page=1
    $PageString='<li class="am-disabled"><a href="#">上一页</a></li>
           <li class="am-disabled"><a href="#">第一页</a></li>';
}
else{
    $PageString='<li class="am-active"><a href="?type='.($type).'&page='.($page-1).'">上一页</a></li>
           <li class="am-active"><a href="?type='.($type).'&page=1">第一页</a></li>';
}
if(($page==$PageCount)||($PageCount==0)){
    $PageString.= '<li class="am-disabled"><a href="#">下一页</a></li>
           <li class="am-disabled"><a href="#">尾页</a></li>
           <li class="am-disabled"><a href="#">共有'.($PageCount).'页</a></li>
           <li class="am-disabled"><a href="#">当前'.($page).'/'.($PageCount).'页</a></li>';
}
else{
    $PageString.='<li class="am-active"><a href="?type='.($type).'&page='.($page+1).'">下一页</a></li>
           <li class="am-active"><a href="?type='.($type).'&page='.$PageCount.'">尾页</a></li>
           <li class="am-disabled"><a href="#">共有'.($PageCount).'页</a></li>
           <li class="am-disabled"><a href="#">当前'.($page).'/'.($PageCount).'页</a></li>';
}




require_once('./member_list.html');