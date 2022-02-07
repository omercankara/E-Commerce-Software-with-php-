<!doctype html>
<html class="no-js" lang="zxx">

    
<!-- login-register31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login Register || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- Modernizr js -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
                <?php
                        require_once 'header.php';
                        
          if($var==0){
                header("Location:login.php");
        }
  
                ?>
       
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="ozelislem.php" method="POST" >
                                <div class="login-form">
                                <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek['kullanici_id']?>">
                                    <h4 class="login-title">Kullanıcı Bilgileri</h4>
                                        <?php
                                        if(@$_GET['yuklenme']=="basarili"){
                                                echo '<div class="alert alert-success"><h7>Düzenleme İşlemi Başarıyla Tamalandı </h1></div>';
                                         }
                                        ?>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Yeni Adet Sayısını Giriniz</label>
                                            <input class="mb-0" value="" name="yeniadet" type="text" placeholder="Adet Giriniz">
                                        </div>

                                        <div class="col-12 mb-20">
                                            <label>Sipariş Numaranızı Yazınız</label>
                                            <input class="mb-0" value="" name="numara" type="text" placeholder="Sipariş Numaranızı Giriniz">
                                        </div>
                                        

                                           <div class="col-12 mb-20">
                                            <label>Sipariş Notunuzu Yazınız</label>
                                            <input class="mb-0" value="" name="not" type="text" placeholder="Sipariş Notunuzu Giriniz">
                                        </div>
         
                                
                                  
                                   
                                       
                                       
                                        <div class="col-md-12">
                                            <button name="siparisguncelle" class="register-button mt-0">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                  
                    </div><a href="cikis.php"><button style="float:right;" type="submit" class="btn btn-info">Cikis Yap</button></a>
                </div>
            </div>
            <!-- Login Content Area End Here -->
            <!-- Begin Footer Area -->
        
        <?php
                require_once 'footer.php';
        ?>