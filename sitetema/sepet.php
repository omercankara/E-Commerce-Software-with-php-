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
                                                <th class="li-product-remove"></th>
                                                <th class="li-product-thumbnail">Resim</th>
                                                <th class="cart-product-name">Ürün Başlık</th>
                                                <th class="li-product-price">Ücret</th>
                                                <th class="li-product-quantity">Adet</th>
                                                <th class="li-product-subtotal">Toplam Fiyat</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              <?php
                                              
                                        foreach(@$_COOKIE['sepet'] as $key =>$value){
                                                $urunler=$baglanti->prepare("SELECT *  FROM urunler  where urun_id=:urun_id order by urun_sira ASC"); //nereden gelsin ? kategori_id den gelsin bi nevi filtre
                                                $urunler -> execute(array(
                                                         'urun_id'=>$key 
                                                ));
                                                 $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);
                                 ?>
                                                

                                   
                                                
     
                                                <tr><td class='li-product-remove'><a href='islem/islem?sepetsil&id=<?php echo $key?>'><i class='fa fa-times'></i></a></td>
                                                                         <td class='li-product-thumbnail'><a href='#'><img class="img-fluid" style="width:250px;"  src='../adminpanel/resim/urunler/<?php echo $urunlercek['urun_resim']?>' alt='Li's Product Image'></a></td>
                                                                         <td class='li-product-name'><a href='#'><?php echo $urunlercek['urun_baslik']?></a></td>
                                                                          <td class='li-product-price'><span class='amount'><?php echo $urunlercek['urun_fiyat']?></span></td>
                                                                           <td class='quantity'>
                                                                         <label>Adet</label>
                                                                        <div class='cart-plus-minus'>
                                                                              <input value="<?php echo $value?>" class='cart-plus-minus-box' value='0' type='text'>
                                                                                   <div class='dec qtybutton'><i class='fa fa-angle-down'></i></div>
                                                                                   <div class='inc qtybutton'><i class='fa fa-angle-up'></i></div>
                                                                           </div>
                                                                 </td>
                                                        <td class='product-subtotal'><span class='amount'><?php echo $value * $urunlercek['urun_fiyat'] ?> TL</span></td>
                                                        </tr>

                                        <?php
                                        
                                              
                                        $kdv = $sepettoplam * 18/100;
                                        $geneltoplam = $sepettoplam + $kdv;
                                        ?>
                                        
                                 <?php }?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                                <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Update cart" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Toplam Fiyat</h2>
                                            <ul>
                                                <li> Fiyat <span><?php  echo $sepettoplam ?> TL</span></li>
                                                <li>Kdv <span><?php echo $kdv ?></span> TL</li>
                                                <li>Genel Fiyat <span><?php echo $geneltoplam ?></span></li>

                                            </ul>
                                           <a href="alisveris?toplamfiyat=<?php echo $geneltoplam ?>">Alışverişi Tamamla</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
            <!-- Begin Footer Area -->
   <?php require_once 'footer.php'; ?>