<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
	define('my_shop', true);
       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

  $_SESSION['urlpage'] = "<a href='index.php' >�������</a> \ <a href='tovar.php' >������</a> \ <a>��������� ������</a>";
  
  include("include/db_connect.php");
  mysql_query("SET NAMES 'cp1251'");
  $id = ($_GET["id_product"]);
 $action = ($_GET["action"]);
if (isset($action))
{
 switch ($action) {

   case 'delete':
     
       if (file_exists("../upload/".$_GET["image"]))
       {
      unlink("../upload/".$_GET["image"]);  
      
       }
  break;

	} 
        header("Location:tovar.php");
}
    if ($_POST["submit_save"])

   { 
      $error = array();
    
    // �������� �����
        
       if (!$_POST["form_title"])
      {
         $error[] = "������� �������� ������";
      }
      
       if (!$_POST["form_price"])
      {
         $error[] = "������� ����";
      }
      if (!(preg_match("/^[0-9-]+$/",$_POST["form_price"]))){
        $error[] = "������� ���� � ������";
      }
          
      if (!$_POST["form_size"])
      {
         $error[] = "������� ������ �������";         
      }
      
      if (!$_POST["form_genre"])
      {
         $error[] = "������� ����";         
      }
 
        if (empty($_POST["upload"]))
      {        
      include("actions/upload-image.php");
      unset($_POST["upload"]);           
      }                  
      
                                      
       if (count($error))
       {           
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
            
       }else
       {
                           
       $querynew = "title='{$_POST["form_title"]}',price='{$_POST["form_price"]}',size='{$_POST["form_size"]}',description='{$_POST["form_description"]}',genre='{$_POST["form_genre"]}'"; 
           
       $update = mysql_query("UPDATE product SET $querynew WHERE id_product = '$id'",$link); 
                   
      $_SESSION['message'] = "<p id='form-success'>����� ������� �������!</p>";
                
}           
}   

?>
<!DOCTYPE html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />

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
<p id="count-style">��������� ������</p>

</div>
<?php

		 if(isset($_SESSION['message']))
		{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
		}
  
?>
<?php
	$result = mysql_query("SELECT * FROM product WHERE id_product='$id'",$link);
    
If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
    
echo '

<form enctype="multipart/form-data" method="post">
<ul id="block-add">

<li>
<label>�������� ������</label>
<input type="text" name="form_title" value="'.$row["title"].'" />
</li>

<li>
<label>����</label>
<input type="text" name="form_price" value="'.$row["price"].'"  />
</li>

<li>
<label>����</label>
<input type="text" name="form_genre" value="'.$row['genre'].'"/>
</li>

<li>
<label>������</label>
<input type="text" name="form_size" value="'.$row['size'].'"/>
</li> 

<li>
<label>������� ��������</label>
<textarea name="form_description" cols="60px" rows="10px" >'.$row["description"].'</textarea>
</li>
';    
    
   if  (strlen($row["image"]) > 0 && file_exists("../upload/".$row["image"]))
{
$img_path = '../upload/'.$row["image"];
$max_width = 110; 
$max_height = 110; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
// New dimensions 
$width = intval($ratio*$width); 
$height = intval($ratio*$height); 

echo '
<label class="stylelabel" >�������� ��������</label>
<div id="baseimg">
<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
<a href="edit_product1.php?id='.$row["id_product"].'&image='.$row["image"].'&action=delete" ></a>
</div>

';
   
}else
{  
echo '
<label class="stylelabel" >�������� ��������</label>

<div id="baseimg-upload">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
<input type="file" name="upload" />

</div>
';
}

echo '

</ul>
<p align="center"><input type="submit" id="submit_form" name="submit_save" value="��������"/></p>     
</form>
';
}
 while ($row = mysql_fetch_array($result));
}
?> 




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