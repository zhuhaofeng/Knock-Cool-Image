<?php include("./lib/Container.php"); $temp=new Container(0); $address="index.php"; $temp->usercheck($address,1);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--
	knock,2010.11
	Project: konck_image
	@author lvjiawei
	@author zhuhaofeng
	@version 0.1
	@copyright 2010
	-->
	<head>
		<title>My Pictrue</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/index_css.css" />
		<link rel="stylesheet" type="text/css" href="./css/user_css.css" />
	</head>
	<body>
	<div class="all">
	<div class="left">
		<div><!--user??&#65533;???????????????&#65533;?-->
			<a href="modi_user.php"><img src="./images/avatar.gif" class="avatarimage"></img></a>
		</div>
		<div id="name">
			<?php $nickname=$_SESSION['nickname']; echo "$nickname"?><!-- ?????????&#65533;&#65533;-->
		</div>
		<div>
			<form action="./php/action.php" method="post">
				<table><!--??????&#65533;?????????????&#65533;??????&#65533;?????????po???&#65533;?-->
				<tr><td><input type="text" name="search" id="search" class="text" /></td><td><input type="submit" name="search" id="search" value="search" class="button1" /></td></tr>
				</table>
			</form>
			<table><!--?????&#65533;??php��????????~~??????&#65533;????&#65533;??????5?&#65533;???????&#65533;&#65533;??????&#65533;?????po????5??td???&#65533;? -->
				<tr><td><input type="button" value="�û��б�"></td></tr>
				<tr><td><input type="button" value="ͼƬ�б�"></td></tr>
				<tr><td><input type="button" value="����Ա�б�"></td></tr>
			</table>
			<div>
				<form action="./php/action.php" method="post">
					 <table><tr><td><input type="submit" name="exit" id="exit" value="leave" class="button1"></td></tr>
					 </table>
				</form>
			</div>
		</div>
	</div>

	<div id="right">
		<table>
		<tr><td>���� <?php /*�����˵�����*/  ?></td><td></td></tr>
		<?php
			/*if �û����ְ�����Ŀ������*/
			echo "<tr><td>"."<img src=\" ͷ\" class=\"search_avatar\"/>"."</td><td>"./*����û�������*/"</td></tr>";
		?>
		</table>
	</div>

	<div id="bottom">
	</div>
	</div>
	</body>
</html>
