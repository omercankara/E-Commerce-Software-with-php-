<?php
        require_once 'islem/baglan.php';
?>
<?php
        include 'header.php';
        require_once 'sidebar.php';

        $urunler=$baglanti->prepare("SELECT *  FROM urunler where urun_id=:urun_id");
        $urunler -> execute(array(
                'urun_id'=>$_GET['id']
        ));
        $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);



?>
<div class="content-wrapper">
<div class="content">
<div class="row">
  
  <div class="card card-primary col-12  col-md-12">
              <div class="card-header">
                <h3 class="card-title">urun  Bölümü Ayarları</h3>
                      
                
              </div>
                <?php
                        if(@$_GET['durum']=="basarili"){
                                 echo '<div class="alert alert-success"><h7>Yeni Üye Kaydı Başarıyla Tamamlandı</h1></div>';
                         }elseif(@$_GET['durum']=="basarisiz"){
                                 echo '<div class="alert alert-danger"><h7>İşlem Başarısız ZATEN BÖYLE BİR urun VAR</h1></div>';
                         }
                        ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                 <div class=""> <!--KATEGORİLERİ GETİR-->
                  <label>Ürün Kategorisi Seçin</label>
                  <select name="urunkategori" class="form-control select2bs4" style="width: 100%;">
                      <?php
                        $katid=$urunlercek['kategori_id'];
                        $kategori=$baglanti->prepare("SELECT *  FROM kategori order by kategori_id ASC");
                        $kategori -> execute(array(1));
                        while( $kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)){
                        
                        $kategoriid=$kategoricek['kategori_id'];
                        #database den gelen bütün kategorilerin idlerini al
                        ?>
                        <option  <?php if($katid==$kategoriid){
                                echo "Selected"; }?> value="<?php echo $kategoricek['kategori_id']?>"><?php echo $kategoricek['kategori_adi'];?></option>
                    <?php }?>
                  </select>
                </div>

                 <div class="">
                    <label for="exampleInputPassword1">urun Resim</label>
                        <img style="width:200px;" src="resim/urunler/<?php echo $urunlercek['urun_resim']?>">
                  </div>


                <div class="">
                    <label for="exampleInputPassword1">urun Resim</label>
                    <input name="urunresim"  type="file" class="form-control" >
                  </div>

                 <!-- SEÇİLEN URUNUN İDSİNİ YOLLA-->

                   <div class="">
                    <label for="exampleInputPassword1">urun Başlık</label>
                    <input  name="urunbaslik" value="<?php echo $urunlercek['urun_baslik']?>" type="text" class="form-control"  >
                  </div>
                                <input type="hidden"   name="id" value="<?php echo  $urunlercek['urun_id']  ?>"> 
                                <input type="hidden"   name="eskiresim" value="<?php echo  $urunlercek['urun_resim']  ?>"> 
                                 <input type="hidden" name="katsid" value="<?php echo  $_GET['katid']  ?>"> <!-- SEÇİLEN URUNUN İDSİNİ YOLLA-->
                <div class="">
                      <label for="exampleInputPassword1">Ürün  Detay</label>
                        <textarea name="urunaciklama" class="ckeditor" id="editor1"> <?php echo $urunlercek['urun_aciklama']?></textarea>
                         </div>
                </div>

                  <div class="">
                    <label for="exampleInputPassword1">urun Sıra</label>
                    <input name="urunsira" value="<?php echo $urunlercek['urun_sira']?>" type="text" class="form-control" >
                  </div>

                <div class="">
                    <label for="exampleInputPassword1">urun Model</label>
                    <input name="urunmodel" value="<?php echo $urunlercek['urun_model']?>" type="text" class="form-control"  >
                </div>


                <div class="">
                    <label for="exampleInputPassword1">urun renk</label>
                    <input name="urunrenk" value="<?php echo $urunlercek['urun_renk']?>" type="text" class="form-control"  >
                </div>



                  <div class="">
                    <label for="exampleInputPassword1">urun Adet</label>
                    <input name="urunadet" value="<?php echo $urunlercek['urun_adet']?>" type="text" class="form-control" >
                  </div>

                <div class="">
                    <label for="exampleInputPassword1">urun Anahtar Kelime</label>
                    <input name="anahtar" type="text" class="form-control" value="<?php echo $urunlercek['urun_etiket']?>"  >
                  </div>

                <div class="">
                    <label for="exampleInputPassword1">urun Fiyat</label>
                    <input name="urunfiyat" value="<?php echo $urunlercek['urun_fiyat']?>" type="text" class="form-control" >
                  </div>
    
                  
                    <div class="">
                  <label>urun Durum </label>
                  <select name="urundurum" class="form-control select2bs4" style="width: 100%;">
                        <option  <?php if( $urunlercek['urun_durum']=="1") {echo "selected"; }?> value="1" selected="selected">Aktif</option>
                        <option  <?php if(  $urunlercek['urun_durum']=="0") {echo "selected"; }?> value="0" >Pasif</option>
                  </select>
                </div>

        
                 <div class="">
                  <label>Öne Çıkar </label>
                  <select name="onecikan" class="form-control select2bs4" style="width: 100%;">
                    <option  <?php if( $urunlercek['onecikan']=="1") { echo "selected"; } ?> value="1" selected="selected">Öne Çıkar</option>
                     <option  <?php if( $urunlercek['onecikan']=="0") {  echo "selected"; } ?> value="0" >Çıkartma</option>
                  </select>
                </div>
                

                <div class="card-footer">
                <button name="urunduzenle" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>

            <?php
                        require_once 'footer.php';
            ?>