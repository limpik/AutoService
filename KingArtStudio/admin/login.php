<?php
	session_start();
    define('galery',true);
    include('include/db_connect.php');
    
    
    if($_POST["submit-enter"]){
        $login=($_POST["login"]);
        $pass=($_POST["pass"]);
        
        if($login && $pass){//���� �� �����
            //$pass=md5($pass);
            $result=mysql_query("SELECT * FROM user WHERE login='$login' AND pass='$pass'",$link);
            
            if(mysql_num_rows($result)>0){
                $row=mysql_fetch_array($result);
                $_SESSION['auth_admin']='yes_auth';
                $_SESSION['username']=$login;
                header("Location: index.php");
                
            }
            else{
                $msgerror="�������� ����� �(���) ������.";
            }
        }
        else{
            $msgerror="��������� ��� ����!";
        }
        
    }
    
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style-login.css" rel="stylesheet" type="text/css" />
	<title>������ ���������� - ����</title>
</head>

<body>
<div id="block-pass-login">
<?php
	if($msgerror){
	   echo'<p id="msgerror">'.$msgerror.'</p>';
	}
?>
<form method="post">
<ul id="pass-login">
<li><label>�����</label>
<input type="text" name="login"/></li>
<li><label>������</label>
<input type="password" name="pass"/></li>
</ul>
<p><input type="submit" name="submit-enter" id="submit-enter" value="����"/></p>
</form>
</div>



</body>
</html>