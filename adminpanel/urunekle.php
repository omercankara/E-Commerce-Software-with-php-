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
                        $katid=$_GET['katid'];


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
                    <input name="urunresim" type="file" class="form-control" >
                  </div>

                  <input type="hidden" name="katsid" value="<?php echo  $_GET['katid']  ?>"> <!-- SEÇİLEN URUNUN İDSİNİ YOLLA-->

                   <div class="">
                    <label for="exampleInputPassword1">urun Başlık</label>
                    <input  name="urunbaslik" type="text" class="form-control"  >
                  </div>
 
                <div class="">
                      <label for="exampleInputPassword1">Ürün  Detay</label>
                        <textarea name="urunaciklama" class="ckeditor" id="editor1"> </textarea>
                         </div>
                </div>

                  <div class="">
                    <label for="exampleInputPassword1">urun Sıra</label>
                    <input name="urunsira" type="text" class="form-control" >
                  </div>

                <div class="">
                    <label for="exampleInputPassword1">urun Model</label>
                    <input name="urunmodel" type="text" class="form-control"  >
                </div>


                <div class="">
                    <label for="exampleInputPassword1">urun renk</label>
                    <input name="urunrenk" type="text" class="form-control"  >
                </div>



                  <div class="">
                    <label for="exampleInputPassword1">urun Adet</label>
                    <input name="urunadet" type="text" class="form-control" >
                  </div>

                <div class="">
                    <label for="exampleInputPassword1">urun Anahtar Kelime</label>
                    <input name="anahtar" type="text" class="form-control" >
                  </div>

                <div class="">
                    <label for="exampleInputPassword1">urun Fiyat</label>
                    <input name="urunfiyat" type="text" class="form-control" >
                  </div>
    
                  
                    <div class="">
                  <label>urun Durum </label>
                  <select name="urundurum" class="form-control select2bs4" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                     <option value="0">Pasif</option>
                  </select>
                </div>

        
                 <div class="">
                  <label>Öne Çıkar </label>
                  <select name="onecikan" class="form-control select2bs4" style="width: 100%;">
                    <option value="1" selected="selected">Öne Çıkar</option>
                     <option value="0" >Çıkartma</option>
                  </select>
                </div>
                

                <div class="card-footer">
                <button name="urunkaydet" type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>

            <?php
                        require_once 'footer.php';
            ?>