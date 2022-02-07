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
                                    <h4 class="login-title">Kullanıcı Bilgileri</h4>
                                        <?php
                                        if(@$_GET['yuklenme']=="basarili"){
                                                echo '<div class="alert alert-success"><h7>Düzenleme İşlemi Başarıyla Tamalandı </h1></div>';
                                         }
                                        ?>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Kullanıcı ad soy ad</label>
                                            <input class="mb-0" value="<?php echo $kullanicicek['kullanici_adsoyad']?>" name="kullaniciadi" type="text" placeholder="Ad Soy Ad">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>E Mail</label>
                                            <input class="mb-0" value="<?php echo $kullanicicek['kullanici_mail']?>" name="email" type="text" placeholder="E-Mail Giriniz">
                                        </div>
                                                                <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek['kullanici_id']?>">

                                           <div class="col-12 mb-20">
                                            <label>Sehir</label>
                                            <input class="mb-0"  value="<?php echo $kullanicicek['kullanici_il']?>" name="sehir" type="text" placeholder="Sehir Giriniz">
                                        </div>

                                                  <div class="col-12 mb-20">
                                            <label>İlce</label>
                                            <input class="mb-0"  value="<?php echo $kullanicicek['kullanici_ilce']?>" name="ilce" type="text" placeholder="İlce Giriniz">
                                        </div>

                                        <div class="col-12 mb-20">
                                            <label>Telefon</label>
                                            <input class="mb-0" value="<?php echo $kullanicicek['kullanici_tel']?>"    name="telefon" type="text" placeholder="Telefon Giriniz">
                                        </div>

                                        <div class="col-12 mb-20">
                                            <label>Adres</label>
                                            <input class="mb-0" name="adres" value="<?php echo $kullanicicek['kullanici_adres']?>" type="text" placeholder="Adres Giriniz">
                                        </div>
                                       
                                       
                                        <div class="col-md-12">
                                            <button name="kullaniciduzenle" class="register-button mt-0">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="ozelislem.php" method="POST" >
                                <div class="login-form">
                                    <h4 class="login-title">Kayıt Ol</h4>
                                         <?php
                                        if(@$_GET['durum']=="hata"){
                                                echo '<div class="alert alert-danger"><h7>Bu Kullanıcı Adı Daha Önce Başkası Tarafından Kullanılmış</h7></div>';
                                         }elseif(@$_GET['durum']=="parola"){
                                                  echo '<div class="alert alert-danger"><h7>Parolalar Uyuşmuyor LÜTFEN KONTROL EDİNİZ</h7></div>';
                                         }elseif(@$_GET['durum']=="hosgeldin"){
                                                  echo '<div class="alert alert-success"><h7>Tebrikler Kayıt Sağlandı</h7></div>';
                                         }
                                        ?>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Kullanıcı adı</label>
                                            <input required class="mb-0" name="kullaniciadi" type="text" placeholder="">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Ad Soy ad</label>
                                            <input  required  class="mb-0" name="isim" type="text" >
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email Address*</label>
                                            <input  required class="mb-0" name="mail" type="text" placeholder="">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Şifre</label>
                                            <input  required class="mb-0"  name="sifre"  type="password" placeholder="">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Şifre yeniden</label>
                                            <input required  class="mb-0" name="sifretekrar" type="password" placeholder="">
                                        </div>
                                        <div class="col-12">
                                            <button name="kayit" class="register-button mt-0">Kayıt Tamamla</button>
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