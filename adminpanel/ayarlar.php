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
                <h3 class="card-title">Genel Ayarlar </h3> 
                
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
              <form  action="islem/islem.php" method="POST">
                <div class="card-body">


                  <div class="form-group">
                    <label for="exampleInputEmail1">Site Başlığı</label>
                    <input value="<?php echo $ayarcek['baslik']?>" name="baslik" type="text" class="form-control"  placeholder="Site Başlığı Alanı">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Açıklama</label>
                    <input value="<?php echo $ayarcek['aciklama']?>" name="aciklama" type="text" class="form-control"  placeholder="Açıklama Alanı">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Anahtar Kelime</label>
                    <input value="<?php echo $ayarcek['anahtarkelime']?>" name="anahtarkelime" type="text" class="form-control"  placeholder="Anahtar Kelime Alanı">
                  </div>
                 
     
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                         <button name="ayarkaydet" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
              
</div>

  <div class="card card-primary col-12  col-md-12">
         
              
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
        <input type="hidden" name="eskilogo" value="<?php echo $ayarcek['logo']?>">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Logo Ekle</label>
                    <img style="width:250px" src="resim/<?php echo $ayarcek['logo']?>">
                  </div>
                 
              

                  <div class="form-group">
                    <label for="exampleInputPassword1">Logo Ekle</label>
                    <input  name="logo" type="file" class="form-control"  placeholder="Logo Alanı">
                  </div>
                 
     
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                         <button name="logokaydet" type="submit" class="btn btn-primary">Logo Kaydet</button>
                </div>
              </form>
              
</div>




            </div>
            </div>
            </div>
            