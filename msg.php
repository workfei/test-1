<?php
	if(isset($_POST['liuyan'])){
		$liuyan=$_POST['liuyan'];
		if($_POST['liuyan']!=''){
		echo "<script>
			alert('添加成功');
		</script>";}	
	}
	else
	{
		$liuyan='';
	}
	function gettmsg($fileurl){
		$arr=explode('|',file_get_contents($fileurl));
		return $arr;
	}

	function setmsg($fileurl,$msg){
		$memo='';
		if(filesize($fileurl)>0){
			$memo=file_get_contents($fileurl);
			$memo.='|'.$msg;
		}
		else{
			$memo=$msg;
		}
		
		file_put_contents($fileurl, $memo);
	}
	setmsg('file/liuyan.txt', $liuyan);	
	$test=gettmsg('file/liuyan.txt');
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
		
		<form method="post" action="msg.php">
		<table>
			<tr>
				<td>输入:<input type=" text" name="liuyan" ><input type="submit" value="提交"/></td>
			</tr>
			<tr>				<td>
				留言板:<div style="border:1px black solid; width: 400px; height: 200px; ">	
				<?php
						
						foreach($test as $key=>$val){
							if($val!='')
							echo "<p>".$val.'<a href="delmsg.php?id='.$key.' " style="float:right">删除</a></p>';
					}
				?>
					
				</div>
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>
