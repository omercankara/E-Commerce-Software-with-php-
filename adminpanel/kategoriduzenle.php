<?php
        require_once 'islem/baglan.php';
?>
<?php
        include 'header.php';
        require_once 'sidebar.php';
        
        $kategori=$baglanti->prepare("SELECT *  FROM kategori where kategori_id=:kategori_id");
        $kategori -> execute(array(
                'kategori_id'=>$_GET['id']
        ));
        $kategoricek=$kategori->fetch(PDO::FETCH_ASSOC);
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
                    <input value="<?php echo $kategoricek['kategori_adi']?>"  name="kategoriadi" type="text" class="form-control"  >
                  </div>


                 <input type="hidden" name="katid" value="<?php echo $kategoricek['kategori_id']?>">

                  <div class="">
                    <label for="exampleInputPassword1">Kategori Sira</label>
                    <input value="<?php echo $kategoricek['kategori_sira']?>" name="kategorisira" type="text" class="form-control"  placeholder="Email  Alanı">
                  </div>

                   
                <div class="">
                  <label>Kategori Durum</label>
                  <select name="kategori_durum" class="form-control select2bs4" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                     <option value="0">Pasif</option>
                  </select>
                </div>

                <div class="card-footer">
                <button name="kategoriduzenle" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>

            <?php
                        require_once 'footer.php';
            ?>