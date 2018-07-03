<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
<?php
	
	include "page.class.php";	
	$link=mysql_connect("localhost", "root", "root");
	mysql_select_db("goods");
	$result=mysql_query("select * from goods");
	
	$total=mysql_num_rows($result);//$total 数据库中一共有多少条数据
	$num=3;	//$num 每页显示多少条数据
	//$page=new Page($total, $num);
	$page=new Page($total, $num, "&cid=99");
	$sql="select * from goods {$page->limit}";//每页从多少开始取，取几条数据
	$result=mysql_query($sql);
	echo '<table align="center" border="1" width="960">';
			echo '<caption><h1>GOODS</h1></caption>';

	while($row=mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>'.$row["id"].'</td>';
		echo '<td>'.$row["name"].'</td>';
		echo '<td>'.$row["price"].'</td>';
		echo '<td>'.$row["total"].'</td>';
		echo '<td>'.$row["pic"].'</td>';
		//因为在page.class项目中，没有upload文件夹，也就是图片的路径不正确，所以无法显示图片
		//分页只是单独写的一部分，要和其他项目整合到一起使用
		//echo "<td><img src='{$row['pic']}' width='70' height='70'></td>";
		echo '</tr>';	
	}

	echo '<tr><td colspan="5" align="right">'.$page->fpage(array(8,3,4,5,6,7,0,1,2)).'</td></tr>';
	echo '</table>';
?>
	
 </body>
</html>
