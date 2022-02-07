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

                        <form action="resimyukle.php" class="dropzone" method="post" enctype="multipart/form-data"> 
                                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                        </form> 
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
                <a href="sliderekle.php"><button type="submit" class="btn btn-success float-right">Yeni slider Ekle</button></a>
                  <thead>
                    <tr>
                                <th>Slider Resim</th>
                                <th>Sil</th>   
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                        $cokluresim=$baglanti->prepare("SELECT *  FROM cokluresim where urun_id=:urun_id order by id ASC");
                        $cokluresim -> execute(array(
                                'urun_id'=>$_GET['id']
                        ));
                        while( $cokluresimcek=$cokluresim->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                                <td><img style="width:150px;" src="resim/cokluresim/<?php echo $cokluresimcek['resim']?>"></td>
                        <form action="islem/islem.php" method="POST">
                                <input type="hidden" name="urunid" value="<?php echo $_GET['id']?>">
                                 <input type="hidden" name="normalid" value="<?php echo $cokluresimcek['id']?>">
                                <input type="hidden" name="resim" value="<?php echo $cokluresimcek['resim']?>">
                                <td>     <button name="cokluresimsil" type="submit" class="btn btn-danger">Sil</button>     </td>
                        </form>
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