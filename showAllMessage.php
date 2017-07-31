<?php 
$select_db = isset($_POST['select_db'])?$_POST['select_db']:'';
$select_tb = isset($_POST['select_tb'])?$_POST['select_tb']:'';
	if(!$select_db&&!$select_tb)
	{
		return;
	}
	//对应数据库密码
$link = @mysql_connect('127.0.0.1','root','czq0920');
	if(!$link){
		die('连接数据库失败！');
	}
$link_db = mysql_select_db($select_db);
mysql_query('set names utf8');
$sql = "select * from {$select_tb}";
$res = mysql_query($sql);
$arr = array();
	while ($arr1 = mysql_fetch_assoc($res)) {
		$arr[] = $arr1;
	}
echo json_encode($arr);
 ?>
 