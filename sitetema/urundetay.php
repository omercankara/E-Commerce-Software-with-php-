<!doctype html>
<html class="no-js" lang="zxx">
             <?php
                                require_once 'header.php';
         ?>
   <?php
                require_once 'islem/islem.php';
                require_once 'islem/baglan.php';
                require_once 'function.php';
        ?>
        <?php
                        $urunler=$baglanti->prepare("SELECT *  FROM urunler  where urun_id=:urun_id order by urun_sira ASC"); //nereden gelsin ? kategori_id den gelsin bi nevi filtre
                        $urunler -> execute(array(
                                'urun_id'=>$_GET['urun_id'], //htacces den geldigi gibi yakalamalıyız    
                        ));
                        $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);
                        $katsid=$urunlercek['kategori_id']
        ?>

<!-- single-product31:30-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Single Product || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
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

        <div class="body-wrapper">
     
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                <?php
                                $cokluresim=$baglanti->prepare("SELECT *  FROM cokluresim where urun_id=:urun_id order by id ASC");
                                $cokluresim -> execute(array(
                                 'urun_id'=>$_GET['urun_id']
                                ));
                                  while( $cokluresimcek=$cokluresim->fetch(PDO::FETCH_ASSOC)){?>
                                    <div class="lg-image">
                                            <img class="img-fluid" style="height:300px;" src="../adminpanel/resim/cokluresim/<?php echo $cokluresimcek['resim']?>"  alt="product image">
                                    </div>
                          <?php }?>
        
                                </div>
                                <div class="product-details-thumbs slider-thumbs-1">     

                                     <?php
                                        $cokluresim=$baglanti->prepare("SELECT *  FROM cokluresim where urun_id=:urun_id order by id ASC");
                                        $cokluresim -> execute(array(
                                        'urun_id'=>$_GET['urun_id']
                                         ));
                                        while($cokluresimcek=$cokluresim->fetch(PDO::FETCH_ASSOC)){?>             
                                    <div class="sm-image">
                                        <img style="min-height:100px;" src="../adminpanel/resim/cokluresim/<?php echo $cokluresimcek['resim']?>" alt="product image thumb">
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                  <h2><?php echo $urunlercek['urun_baslik']?></h2>
                             
                                  
                                    <div class="price-box pt-20">
                                       <span class="new-price new-price-2"><?php echo $urunlercek['urun_fiyat']?></span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span>
                                                <?php echo $urunlercek['urun_aciklama']?>
                                            </span>
                                        </p>
                                    </div>
                                   
                                    <div class="single-add-to-cart">
                                        <form action="islem/islem.php" method="post" class="cart-quantity"> <!--SEPET İŞEMİ-->
                                            <div class="quantity">
                                                <label>Adet</label>

                                                <div class="cart-plus-minus">
                                                    <input name="adet" class="cart-plus-minus-box"  value="0" type="number">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>


                                            </div>
                                            <input type="hidden" name="urunid" value="<?php echo $urunlercek['urun_id']?>" >
                                           <button name="sepeteekle" class="add-to-cart" type="submit">Sepete Ekle</button>
                                        </form>
                                         
                                    </div>
                                    <div class="product-additional-info pt-25">
                                        <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                        <div class="product-social-sharing pt-25">
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="block-reassurance">
                                        <ul>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </div>
                                                    <p>Security policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-truck"></i>
                                                    </div>
                                                    <p>Delivery policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-exchange"></i>
                                                    </div>
                                                    <p> Return policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Açıklama</span></a></li>
                              
                                   <li><a data-toggle="tab" href="#reviews"><span>Yorumlar</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                              <span>
                                        <?php  echo $urunlercek['urun_aciklama']     ?>
                                </span>
                            </div>
                        </div>
                     
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                 
                                <?php
                                        $yorumlar=$baglanti->prepare("SELECT *  FROM yorumlar where urun_id=:urun_id and yorum_onay=:yorum_onay order by yorum_id DESC");
                                        $yorumlar -> execute(array(
                                                'urun_id'=>$_GET['urun_id'],
                                                'yorum_onay'=>1
                                        ));
                                        while( $yorumlarcek=$yorumlar->fetch(PDO::FETCH_ASSOC)){?>
                                  <?php $yorumyapanid = $yorumlarcek['kullanici_id'];

                                $kullanicilar=$baglanti->prepare("SELECT *  FROM kullanici where kullanici_id=:kullanici_id ");
                                $kullanicilar -> execute(array(
                                        'kullanici_id'=>$yorumyapanid      
                                ));
                                $kullanicilarcek=$kullanicilar->fetch(PDO::FETCH_ASSOC);
                              
                ?>
                                    <div class="comment-author-infos pt-25">
                                        <span> <?php echo $kullanicilarcek['kullanici_adsoyad']?></span><br>
                                        <span><?php echo $yorumlarcek['yorum_detay']?></span>
                                    </div>
                                    <?php } ?>
                              
                               <div class="review-btn">
                                        <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Yorum Yaz!</a>
                                </div>
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="review-page-title">Fikrinizi Belirtin</h3>
                                                    <div class="modal-inner-area row">
                                                       
                                                        <div class="col-lg-12">
                                                            <div class="li-review-content">
                                                                
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        
                                                                        <form action="ozelislem.php" method="POST">
                                                                        <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                                                                        <input type="hidden" name="urunid" value="<?php echo $urunlercek['urun_id'] ?>">
                                                             
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Yorumunuz</label>
                                                                                <textarea id="feedback" name="yorum" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                                <div class="feedback-btn pb-15">
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Kapat</a>
                                                                                    <button class="btn btn-info" type="submit" name="yorumkaydet"> Gönder</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
              <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Buna Benzer Ürünler:</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                <?php
                                $urunler=$baglanti->prepare("SELECT *  FROM urunler  where kategori_id=:kategori_id and urun_durum=:urun_durum order by urun_sira ASC"); //nereden gelsin ? kategori_id den gelsin bi nevi filtre
                                 $urunler -> execute(array(
                                'kategori_id'=>$katsid, //htacces den geldigi gibi yakalamalıyız
                                'urun_durum'=>1  
                        ));
                        while( $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC)) {?>
                                    <div class="col-lg-12">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                               <a href="urundetay-<?=seo($urunlercek['urun_baslik']). '-'. $urunlercek['urun_id'] ?>">
                                                <img src="../adminpanel/resim/urunler/<?php echo $urunlercek['urun_resim']?>" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">Benzer</span>
                                            </div>
                                            <div class="product_desc">  
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                     
                                                      
                                                    </div>
                                                    <h6><a href="urundetay-<?=seo($urunlercek['urun_baslik']). '-'. $urunlercek['urun_id'] ?>"><?php echo $urunlercek['urun_baslik']?></a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price"><?php echo $urunlercek['urun_fiyat']?></</span>
                                                    </div>
                                                </div>
                                             <!--
                                                           <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="#">Detaya Git</a></li>
                                                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                        <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                    </ul>
                                                </div>
                                             -->
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="urundetay-<?=seo($urunlercek['urun_baslik']). '-'. $urunlercek['urun_id'] ?>">Detaya Git</a></li>
                                                    
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    <?php } ?>
                     
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
   
   \
   <?php  require_once 'footer.php'; ?>