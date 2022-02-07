<?php
        require_once 'islem/baglan.php';
?>
<?php
        include 'header.php';
        require_once 'sidebar.php';

        $slider=$baglanti->prepare("SELECT *  FROM slider where slider_id=:slider_id");
        $slider -> execute(array(
                'slider_id'=>$_GET['id']
        ));
        $slidercek=$slider->fetch(PDO::FETCH_ASSOC);
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
                    <input value="<?php echo $slidercek['slider_baslik']?>"  name="sliderbaslik" type="text" class="form-control"  >
                  </div>

                       
                
                  <div class="">
                    <label for="exampleInputPassword1">slider Resim</label>
                    <input value="<?php echo $slidercek['slider_resim']?>" name="sliderresim" type="file" class="form-control" >
                  </div>

                        <input type="hidden" name="id" value="<?php echo $slidercek['slider_id']?>">
                        <input type="hidden" name="eskiresim" value="<?php echo $slidercek['slider_resim']?>">
           

                  <div class="">
                    <label for="exampleInputPassword1">slider Açıklama</label>
                    <input value="<?php echo $slidercek['slider_aciklama']?>" name="slideraciklama" type="text" class="form-control"  >
                  </div>



                  <div class="">
                    <label for="exampleInputPassword1">slider Sıra</label>
                    <input value="<?php echo $slidercek['slider_sira']?>" name="slidersira" type="text" class="form-control" >
                  </div>

                  
                  <div class="">
                    <label for="exampleInputPassword1">slider Link</label>
                    <input value="<?php echo $slidercek['slider_link']?>" name="sliderlink" type="text" class="form-control"  >
                  </div>

                  
                  <div class="">
                    <label for="exampleInputPassword1">slider Button</label>
                    <input value="<?php echo $slidercek['slider_button']?>" name="sliderbutton" type="text" class="form-control" >
                  </div>

    
                  
                    <div class="">
                  <label>slider Durum </label>
                  <select name="sliderdurum" class="form-control select2bs4" style="width: 100%;">
                    <option <?php if($slidercek['slider_durum']=="1"){
                        echo "selected";
                    } ?> value="1" selected="selected"> Aktif </option>

                   <option <?php if($slidercek['slider_durum']=="0"){
                        echo "selected";
                    } ?> value="0" > Pasif
                    </option>
                  </select>
                </div>

        
                   
                <div class="">
                  <label>slider Durum </label>
                  <select name="sliderbanner" class="form-control select2bs4" style="width: 100%;">
                    <option <?php if($slidercek['slider_banner']=="1"){
                        
                    } ?> value="1" selected="selected"> Slider Yap </option>

                   <option <?php if($slidercek['slider_banner']=="0"){
                        echo "selected";
                    } ?> value="0" > Banner Yap
                    </option>



                  
                  </select>
                </div>
                

                <div class="card-footer">
                <button name="sliderduzenle" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>

            <?php
                        require_once 'footer.php';
            ?>