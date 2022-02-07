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
                <h3 class="card-title">Kategori Bölümü Ayarları</h3>
                      
                
              </div>
                <?php
                        if(@$_GET['durum']=="basarili"){
                                 echo '<div class="alert alert-success"><h7>Yeni Üye Kaydı Başarıyla Tamamlandı</h1></div>';
                         }elseif(@$_GET['durum']=="basarisiz"){
                                 echo '<div class="alert alert-danger"><h7>İşlem Başarısız ZATEN BÖYLE BİR kategori VAR</h1></div>';
                         }
                        ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">


            

                   <div class="form-group">
                    <label for="exampleInputPassword1">kategori Adı</label>
                    <input  name="kategoriadi" type="text" class="form-control"  >
                  </div>


           

                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori Sira</label>
                    <input name="kategorisira" type="text" class="form-control"  placeholder="Kategori Sira">
                  </div>

                   
                <div class="form-group">
                  <label>Kategori Durum</label>
                  <select name="kategoridurum" class="form-control select2bs4" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                     <option value="0" selected="selected">Pasif</option>
                  </select>
                </div>

                <div class="card-footer">
                <button name="kategorikaydet" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>

            <?php
                        require_once 'footer.php';
            ?>