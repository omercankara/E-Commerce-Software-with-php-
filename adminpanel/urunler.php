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
                <a href="urunekle.php?katid=<?php echo $_GET['katid']?>"><button type="submit" class="btn btn-success float-right">Yeni Urunler Ekle</button></a>
                  <thead>
                    <tr>
                                <th>Urun Resim</th> 
                                <th>Urun Baslik</th>
                                <th>Urun Model</th>
                                <th>Urun Rengi</th>  
                                <th>Urun Adet</th>
                                <th>Urun Aciklama</th>
                                <th>Urun Durumu</th>   
                                <th>Urun Sira</th>
                                <th>Sil</th>   
                                <th>Duzenle</th>   
                                <th>Detay İşlem</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                        $urunler=$baglanti->prepare("SELECT *  FROM urunler  where kategori_id=:kategori_id order by urun_id ASC"); //nereden gelsin ? kategori_id den gelsin bi nevi filtre
                        $urunler -> execute(array(
                                'kategori_id'=>$_GET['katid']  
                        ));
                        while( $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                                <td><img style="width:150px;" src="resim/Urunler/<?php echo $urunlercek['urun_resim']?>"></td>
                                <td><?php echo $urunlercek['urun_baslik']?></td> 
                                <td><?php echo $urunlercek['urun_model']?></td>
                                <td><?php echo $urunlercek['urun_renk']?></td>
                                <td><?php echo $urunlercek['urun_adet']?></td>
                                <td><?php echo $urunlercek['urun_aciklama']?></td>
                                <td><?php echo $urunlercek['urun_durum']?></td>                           
                                <td><?php echo $urunlercek['urun_sira']?></td>
                                
                               
                                <td><a href="urunduzenle?&id=<?php echo $urunlercek['urun_id'] ?>&katid=<?php echo $urunlercek['kategori_id']?>"><button type="submit" class="btn btn-danger"> Düzenle</button></a>

                        <form action="islem/islem.php" method="post">
                        <td><button name="urunsil" class="btn btn-danger">Sil</button></td>
                                <input type="hidden" name="id" value="<?php echo $urunlercek['urun_id']?>">
                                <input type="hidden" name="resim" value="<?php echo $urunlercek['urun_id']?>">
                                <input type="hidden" name="katsid" value="<?php echo $_GET['katid']?>">
                        </form> 
                          <td><a href="cokluresim?id=<?php echo $urunlercek['urun_id']?>"><button class="btn btn-info">Çoklu Resim</button></a></td>
                     
                        
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