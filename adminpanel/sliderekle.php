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
                <h3 class="card-title">Slider  Bölümü Ayarları</h3>
                      
                
              </div>
                <?php
                        if(@$_GET['durum']=="basarili"){
                                 echo '<div class="alert alert-success"><h7>Yeni Üye Kaydı Başarıyla Tamamlandı</h1></div>';
                         }elseif(@$_GET['durum']=="basarisiz"){
                                 echo '<div class="alert alert-danger"><h7>İşlem Başarısız ZATEN BÖYLE BİR slider VAR</h1></div>';
                         }
                        ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">



                   <div class="">
                    <label for="exampleInputPassword1">slider Başlık</label>
                    <input  name="sliderbaslik" type="text" class="form-control"  >
                  </div>


                
                  <div class="">
                    <label for="exampleInputPassword1">slider Resim</label>
                    <input name="sliderresim" type="file" class="form-control" >
                  </div>

           

                  <div class="">
                    <label for="exampleInputPassword1">slider Açıklama</label>
                    <input name="slideraciklama" type="text" class="form-control"  >
                  </div>



                  <div class="">
                    <label for="exampleInputPassword1">slider Sıra</label>
                    <input name="slidersira" type="text" class="form-control" >
                  </div>

                  
                  <div class="">
                    <label for="exampleInputPassword1">slider Link</label>
                    <input name="sliderlink" type="text" class="form-control"  >
                  </div>

                  
                  <div class="">
                    <label for="exampleInputPassword1">slider Button</label>
                    <input name="sliderbutton" type="text" class="form-control" >
                  </div>

    
                  
                    <div class="">
                  <label>slider Durum </label>
                  <select name="sliderdurum" class="form-control select2bs4" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                     <option value="0">Pasif</option>
                  </select>
                </div>

        
                 <div class="">
                  <label>slider Banner </label>
                  <select name="sliderbanner" class="form-control select2bs4" style="width: 100%;">
                    <option value="1" selected="selected">Slider Yap</option>
                     <option value="0" >Banner Yap</option>
                  </select>
                </div>
                

                <div class="card-footer">
                <button name="sliderkaydet" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>

            <?php
                        require_once 'footer.php';
            ?>