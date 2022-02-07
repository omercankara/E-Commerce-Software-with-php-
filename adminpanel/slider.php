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
                <a href="sliderekle.php"><button type="submit" class="btn btn-success float-right">Yeni slider Ekle</button></a>
                  <thead>
                    <tr>
                                
                                <th>Slider Baslik</th>
                                <th>Slider Resim</th> 
                                <th>Slider Aciklama</th>
                                <th>Slider Link</th>
                                <th>Slider Button</th>  
                                <th>Slider Sira</th>  
                                <th>Slider Tipi</th>  
                                <th>Slider Durum</th>   
                                <th>Sil</th>   
                                <th>Duzenle</th>   
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                        $slider=$baglanti->prepare("SELECT *  FROM slider order by slider_id ASC");
                        $slider -> execute(array(1));
                        while( $slidercek=$slider->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                                
                                <td><?php echo $slidercek['slider_baslik']?></td> 
                                <td><img style="width:150px;" src="resim/slider/<?php echo $slidercek['slider_resim']?>"></td>
                                <td><?php echo $slidercek['slider_aciklama']?></td>
                                <td><?php echo $slidercek['slider_link']?></td>
                                <td><?php echo $slidercek['slider_button']?></td>
                                <td><?php echo $slidercek['slider_sira']?></td>
                               
                                        <td>
                                  <span class="tag tag-success">
                                     <?php
                                              if( $slidercek['slider_banner']=="1"){
                                                    echo '<span class="bg-success">Bu Bir Slider</span>';
                                             }else{
                                                    echo '<span class="bg-danger">Bu Bir Banner</span>';
                                            }
                                
                                 ?>
                                </span>
                         </td>

                                

                          <td>
                                  <span class="tag tag-success">
                                     <?php
                                              if( $slidercek['slider_durum']=="1"){
                                                    echo '<span class="bg-success">Aktif</span>';
                                             }else{
                                                    echo '<span class="bg-danger">Pasif</span>';
                                            }
                                ?>
                                </span>
                         </td>

                  

                         
                         


                        <form action="islem/islem.php" method="post">
                        <!-- <td><a href="islem/islem.php?slidersil&id=<?php echo$slidercek['slider_id']?>><button type="submit" class="btn btn-danger">Sil</button></a> !-->
                        <td><button name="slidersil" class="btn btn-danger">Sil</button></td>
                                <input type="hidden" name="id" value="<?php echo $slidercek['slider_id']?>">
                                <input type="hidden" name="resim" value="<?php echo $slidercek['slider_resim']?>">
                        </form>
                        <td><a href="sliderduzenle?&id=<?php echo$slidercek['slider_id']?>"><button type="submit" class="btn btn-danger"> Düzenle</button></a>
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