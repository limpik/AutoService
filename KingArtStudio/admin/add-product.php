<?php
session_start();
if($_SESSION['auth_admin']=="yes_auth"){
    

	if(isset($_GET['logout']))
    {
	   unset($_SESSION['auth_admin']);//���������� ������
       header("Location:login.php");
	}
    $_SESSION['urlpage']="<a href='index.php'>�������</a> \ <a href='tovar.php'>������</a>\ <a>���������� �������</a>";
    include("include/db_connect.php");
    mysql_query("SET NAMES 'cp1251'");
    
     if($_POST['submit-add'])//�������� ������ �� ������
    
      { 
      $error = array();
    
    // �������� �����
        
       if (!$_POST["add-title"])
      {
         $error[] = "������� �������� ������";
      } else{$add_title = $_POST["add-title"];}
      
       if (!$_POST["add-price"])
      {
         $error[] = "������� ����";
      }
      if (!(preg_match("/^[0-9-]+$/",$_POST["add-price"]))){
        $error[] = "������� ���� � ������";
      } else{$add_price = $_POST["add-price"];}  
       
      if (!$_POST["add-genre"])
      {
         $error[] = "������� ����";         
      }
        else{ $add_genre=$_POST["add-genre"];}
           
               
       
        $add_description=$_POST["add-description"];
        $add_size= $_POST["add-size"];
      
                                      
       if (count($error))
       {           
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
            
       }
 
       else
       {
                           
              	mysql_query("INSERT INTO product(title,price,size,description,genre)
						VALUES(						
                            '$add_title',
                            '$add_price',
                            '$add_size',
                            '$add_description',
                            '$add_genre'                            
						)",$link);
                  
      $_SESSION['message'] = "<p id='form-success'>����� ������� ��������!</p>";
      $id = mysql_insert_id();
      
       if (empty($_POST["upload"]))
      {        
      include("actions/upload-image.php");
      unset($_POST["upload"]);           
      }  

      }}
      
        
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
</div>
<div id="block-info">
<p id="count-style">���������� ������</p>

</div>
<?php


		 if(isset($_SESSION['message']))
		{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
		}
  
?>
<form enctype="multipart/form-data" method="post" action="add-product.php"><!--enctype - ���������� ��� ���� ��������� ������(��������)-->
<ul id="block-add">
<li>
<label>�������� �������</label>
<input type="text" name="add-title"/></li>

<li>
<label>����</label>
<input type="text" name="add-price"/></li>

<li>
<label>������</label>
<input type="text" name="add-size"/></li>

<li>
<label>�������� ��������</label>
<div id="upload-img">
<input type="file" name="upload"/></li>

<li>
<label>�������� ������</label>
<textarea name="add-description" cols="60px" rows="10px"></textarea></li>

<li>
<label>����</label>
<input type="text" name="add-genre"/></li>



</ul>
<p id="add"><input type="submit" id="submit-add" name="submit-add" value="�������� �����"/></p>
</form>

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
   
    '
