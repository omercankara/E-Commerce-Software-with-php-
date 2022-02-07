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

   <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>
    <?php
                        if(@$_GET['yuklenme']=="basarili"){
                                 echo '<div class="alert alert-success"><h7>İşlem Başarılı</h1></div>';
                         }elseif(@$_GET['yuklenme']=="basarisiz"){
                                 echo '<div class="alert alert-danger"><h7>İşlem Başarısız</h1></div>';
                         }
                        ?>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 1090px;" >
                <table class="table table-head-fixed text-nowrap">
             
                  <thead>
                    <tr>
                                
                                <th>Kullanici İd</th>
                                <th>Ürün İd</th> 
                                <th>Sipariş Zamanı</th>
                                <th>Ürün Adet</th>
                                <th>Ürün Fiyatı</th>  
                                <th>Toplam Fiyat</th>  
                                <th>Ödeme Türü</th>  
                                <th>Sipariş Notu</th>
                                <th>Yeni Adet Sayısı</th>
                                <th>Sipariş Onayla</th>   
                                <th>Reddet</th>   
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                        $siparis=$baglanti->prepare("SELECT *  FROM siparisler order by siparis_id DESC");
                        $siparis -> execute(array(1));
                        while( $sipariscek=$siparis->fetch(PDO::FETCH_ASSOC)){?>

        <tr>           
<td><?php echo $sipariscek['kullanici_id']?></td> 
<td><?php echo $sipariscek['urun_id']?></td>
<td><?php echo $sipariscek['siparis_zaman']?></td>
<td><?php echo $sipariscek['urun_adet']?></td>
<td><?php echo $sipariscek['urun_fiyat']?></td>
<td><?php echo $sipariscek['toplam_fiyat']?></td> 
<td><span class="tag tag-success"><?php if( $sipariscek['odeme_turu']=="2"){   echo '<span class="bg-success">Kapıda Ödeme </span>';} else {echo '<span class="bg-danger">Kart İle Ödeme</span>';    }   ?>
</span> 
</td>
<td><?php echo $sipariscek['siparis_not']?></td>
<td><?php echo $sipariscek['siparis_yeniadet']?></td>
<?php if ($sipariscek['siparis_onay']=="2") { ?>
<td><a href="islem/islem.php?siparisonayla&id=<?php echo $sipariscek['siparis_id']?>"><button type="submit" class="btn btn-danger"> Onayla</button></a></td>
<td><a href="islem/islem.php?siparisreddet&id=<?php echo $sipariscek['siparis_id']?>"><button type="submit" name="siparissil" class="btn btn-danger"> Reddet</button></a></td>
<?php   } ?>
        </tr>
 <?php } ?>
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>




</div>

</div>
</div>
</div>