<?php 
$send_sql = isset($_POST['send_sql'])?$_POST['send_sql']:'';
$select_db = isset($_POST['select_db'])?$_POST['select_db']:'';

if(!$send_sql)
{
	return;
}
//对应数据库密码
$link = @mysql_connect('127.0.0.1','root','czq0920');
		if(!$link)
		{
			die('连接数据库失败！');
		}
$sql = '';
	if(!$select_db){
				$sql = $send_sql;
	}else{
			$link_db = mysql_select_db($select_db);
			if(!$link_db)
			{
				die('选择的数据库有误！');
			}
			$sql = "show tables";
	}
mysql_query('set names utf8');
$res = mysql_query($sql);
$arrDB = array();
	while ($arr1 = mysql_fetch_assoc($res)) 
	{
		$arrDB[] = $arr1; 
	}
	
$res = array();	
	foreach ($arrDB as $k => $v) {
		foreach ($v as $k1 => $v1) {
			$res[] = $v1;
		}
	}
	//echo '<pre>';
	//print_r($res);
	echo json_encode($res);
 ?>