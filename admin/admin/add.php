<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/6 0006
 * Time: 14:45
 * 后台添加会员页面
 */
require_once('../../includes/database.php');
session_start();
if(!@$_SESSION['uid']){
    $url="../index.php";
    Header("HTTP/1.1 303 See Other");
    Header("Location: $url");
    exit;
}

if(@$_GET['sou'] ==='suo' ){

    $tel=$_GET['tel'];
    $query="select count(*) from member where tel  like '%{$tel}%'";
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

    $sql="select * from member where tel  like '%{$tel}%' order by id ASC limit ".($page-1)*$PageSize.",".$PageSize;
    
    $result = mysql_query($sql);

//翻页链接
    $PageString = '';//用来保存要转到的页数按钮。
    if($page==1){    //不能写成$page=1
        $PageString='<li class="am-disabled"><a href="#">上一页</a></li>
           <li class="am-disabled"><a href="#">第一页</a></li>';
    }
    else{
        $PageString='<li class="am-active"><a href="?tel='.($tel).'&page='.($page-1).'&sou=suo&type=4">上一页</a></li>
           <li class="am-active"><a href="?tel='.($tel).'&page=1&sou=suo&type=4">第一页</a></li>';
    }
    if(($page==$PageCount)||($PageCount==0)){
        $PageString.= '<li class="am-disabled"><a href="#">下一页</a></li>
           <li class="am-disabled"><a href="#">尾页</a></li>
           <li class="am-disabled"><a href="#">共有'.($PageCount).'页</a></li>
           <li class="am-disabled"><a href="#">当前'.($page).'/'.($PageCount).'页</a></li>';
    }
    else{
        $PageString.='<li class="am-active"><a href="?tel='.($tel).'&page='.($page+1).'&sou=suo&type=4">下一页</a></li>
           <li class="am-active"><a href="?tel='.($tel).'&page='.$PageCount.'&sou=suo&type=4">尾页</a></li>
           <li class="am-disabled"><a href="#">共有'.($PageCount).'页</a></li>
           <li class="am-disabled"><a href="#">当前'.($page).'/'.($PageCount).'页</a></li>';
    }

    require_once('./member_list.html');
    exit();

}else{


    require_once('./add.html');
    exit;
}
