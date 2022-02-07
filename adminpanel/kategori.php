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
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                <a href="kategoriekle.php"><button type="submit" class="btn btn-success float-right">Yeni Kategori Ekle</button></a>
                  <thead>
                    <tr>
                                <th>Kategori İd</th>
                                <th>Kategori Adı</th>
                                <th>Kategori Sırası</th>
                                <th>Kategori Durum</th>  
                                <th>Sil</th>   
                                <th>Duzenle</th>   
                                <th>İlgili Ürünleri Gör</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                        $kategori=$baglanti->prepare("SELECT *  FROM kategori order by kategori_id ASC");
                        $kategori -> execute(array(1));
                        while( $kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td><?php echo $kategoricek['kategori_id']?></td>
                        <td><?php echo $kategoricek['kategori_adi']?></td> 
                        <td><?php echo $kategoricek['kategori_sira']?></td>
                        
                       <td>
                        <span class="tag tag-success">
                        
                                <?php
                                        if( $kategoricek['kategori_durum']=="1"){
                                                echo '<span class="bg-success">Aktif</span>';
                                        }else{
                                                 echo '<span class="bg-danger">Pasif</span>';
                                        }
                                
                                ?>
                        
                        </span></td>
                         <td><a href="islem/islem.php?kategorisil&id=<?php echo$kategoricek['kategori_id']?>"><button type="submit" class="btn btn-danger">Sil</button></a>
                        <td><a href="kategoriduzenle?&id=<?php echo$kategoricek['kategori_id']?>"><button type="submit" class="btn btn-danger"> Düzenle</button></a>
                        
                       <td><a href="urunler?katid=<?php echo $kategoricek['kategori_id']?>"><button class="btn btn-success">GİT</button></a>  </td>
                     
                        
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