<?php
session_start();
if($_SESSION['auth_admin']=="yes_auth"){
    

	if(isset($_GET["logout"]))
    {
	   unset($_SESSION['auth_admin']);//���������� ������
       header("Location:login.php");
	}
    $_SESSION['urlpage']="<a href='index.php'>�������</a>";
    include("include/db_connect.php");
    
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>������ ����������</title>
</head>

<body>
<div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-content">
<div id="block-param">
<p id="title-page">����� ����������</p>
</div>
<p class="service"><a href="/services/services.xml">�������� � ��������</a></p>
</div>
</div>

</body>
</html>
<?php
	}else
    {
        header("Location: login.php");
    }
?>
