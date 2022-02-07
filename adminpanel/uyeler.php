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
                <a href="uyeekle.php"<button type="submit" class="btn btn-success float-right">Yeni Kullanıcı Ekle</button></a>
                  <thead>
                    <tr>
                                <th>Kullanıcı İd</th>
                                <th>User Name</th>
                                <th>Kayıt Tarihi</th>
                                <th>Kullanıcı İsim</th>  
                                <th>Kullanıcı İl</th>  
                                <th>Kullanıcı İlce</th>  
                                <th>Kullanıcı Adres</th> 
                                <th>Kullanıcı Tel</th>   
                                <th>Kullanıcı Yetki</th>
                                <th>Sil</th>   
                                <th>Düzenle</th>  
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                        $kullanici=$baglanti->prepare("SELECT *  FROM kullanici order by kullanici_id ASC");
                        $kullanici -> execute(array(1));
                        while( $kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td><?php echo $kullanicicek['kullanici_id']?></td>
                        <td><?php echo $kullanicicek['kullanici_adi']?></td> 
                        <td><?php echo $kullanicicek['kullanici_zaman']?></td>
                        <td><?php echo $kullanicicek['kullanici_adsoyad']?></td>
                        <td><?php echo $kullanicicek['kullanici_il']?></td>
                        <td><?php echo $kullanicicek['kullanici_ilce']?></td>
                        <td><?php echo $kullanicicek['kullanici_adres']?></td>
                        <td><?php echo $kullanicicek['kullanici_tel']?></td>
                        
                        <td>
                        <span class="tag tag-success">
                                <?php
                                        if( $kullanicicek['kullanici_yetki']=="2"){
                                                echo '<span class="bg-success">ADMİNİSTRATOR</span>';
                                        }else{
                                                echo 'Normal Kullanıcı';
                                        }
                                
                                ?>
                        </span></td>
                       <td><a href="islem/islem.php?kullanicisil&id=<?php echo$kullanicicek['kullanici_id']?>"><button type="submit" class="btn btn-danger">Sil</button></a>
                        <td><button type="submit" class="btn btn-success">Düzenle</button>
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