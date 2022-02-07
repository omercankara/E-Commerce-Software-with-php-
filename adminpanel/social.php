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
                <h3 class="card-title">Sosyal Medya  Ayarları</h3>
                      
                
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
                    <label for="exampleInputEmail1">Facebook</label>
                    <input value="<?php echo $ayarcek['facebook']?>" name="facebook" type="text" class="form-control"  placeholder="Facebook Bilgisi">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">İnstagram</label>
                    <input value="<?php echo $ayarcek['instagram']?>" name="instagram" type="text" class="form-control"  placeholder="Lütfen  insagram bilgilerini giriniz">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Twitter</label>
                    <input value="<?php echo $ayarcek['twitter']?>" name="twitter" type="text" class="form-control"  placeholder="Twitter  Alanı">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Youtube</label>
                    <input value="<?php echo $ayarcek['youtube']?>" name="youtube" type="text" class="form-control"  placeholder="Youtube  Alanı">
                  </div>
                 
     
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button name="socialkaydet" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>