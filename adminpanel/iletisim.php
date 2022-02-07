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
                <h3 class="card-title">İletişim Ayarları</h3>
                      
                
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
                    <label for="exampleInputEmail1">Telefon Numarası</label>
                    <input value="<?php echo $ayarcek['telefon']?>" name="telefon" type="text" class="form-control"  placeholder="Telefon Numarası Alanı">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Adres</label>
                    <input value="<?php echo $ayarcek['adres']?>" name="adres" type="text" class="form-control"  placeholder="Adres Alanı">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">E Mail</label>
                    <input value="<?php echo $ayarcek['email']?>" name="email" type="text" class="form-control"  placeholder="Email  Alanı">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mesai saatleri</label>
                    <input value="<?php echo $ayarcek['mesai']?>" name="mesai" type="text" class="form-control"  placeholder="Mesai saatleri Alanı">
                  </div>
    
     
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button name="iletisimkaydet" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>