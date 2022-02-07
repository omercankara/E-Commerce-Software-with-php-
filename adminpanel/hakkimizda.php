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
                        if(@$_GET['yuklenme']=="basarili"){
                                 echo '<div class="alert alert-success"><h7>İşlem Başarılı</h1></div>';
                         }elseif(@$_GET['yuklenme']=="basarisiz"){
                                 echo '<div class="alert alert-danger"><h7>İşlem Başarısız</h1></div>';
                         }
                        ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="">
                    <label for="exampleInputPassword1">Logo Ekle</label>
                    <input  name="hakkimizdaresim" type="file" class="form-control"  placeholder="Logo Alanı">
                  </div>
        

            <input type="hidden" name="eskihakkimizdaresim" value="<?php echo $hakkimizdacek['hakkimizdaresim']?>">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Logo Ekle</label>
                    <img style="width:250px" src="resim/hakkimizda/<?php echo $hakkimizdacek['hakkimizdaresim']?>">
                  </div>

                   <div class="">
                    <label for="exampleInputPassword1">Hakkımızda Alanı Baslik</label>
                    <input  name="hakkimizdabaslik"  value="<?php echo $hakkimizdacek['hakkimizdabaslik']?>" type="text" class="form-control"  >
                  </div>


           

                  <div class="">
                    <label for="exampleInputPassword1">Hakkımızda Alanı Misyon</label>
                    <input name="hakkimizdamisyon" value="<?php echo $hakkimizdacek['hakkimizdamisyon']?>"  type="text" class="form-control"  placeholder="Email  Alanı">
                  </div>
                  <div class="">
                    <label for="exampleInputPassword1">Hakkımızda Alanı vizyon</label>
                    <input  name="hakkimizdavizyon" value="<?php echo $hakkimizdacek['hakkimizdavizyon']?>" type="text" class="form-control"  placeholder="Mesai saatleri  Alanı">
                  </div>
                  <div class="">
                      <label for="exampleInputPassword1">Hakkımızda Alanı Detay</label>
                        <textarea name="hakkimizdadetay" class="ckeditor" id="editor1"> <?php echo $hakkimizdacek['hakkimizdadetay']?></textarea>
                         </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button name="hakkimizdakaydet" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>

            <?php
                        require_once 'footer.php';
            ?>