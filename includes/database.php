<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27 0027
 * Time: 16:38
 * 数据库连接
 */

        $mysql_server_name='localhost'; //改成自己的mysql数据库服务器
        $mysql_username='root'; //改成自己的mysql数据库用户名
        $mysql_password='root'; //改成自己的mysql数据库密码
        $mysql_database='hunli'; //改成自己的mysql数据库名
        $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库
        mysql_query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.
        mysql_select_db($mysql_database,$conn); //打开数据库

$lifeTime = 2 * 3600; //session存在时间 默认为2个小时
//session_set_cookie_params($lifeTime);  //设置session存在时间
header('Content-type: text/html; charset=utf8');



