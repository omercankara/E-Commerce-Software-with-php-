<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- shopping-cart31:32-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shopping Cart || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
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
          
          <?php require_once 'header.php'; ?>
          
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                        <?php if(@$_GET['eklenme']=="basarili"){
                                    echo '<div class="alert alert-success">Sepete Eklendi</div>';
                        }?>
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th>Sipariş Numarası</th>
                                                <th>Sipariş Güncelleme</th>
                                              
                                                <th class="li-product-thumbnail">Resim</th>
                                                <th class="cart-product-name">Ürün Başlık</th>
                                                <th class="li-product-price">Ücret</th>
                                                <th class="li-product-quantity">Adet</th>
                                                <th class="li-product-quantity">Siparis Zamanı</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                              <?php
                                                        $siparis=$baglanti->prepare("SELECT *  FROM siparisler  where kullanici_id=:kullanici_id "); // kategori_id den gelsin bi nevi filtreleme
                                                        $siparis -> execute(array(
                                                                'kullanici_id'=>$kullanicicek['kullanici_id'] 
                                                         ));
                                                    while( $sipariscek=$siparis->fetch(PDO::FETCH_ASSOC)){

                                                        $alinanid =  $sipariscek['urun_id'];
                                                        $urunler=$baglanti->prepare("SELECT *  FROM urunler  where urun_id=:urun_id "); //urun_id den gelsin bi nevi filtre
                                                        $urunler -> execute(array(
                                                        'urun_id'=>$alinanid //htacces den geldigi gibi yakalamalıyız
                                                       
                                                 ));
                                                $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);
                                                        ?>

                                                    
                                        
                                                
                                                <tr>
                                                <td><?php echo $sipariscek['siparis_id']?></td>
                                                      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Sipariş Güncelle
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hemen Siparişinizi Güncelleyin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                Eğer Siparişi Verdikten 24 Saat Geçmediyse bu siparişi güncelleyebilirsiniz Fakat 24 saat geçtiyse kargonuz yola çıkacağı için siparişinizi Güncelleyemezsiniz
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
        <a href="siparisguncelle"> <button type="button" class="btn btn-success">Siparişimi Güncelle</button></a>
      </div>
    </div>
  </div>
</div></td>

                                                                <td class='li-product-thumbnail'><a href='#'><img class="img-fluid" style="width:250px;"  src='../adminpanel/resim/urunler/<?php echo $urunlercek['urun_resim']?>' alt='Li's Product Image'></a></td>
                                                                <td class='li-product-name'><a href='#'><?php echo $urunlercek['urun_baslik']?></a></td>
                                                                <td class='li-product-price'><span class='amount'><?php echo $sipariscek['urun_fiyat']?></span></td>
                                                                <td class='quantity'>
                                                                                <label>Adet</label>
                                                                                <div class='cart-plus-minus'>
                                                                                        <input value="<?php echo $sipariscek['urun_adet']?>" class='cart-plus-minus-box' value='0' type='text'>
                                                                                                <div class='dec qtybutton'><i class='fa fa-angle-down'></i></div>
                                                                                                <div class='inc qtybutton'><i class='fa fa-angle-up'></i></div>
                                                                                </div>
                                                                 </td>
                                                                <td class='li-product-price'><span class='amount'><?php echo $sipariscek['siparis_zaman']?></span></td>
                                                          

                                        
                                                        </tr>
                                   

                                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
            <!-- Begin Footer Area -->
   <?php require_once 'footer.php'; ?>