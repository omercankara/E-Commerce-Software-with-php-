<?php
        require_once 'islem/baglan.php';
?>



<?php
        include 'header.php';
        require_once 'sidebar.php'
?>
<div class="content-wrapper">
<div class="content">
<div class="row">
  
  <div class="card card-primary col-12  col-md-12">
              <div class="card-header">
                <h3 class="card-title">Hakkımızda Bölümü Ayarları</h3>
                      
                
              </div>
                <?php
                        if(@$_GET['durum']=="basarili"){
                                 echo '<div class="alert alert-success"><h7>Yeni Üye Kaydı Başarıyla Tamamlandı</h1></div>';
                         }elseif(@$_GET['durum']=="basarisiz"){
                                 echo '<div class="alert alert-danger"><h7>İşlem Başarısız ZATEN BÖYLE BİR KULLANICI VAR</h1></div>';
                         }
                        ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                 <div class="">
                    <label for="exampleInputPassword1">Kullanici Resmi Ekle</label>
                    <input  name="kullaniciresim" type="file" class="form-control"  placeholder="Logo Alanı">
                  </div>
        
                   <div class="">
                    <label for="exampleInputPassword1">Kullanıcı Adı</label>
                    <input  name="kadi" type="text" class="form-control"  >
                  </div>


                  <div class="">
                    <label for="exampleInputPassword1">Kullanıcı Şifre</label>
                    <input name="sifre" type="text" class="form-control"  placeholder="Email  Alanı">
                  </div>

                  <div class="">
                    <label for="exampleInputPassword1">İsim Bilgisi</label>
                    <input  name="adsoyad" type="text" class="form-control"  placeholder="Mesai saatleri  Alanı">
                  </div>

                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button name="uyekaydet" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>

            <?php
                        require_once 'footer.php';
            ?>