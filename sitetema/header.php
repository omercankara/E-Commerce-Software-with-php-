<?php
        session_start();
        ob_start();
?>
<?php
error_reporting(0);
        require_once 'islem/baglan.php';
        require_once 'function.php';
?>

<?php
error_reporting(0);
        $hakkimizda=$baglanti->prepare("SELECT *  FROM hakkimizda where id=?");
        $hakkimizda -> execute(array(1));
        $hakkimizdacek=$hakkimizda->fetch(PDO::FETCH_ASSOC);

        $ayar=$baglanti->prepare("SELECT *  FROM ayarlar where id=?");
        $ayar -> execute(array(1));
        $ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);

        $kullanicisor=$baglanti->prepare("SELECT * from kullanici WHERE kullanici_adi=:kullanici_adi ");
        $kullanicisor->execute(array(
                'kullanici_adi' =>$_SESSION['normalgiris'] //Panelde kayıtlı olan kullanıcı adını normalgiris degiskeniyle tutuyoruz,
        ));
        $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
        $var = $kullanicisor->rowCount();
      
            
  

      
?>


   <header>

      <div class="header-top bg-dark">
                    <div class="container" >
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span class="text-white">Telefon</span><a class="text-white" href="#"> <?php echo $ayarcek['telefon']?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>
                                            <div class="ht-setting-trigger"><span class="text-white">Hesabım</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="kullanici.php">Hesabım</a></li>
                                                    <li><a href="sepet.php">Sepetim</a></li>
                                                    <li><a href="siparisler.php">Ürünlerim</a></li>
                                                    <li><a href="sifremidegistir">Hesap Ayarları</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                 
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>

                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="index.html">
                                        <img src="images/menu/logo/1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="#" class="hm-searchbox">
                                    <select class="nice-select select-search-category">
                                        <option value="0">All</option>                         
                                        <option value="10">Laptops</option>                     
                                        <option value="17">- -  Prime Video</option>                    
                                        <option value="20">- - - -  All Videos</option>                   
                                    </select>
                                    <input type="text" placeholder="Enter your search key ...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist">
                                            <a href="kullanici">
                                                
                                                <i class="fa fa-user-o"></i>

                                            </a>
                                            Hesabım
                                        </li>


                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">£80.00
                                                    <span class="cart-item-count">2</span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">

                                                
                                              <?php
                                              
                                                foreach($_COOKIE['sepet'] as $key =>$value){
                                                        $urunler=$baglanti->prepare("SELECT *  FROM urunler  where urun_id=:urun_id order by urun_sira ASC"); //nereden gelsin ? kategori_id den gelsin bi nevi filtre
                                                        $urunler -> execute(array(
                                                                'urun_id'=>$key 
                                                         ));
                                                         $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);

                                                                 $sepettoplam+=$value * $urunlercek['urun_fiyat'] ; //value ile urun fiyatını çarp sepet toplama at
                                                                 $kdv = $sepettoplam * 18/100;
                                                                 $geneltoplam = $sepettoplam + $kdv;
                      
                                              
                                 ?>
                                        <li>
                                                        <a href="single-product.html" class="minicart-product-image">
                                                         <img class="img-fluid" style="width:250px;"  src='../adminpanel/resim/urunler/<?php echo $urunlercek['urun_resim']?>'>
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="single-product.html"><?php echo $urunlercek['urun_baslik']?></a></h6>
                                                            <span><?php echo $urunlercek['urun_fiyat'] ?> TL</span>
                                                        </div>
                                                       <a href="islem/islem?sepetsil&id=<?php echo $key?>">
                                                        <button class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button></a>
                                        </li>

                                             <?php } ?>
                                                </ul>
                                                <p class="minicart-total">Toplam Fiyat: <span><?php echo $geneltoplam;   ?></span></p>
                                                <div class="minicart-button">
                                                    <a href="sepet.php" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Sepeti Gör</span>
                                                    </a>
                                                    <a href="checkout.html" class="li-button li-button-fullwidth">
                                                        <span>Alışverişi Tamamla</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                            
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                              <li><a href="index.php">Anasayfa</a></li>
                                            <li class="megamenu-holder"><a href="">Kategoriler</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <li>KATEGORİLER 1
                                                        <ul>
                                                             <?php
                                                                                $kategori=$baglanti->prepare("SELECT *  FROM kategori  where kategori_durum=:kategori_durum and kategori_sira between 1 and 10 limit 8"); //1 ile 20 arasındaki dataları fakat 8 tane ile limitle
                                                                                $kategori -> execute(array(
                                                                                        'kategori_durum'=>1
                                                                                ));
                                                                                while( $kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)){?>
                                                                                        <li><a href="urunler-<?=seo($kategoricek['kategori_adi']). '-'. $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_adi']?></a></li>
                                                                <?php }?>
                                                        </ul>
                                                    </li>
                                                    <li><a href="single-product-gallery-left.html">KATEGORİLER 2</a>
                                                        <ul>

                                                                        <?php
                                                                                $kategori=$baglanti->prepare("SELECT *  FROM kategori  where kategori_durum=:kategori_durum and kategori_sira between 10 and 20 limit 8"); //1 ile 20 arasındaki dataları fakat 8 tane ile limitle
                                                                                $kategori -> execute(array('kategori_durum'=>1));
                                                                                while( $kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)){?>
                                                                                        <li><a href="urunler-<?=seo($kategoricek['kategori_adi']). '-'. $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_adi']?></a></li>
                                                                                <?php }?>
                                                      
                                                           
                                                        </ul>
                                                    </li>

                                                            <li><a href="single-product-gallery-left.html">KATEGORİLER 3</a>
                                                        <ul>

                                                                        <?php
                                                                                $kategori=$baglanti->prepare("SELECT *  FROM kategori  where kategori_durum=:kategori_durum and kategori_sira between 20 and 30 limit 8"); //1 ile 20 arasındaki dataları fakat 8 tane ile limitle
                                                                                $kategori -> execute(array('kategori_durum'=>1));
                                                                                while( $kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)){?>
                                                                                        <li><a href="urunler-<?=seo($kategoricek['kategori_adi']). '-'. $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_adi']?></a><?php echo $kategoricek['kategori_adi']?></a></li>
                                                                        <?php }?>   
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                           
                                           
                                         
                                            <li><a href="hakkimizda.php">Hakkımızda</a></li>
                                            <li><a href="bilgi.php">Kargo Bilgileri</a></li>
                                            <li><a href="">İletisim</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>