<?php

 /* $sorting=$_GET["sort"];
  
  switch($sorting){
    case 'price-asc';
    $sorting='price ASC';
    break;
        
    case 'price-desc';
    $sorting='price DESC';
    break;
        
    default:
    $sorting='id_product DESC';
    break;
  } */
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="windows-1251">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KingArtStudio</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fonts.css" />
    
    <script  src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
      $(document).ready(function(){

         // $(".spol1").click(function(){
           // value = $(this).attr("value");
          //  $.get("/services/load_tovar.php", value, function(result){
          //      $("#result").html(result);
          //  });
         // });


          $(".spol1").click(function(){
            var val = $(this).attr('value');
            $.ajax({
              type: "POST",
              url: "loadtovar.php",
              data: "value="+val,
              success: function(result)
              {
                $("#view_tovar").html(result);
              },
              error: function(){
                 alert('Problem whith POST!');
               }
            });
          });
      });
    </script>
  </head>
  <body>
  <!-- ��������� ����  "�������� ������"-->
    <div class="modal fade" id="modal_tovar">
      <div class="modal-dialog mdl">
        
      </div>
    </div>

  <header>
  <div id="result"></div>
    <div class="top_line">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="name_king">
              <strong>KingArtStudio</strong>
            </div>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>����� ����� � ��������� c "KINGARTSTUDIO"</h1>
        </div>
      </div>
    </div>
      
    <div class="button_top">
      <div class="container">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
           <a data-toggle="modal" href="#modal_order" class="button">������� �������������� �����</a> 
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>                      
    </div> 
  </header>



  <nav class="center_menu ">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul>
            <li><a href="#about_us" class="scrollto">� ���</a></li>
            <li><a href="#our_works" class="scrollto">���� ������</a></li>
            <li><a href="#delivery" class="scrollto">��������</a></li>
            <li><a href="#contacts" class="scrollto">��������</a></li>
            <li><a href="#" class="info">�������� ����������</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>



  <section class="about_us" id="about_us">
    <div class="container">
      <div class="row">
        <div class="col-md-4"><p class="block_opis_1">��� KINGARTSTUDIO</p></div>
        <div class="col-md-8">
          <p class="block_opis_2">KingArtStudio - ��� ������� ���������������������� ����������, ������ �� ������� ����� �� ������� ����� 7 ��� �����. �� ����� ����� ������������ �� ������� ����� 1000+ �������, ������� ��������� �������� ���� ������������� ������ ����� ��������.</p>
        </div>
      </div>
    </div>
      
    <div class="wrap_3">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="block_facts">
              <h1>7 ��� �� �����</h1>
              <p>�������� ����� ���, ������� ��������� ������ ��� ���</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="block_facts">
              <h1>1000+ ��������� ������</h1>
              <p>��� �������� ���� ����� �������� </p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="block_facts">
              <h1>870 ��������� ��������</h1>
              <p>����� ����������� �������� ��� ��������� ���� �������</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="block_facts">
              <h1>50+ ����� ����</h1>
              <p>�������������� ��������-�������� ����� �������</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="our_works" id="our_works">
    <div class="wrap_1">

      <div class="container">
        <div class="row">
          <div class="col-md-12"><span>���� ������</span></div>
        </div>
      </div>

      <div class="wrap_2">
        <div class="container">
          <div class="row">

            <div class="col-md-4">
              <div class="block_painting p_left">
                <img src="img/1.jpg" alt="alt">
                <a href="#" class=""><h3>��������</h3></a>
              </div>
            </div>

            <div class="col-md-4"> 
              <div class="block_painting">
                <img src="img/2.jpg" alt="alt">
                <a href="#" class=""><h3>����������</h3></a>
              </div>
            </div>

            <div class="col-md-4">
              <div class="block_painting">
                <img src="img/3.jpg" alt="alt">
                <a href="#" class="spol1" value="2"><h3>�������</h3></a>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </section>



  <section class="tovar">
    <div class="container">

      <div class="wrap_block_sorting">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <ul id="sort">
              <li>�����������:</li>
              <li><a href="index.php?sort=price-desc">�� ������� � �������</a></li>
              <li><a href="index.php?sort=price-asc">�� ������� � �������</a></li>
            </ul>
          </div>
          <div class="col-md-3"></div>            
        </div>
      </div>

        <div class="row" id="view_tovar">
          

        </div>
      </div>
    </section> 



  <section class="delivery" id="delivery">
    <div class="wrap_delivery">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>��������</span>
          </div>
        </div>
      </div>

      <div class="container p_top">
        <div class="row">
          <div class="col-md-4">
            <img src="img/delivery1.jpg" alt="alt">
          </div>
          <div class="col-md-8 p_block_text">
            <h3>�������</h3>
            <p>�� ��� ������ ������� �������� �������������� ������� "���� �����", � ������� 2-3 ���� ����� �������� ������. </p>
            <h3>������������� ��������</h3>
            <p>������������� �������� ������� �������������� � ����� ��� 200 ����� ���� � ������� ����� DHL, ��������, ����  �����, � ������� 7-14 ����.</p>
          </div>
        </div>
      </div>
    </div>  
  </section>



  <section class="contacts" id="contacts">
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <img src="img/phone.png" alt="alt">
          <strong>0938664141</strong>
        </div>

        <div class="col-md-4">
          <img src="img/mail.png" alt="alt">
          <strong>kingartst@mail.ru</strong>
        </div>

        <div class="col-md-4">
          <img src="img/place.png" alt="alt">
          <strong>�.�������, ��.���������� 45</strong>
        </div>
         
      </div>
    </div>
  </section>

<!-- ��������� ����  "����� ������"-->
<div class="modal fade" id="modal_order">
  <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">�������������� �����</h4>
      </div>

    <div class="modal-body"> 
      <form class="form-horizontal" id="contactForm">
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">���� ���</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
          </div>
          <div class="col-sm-2"></div>
        </div>

        <div class="form-group">
          <label for="mail" class="col-sm-3 control-label">��� Email</label>
          <div class="col-sm-7">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>
          <div class="col-sm-2"></div>
        </div>

        <div class="form-group">
          <label for="message" class="col-sm-3 control-label">���� ���������</label>
          <div class="col-sm-7">
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
          </div>
          <div class="col-sm-2"></div>
        </div>

        <div class="form-group">
          <label for="exampleInputFile" class="col-sm-3 control-label">��������� ����</label>
            <div class="col-sm-6">
              <input type="file" multiple="multiple" accept=".txt,image/*">
              <button class="submit button btn btn-default">��������� ����</button>
              <div class="ajax-respond"></div>
            </div>
            <div class="col-sm-3"></div>
        </div>

        <div class="form-group top_button_order">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <div class="top_buttons">
              <button type="submit" id="form-submit" class="btn btn-success">���������</button>
              <button class="btn btn-danger" type="button" data-dismiss="modal">��������</button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="modal-footer hidden">
      <p class="view-message">
        <h4>������ ����������</h4>
        <h5>� ������� ��� �� c ���� ��������</h5>
        </p>
    </div>
  </div>
</div>
</div>

    
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/script_upload.js"></script>
    <script src="js/func.js"></script> 
    <script type="text/javascript" src="js/scripts.js"></script>

  </body>
</html>