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
           
                  <thead>
                    <tr>
                                <th>Yorum Zamanı</th>
                                <th>Yorum Detay</th>
                                <th>Ürün İd</th>
                                <th>Kullanici İd</th>  
                                <th>Onayla </th>
                                <th>Sil</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                        $yorumlar=$baglanti->prepare("SELECT *  FROM yorumlar order by yorum_id DESC");
                        $yorumlar-> execute(array(1));
                        while( $yorumlarcek=$yorumlar->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td><?php echo $yorumlarcek['yorum_zaman']?></td>
                        <td><?php echo $yorumlarcek['yorum_detay']?></td>
                        <td><?php echo $yorumlarcek['urun_id']?></td> 
                        <td><?php echo $yorumlarcek['kullanici_id']?></td>
                        <form action="islem/islem.php" method="POST">
                                <td><button    <?php if($yorumlarcek['yorum_onay']=="1"){echo "disabled";}?>   name="yorumonayla" type="submit" class="btn btn-success"> Onayla   </button></td>
                                <input type="hidden" name="yorum_id" value="<?php echo $yorumlarcek['yorum_id']?>">
                            
                        </form>
                            <td><a href="islem/islem.php?yorumsil&id=<?php echo $yorumlarcek['yorum_id']?>"><button type="submit" class="btn btn-danger">Sil</button></a>
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