<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/6 0006
 * Time: 14:45
 * 后台添加行业资讯
 * type值 1为添加   2为保存  3为修改  4为删除  5查询二级分类
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
    require_once('./nadd.html');
}elseif($type == 2){
    $id=@$_POST['id'];
    $sqli="select * from info where id = $id";
    $resulei=mysql_query($sqli);
    $class=mysql_fetch_array($resulei);

    $pImg=$_FILES['img'];//缩略图
    if($pImg['error']==UPLOAD_ERR_OK){
        $t=date("Ymd",time());
        $path="../../upload/images/".$t.'/';
        $in=date("Ymdhis").rand(100000,999999);
        if(!is_readable($path))
        {
            is_file($path) or mkdir($path,0777);
        }
        $extName=strtolower(@end(explode('.',$pImg['name'])));
        $filename=$in.".".$extName;
        $dest=$path.$filename;
        move_uploaded_file($pImg['tmp_name'],$dest);
        $iurl="/upload/images/".$t."/".$filename;
    }else{
        $iurl=$class['img'];
    }

    $vid=$_FILES['video'];//视频
    if($vid['error']==UPLOAD_ERR_OK){
        $t=date("Ymd",time());
        $in=date("Ymdhis").rand(100000,999999);
        $path="../../upload/video/".$t.'/';
        if(!is_readable($path))
        {
            is_file($path) or mkdir($path,0777);
        }
        $extName=strtolower(@end(explode('.',$vid['name'])));
        $filename=$in.".".$extName;
        $dest=$path.$filename;
        move_uploaded_file($vid['tmp_name'],$dest);
        $vurl="/upload/video/".$t."/".$filename;
    }else{
        $vurl=$class['video'];
    }

$time=time();


    if($id){//id存在时更新数据  不存在时写入数据
        $sql="update info set title= '{$_POST['title']}',img= '{$iurl}',video= '{$vurl}',content= '{$_POST['content']}',time= '{$time}',likes= '{$_POST['like']}',money= '{$_POST['money']}',lid= '{$_POST['sid']}',eid= '{$_POST['eid']}',jianjie= '{$_POST['jianjie']}',author= '{$_POST['author']}',paixu = '{$_POST['paixu']}'  where id = {$_POST['id']} ";
    }else{
        $sql="insert into info  (title,img,video,content,time,likes,money,lid,eid,jianjie,author,paixu) VALUE ('{$_POST['title']}','{$iurl}','{$vurl}','{$_POST['content']}','{$time}','{$_POST['like']}','{$_POST['money']}','{$_POST['sid']}','{$_POST['eid']}','{$_POST['jianjie']}','{$_POST['author']}','{$_POST['paixu']}')";
    }
    $jieguo=mysql_query($sql);
    // echo $sql;
    if($jieguo){
        echo "<script type='text/javascript'>alert('更新成功！');history.go(-1);</script>";
        exit();
    }else{
        echo "<script type='text/javascript'>alert('更新失败！');history.go(-1);</script>";
        exit();
    }
}elseif($type == 3){
    $id=$_GET['id'];//查询id对应数据
    $sql="select * from newsclass where sid = 0";
    $resule=mysql_query($sql);

    $sqli="select * from info where id = $id";
    $resulei=mysql_query($sqli);
    $class=mysql_fetch_array($resulei);

    $lid=$class['lid'];
    $sqlc="select * from newsclass where sid = $lid";
    $resulec=mysql_query($sqlc);

    require_once('./nadd.html');
}elseif($type == 4){
    $id=$_GET['id'];
    $sql="delete from info where id=$id";
    $rc=mysql_query($sql);
    if($rc){
        echo "<script type='text/javascript'>alert('删除成功！');history.go(-1);</script>";
        exit;
    }else{
        echo "<script type='text/javascript'>alert('删除失败！');history.go(-1);</script>";
        exit;
    }
}elseif ($type == 5){
    $sid = $_GET["sid"];
    $str="";
    $str='<select id="doc-select-2" name="eid" >';
    $r="select * from newsclass  where sid = '$sid';";
    $result=mysql_query($r,$conn);
    while($row=mysql_fetch_assoc($result)){
        $str.='<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    $str.='</select>';
    echo $str;exit;
}elseif ($type == 6){
    $title=$_GET['title'];
    $query="select count(*) from info where title like '%$title%'";
//设置每页显示多少条
    $PageSize = 9;
    $result = mysql_query($query);
    $row = @mysql_fetch_row($result);//$row的结果集是个数组
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
    $sql="select * from info where  title like '%$title%'  order by paixu desc, id desc limit ".($page-1)*$PageSize.",".$PageSize;//注意limit后边有一空格。
    $result = mysql_query($sql);

//翻页链接
    $PageString = '';//用来保存要转到的页数按钮。
    if($page==1){    //不能写成$page=1
        $PageString='<li class="am-disabled"><a href="#">上一页</a></li>
           <li class="am-disabled"><a href="#">第一页</a></li>';
    }
    else{
        $PageString='<li class="am-active"><a href="?title='.($title).'&type=6&page='.($page-1).'">上一页</a></li>
           <li class="am-active"><a href="?title='.($title).'&type=6&page=1">第一页</a></li>';
    }
    if(($page==$PageCount)||($PageCount==0)){
        $PageString.= '<li class="am-disabled"><a href="#">下一页</a></li>
           <li class="am-disabled"><a href="#">尾页</a></li>
           <li class="am-disabled"><a href="#">共有'.($PageCount).'页</a></li>
           <li class="am-disabled"><a href="#">当前'.($page).'/'.($PageCount).'页</a></li>';
    }
    else{
        $PageString.='<li class="am-active"><a href="?title='.($title).'&type=6&page='.($page+1).'">下一页</a></li>
           <li class="am-active"><a href="?title='.($title).'&type=6&page='.$PageCount.'">尾页</a></li>
           <li class="am-disabled"><a href="#">共有'.($PageCount).'页</a></li>
           <li class="am-disabled"><a href="#">当前'.($page).'/'.($PageCount).'页</a></li>';
    }
    require_once('./list.html');
}




