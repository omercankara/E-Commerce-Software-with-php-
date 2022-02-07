
<?php
        session_start();
       require_once 'baglan.php';
       echo "<br>";
       echo "<hr>";
?>

<?php
        if(isset($_POST['ayarkaydet'])){
                $duzenle = $baglanti->prepare("UPDATE ayarlar SET 
                
                baslik=:baslik, 
                aciklama=:aciklama,
                anahtarkelime=:anahtarkelime

                WHERE id=1
               ");

                $update=$duzenle->execute(array(
                        'baslik'=>$_POST['baslik'],
                        'aciklama'=>$_POST['aciklama'],
                        'anahtarkelime'=>$_POST['anahtarkelime']
                ));

                if($update){
                     header("Location:../ayarlar.php?yuklenme=basarili");
                        
                
                }else{
                         header("Location:../ayarlar.php?yuklenme=basarisiz");
                }

        }


        if(isset($_POST['iletisimkaydet'])){
                $duzenle = $baglanti->prepare("UPDATE ayarlar SET 
                
                telefon=:telefon, 
                adres=:adres,
                email=:email,
                mesai=:mesai

                WHERE id=1
               ");

                $update=$duzenle->execute(array(
                        'telefon'=>$_POST['telefon'],
                        'adres'=>$_POST['adres'],
                        'email'=>$_POST['email'],
                        'mesai'=>$_POST['mesai']
                       
                ));

                if($update){
                     header("Location:../iletisim.php?yuklenme=basarili");
                        
                
                }else{
                         header("Location:../iletisim.php?yuklenme=basarisiz");
                 }

        
        }

        if(isset($_POST['socialkaydet'])){
                $duzenle = $baglanti->prepare("UPDATE ayarlar  SET 
                
                facebook=:facebook,
                instagram=:instagram,
                twitter=:twitter,
                youtube=:youtube
                WHERE id=1
                ");

                $update=$duzenle->execute(array(
                
                        'facebook'=>$_POST['facebook'],
                        'instagram'=>$_POST['instagram'],
                        'twitter'=>$_POST['twitter'],
                        'youtube'=>$_POST['youtube']
                ));

                if($update){
                         header("Location:../social.php?yuklenme=basarili");
                }else{
                          header("Location:../social.php?yuklenme=basarisiz");
                }
        }

/* 
if($_POST){
 
    if ($_FILES["logo"]["size"]>0){//Dosya boyutu  aldık ve 1Mb'tan az olmasını söyledik.
 
        if ($_FILES["logo"]["type"]=="image/jpeg"){  //Dosya tipi aldık ve sadece jpeg olmasını söyledik.
 
         
            $dosya_adi   =    $_FILES["logo"]["name"];  //Dsoya adını aldık.
 
            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret=array("cv","fg","th","lu","er");
            $uzanti=substr($dosya_adi,-4,4);
            $sayi_tut=rand(1,10000);
 
            $yeni_ad="../resim/logo/".$uret[rand(0,4)].$sayi_tut.$uzanti;
 
            //Dosya yeni adıyla yuklenenresimler klasörüne kaydedilecek
 
            if (move_uploaded_file($_FILES["logo"]["tmp_name"],$yeni_ad)){
                echo 'Dosya başarıyla yüklendi.';
 
                //Bilgileri veritabanına kayıt ediyoruz..
 
            $sorgu = $baglanti->prepare("UPDATE ayarlar SET logo=:logo");
            $sorgu->execute(array(':logo'=> $yeni_ad));
            if($sorgu){
                echo 'Veritabanına kaydedildi.';
                $resimsil = $_POST['eskilogo'];
                unlink("../resim/$resimsil");
                  header("Location:../ayarlar.php?yuklenme=basarili");
            }else{
                echo 'Kayıt sırasında bir sorun oluştu!';
            }
        }else{
            echo 'Dosya Yüklenemedi!';
        }
    }else{
        echo 'Dosya yalnızca jpeg formatında olabilir!';
    }
    }else{          
        echo 'Dosya boyutu 1 Mb ı geçmemeli!';
    }
}
*/



if(isset($_POST['hakkimizdakaydet'])){  

        if($_FILES["hakkimizdaresim"]  ["size"]>0){
             $uploads_dir='../resim/hakkimizda';
             @$tmp_name=$_FILES['hakkimizdaresim'] ["tmp_name"];
             @$name=$_FILES['hakkimizdaresim'] ["name"];

             $sayi = rand(1,1000000);
             $sayi2 = rand(1,100000);
             $sayi3=rand(10000,2000000);

             $sayilar=$sayi.$sayi2.$sayi3;
             $resimyolu=$sayilar.$name;
             @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
             
             $duzenle=$baglanti->prepare("UPDATE hakkimizda SET

                                hakkimizdabaslik=:hakkimizdabaslik,
                                hakkimizdadetay=:hakkimizdadetay,
                                hakkimizdavizyon=:hakkimizdavizyon,
                                hakkimizdamisyon=:hakkimizdamisyon,
                                hakkimizdaresim=:hakkimizdaresim
                                WHERE id=1
                ");

        $update=$duzenle->execute(array(
                'hakkimizdabaslik'=>$_POST['hakkimizdabaslik'],
                'hakkimizdadetay'=>$_POST['hakkimizdadetay'],
                'hakkimizdavizyon'=>$_POST['hakkimizdavizyon'],
                'hakkimizdamisyon'=>$_POST['hakkimizdamisyon'],
                'hakkimizdaresim'=>$resimyolu
        ));
                if($update){
                                $resimsil=$_POST['eskihakkimizdaresim'];
                                unlink("../resim/hakkimizda/$resimsil");
                                header("Location:../hakkimizda.php");
                }else{
                      
                }

        }
}
 ###############################################################
//ADMİN PANEL GİRİS YAPMA  KULLANICI ADI SIFRE YAPISI

if(isset($_POST['girisyap'])){
        $kadi=htmlspecialchars($_POST['kadi']);
        $pass=htmlspecialchars($_POST['sifre']);
        $guclusifre=md5($pass);
        
        

        $kullanicisor=$baglanti->prepare("SELECT * from kullanici WHERE kullanici_adi=:kullanici_adi  and kullanici_sifre=:kullanici_sifre and kullanici_yetki=:kullanici_yetki");
        $kullanicisor->execute(array(
                'kullanici_adi' =>$kadi,
                'kullanici_sifre'=>$guclusifre,
                'kullanici_yetki'=>2
        
        ));

        $var=$kullanicisor->rowCount(); // kodları saydırmaya yarar varsa 1 yoksa  0 yazar
        if($var >0){
                echo $_SESSION['girisbelgesi']=$kadi; //Session tut panele izinsiz giris yapmayı engellicez
                header("Location:../index.php?durum=hosgeldin");
        }else{
                header("Location:../login.php?durum=hata");
        }
}



if(isset($_POST['uyekaydet'])){
        $kadi=htmlspecialchars($_POST['kadi']);
        $pass=htmlspecialchars($_POST['sifre']);
        $adsoyad=htmlspecialchars($_POST['adsoyad']);
        $guclusifre=md5($pass);

        $kullanicisor=$baglanti->prepare("SELECT * from kullanici WHERE kullanici_adi=:kullanici_adi");
        $kullanicisor->execute(array(
                'kullanici_adi'=>$kadi,
        ));

        $var=$kullanicisor->rowCount(); // kodları saydırmaya yarar varsa 1 yoksa  0 yazar
        if($var >0){
                 header("Location:../uyeekle.php?durum=basarisiz");
        }else{
            
                //RESİM EKLEME 
             $uploads_dir='../resim/kullanici';
             @$tmp_name=$_FILES['kullaniciresim'] ["tmp_name"];
             @$name=$_FILES['kullaniciresim']["name"];

             $sayi = rand(1,1000000);
             $sayi2 = rand(1,100000);
             $sayi3=rand(10000,2000000);

             $sayilar=$sayi.$sayi2.$sayi3;
             $resimyolu=$sayilar.$name;
             @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

        $kullanicikaydet=$baglanti->prepare("INSERT INTO kullanici SET
                 kullanici_adi=:kullanici_adi,
                 kullanici_sifre=:kullanici_sifre,
                 kullanici_adsoyad=:kullanici_adsoyad,
                 kullanici_yetki=:kullanici_yetki,
                 kullanici_resim=:kullanici_resim
               
        ");

        $insert=$kullanicikaydet->execute(array(
                'kullanici_resim'=>$resimyolu,
                'kullanici_adi'=>$kadi,
                'kullanici_sifre'=> $guclusifre,
                'kullanici_adsoyad'=>$adsoyad,
                'kullanici_yetki'=>2
              
        ));
                if ($insert) {
                        header("Location:../uyeekle.php?durum=basarili");
                }else{
                           echo "Başarısız";
                }       
}

 }



if(isset($_GET['kullanicisil'])){
        $kullanicisil=$baglanti->prepare("DELETE  from kullanici WHERE kullanici_id=:kullanici_id");
        $kullanicisil->execute(array(
                'kullanici_id'=>$_GET['id']
        ));
        if($kullanicisil){
                header("Location:../uyeler.php");
        }else{
                echo "Başarısız İşlem";
        }
}

 ###############################################################

if(isset($_POST['kategorikaydet'])){
        $kategorikaydet=$baglanti->prepare("INSERT INTO kategori SET
        
        kategori_adi=:kategori_adi,
        kategori_sira=:kategori_sira,
        kategori_durum=:kategori_durum

         ");

         $insert=$kategorikaydet->execute(array(
                'kategori_adi'=>$_POST['kategoriadi'],
                'kategori_sira'=>$_POST['kategorisira'],
                'kategori_durum'=>$_POST['kategoridurum']
               
         ));
         if($insert){
                header("Location:../kategori.php?yuklenme=basarili");
         }else{
                 header("Location:../kategori.php?yuklenme=basarisiz");
         }
}

if(isset($_POST['kategoriduzenle'])){
                
                $kat=$_POST['katid']; 
                $duzenle = $baglanti->prepare("UPDATE  kategori SET 
                  kategori_adi=:kategori_adi,
                  kategori_sira=:kategori_sira,
                  kategori_durum=:kategori_durum
               
                WHERE kategori_id=$kat
               ");
              

                $kategoribas=$duzenle->execute(array(
                        'kategori_adi'=>$_POST['kategoriadi'],
                        'kategori_sira'=>$_POST['kategorisira'],
                        'kategori_durum'=>$_POST['kategori_durum']
                       
                ));

                if($kategoribas){
                     header("Location:../kategori.php?yuklenme=basarili");
                
                }else{
                         header("Location:../kategori.php?yuklenme=basarisiz");
                }

        }


if(isset($_GET['kategorisil'])){
        $kategorisil=$baglanti->prepare("DELETE  from kategori WHERE kategori_id=:kategori_id");
        $kategorisil->execute(array(
                'kategori_id'=>$_GET['id']
        ));
        if($kategorisil){
                       
                header("Location:../kategori.php");
        }else{
                header("Location:../kategori.php");
        }
}


 ###############################################################
if(isset($_POST['slidersil'])){
        $slidersil=$baglanti->prepare("DELETE  from slider WHERE slider_id=:slider_id");
        $slidersil->execute(array(
                'slider_id'=>$_POST['id']
        ));
        if($slidersil){
                        $resimsil = $_POST['resim'];
                        unlink("../resim/slider/$resimsil");
                header("Location:../slider");
        }else{
                header("Location:../slider");
        }
}


if(isset($_POST['sliderkaydet'])){

              $uploads_dir='../resim/slider';
             @$tmp_name=$_FILES['sliderresim'] ["tmp_name"];
             @$name=$_FILES['sliderresim'] ["name"];

             $sayi = rand(1,1000000);
             $sayi2 = rand(1,100000);
             $sayi3=rand(10000,2000000);

             $sayilar=$sayi.$sayi2.$sayi3;
             $resimyolu=$sayilar.$name;
             @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

        $sliderkaydet=$baglanti->prepare("INSERT INTO slider SET
        
        slider_baslik=:slider_baslik,
        slider_aciklama=:slider_aciklama,
        slider_link=:slider_link,
        slider_button=:slider_button,
        slider_resim=:slider_resim,
        slider_sira=:slider_sira,
        slider_durum=:slider_durum,
        slider_banner=:slider_banner
         ");

         $insert=$sliderkaydet->execute(array(
               
               'slider_baslik'=>$_POST['sliderbaslik'],
               'slider_aciklama'=>$_POST['slideraciklama'],
               'slider_link'=>$_POST['sliderlink'],
               'slider_button'=>$_POST['sliderbutton'],
               'slider_sira'=>$_POST['slidersira'],
               'slider_durum'=>$_POST['sliderdurum'],
               'slider_banner'=>$_POST['sliderbanner'],
               'slider_resim'=>$resimyolu
              
               
         ));
         if($insert){
                        $resimsil = $_POST['eskiresim'];
                        unlink("../resim/slider/$resimsil");
                header("Location:../slider.php?yuklenme=basarili");
         }else{
                 header("Location:../slider.php?yuklenme=basarisiz");
         }
}


if(isset($_POST['sliderduzenle'])){
                  $slideid=$_POST['id']; 
                  if($_FILES['sliderresim']['size']>0){
                  
              
                $uploads_dir='../resim/slider';
                @$tmp_name=$_FILES['sliderresim'] ["tmp_name"];
                @$name=$_FILES['sliderresim'] ["name"];

                 $sayi = rand(1,1000000);
                 $sayi2 = rand(1,100000);
                 $sayi3=rand(10000,2000000);

                $sayilar=$sayi.$sayi2.$sayi3;
                $resimyolu=$sayilar.$name;
                @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
                
             
                $duzenle = $baglanti->prepare("UPDATE  slider SET 
                slider_baslik=:slider_baslik,
                slider_aciklama=:slider_aciklama,
                slider_sira=:slider_sira,
                slider_link=:slider_link,
                slider_button=:slider_button,
                slider_durum=:slider_durum,
                slider_resim=:slider_resim,
                slider_banner=:slider_banner
               
                WHERE slider_id=$slideid
               ");
              

                $sliderbas=$duzenle->execute(array(
                        
                'slider_baslik'=>$_POST['sliderbaslik'],
                'slider_aciklama'=>$_POST['slideraciklama'],
                'slider_link'=>$_POST['sliderlink'],
                'slider_button'=>$_POST['sliderbutton'],
                'slider_sira'=>$_POST['slidersira'],
                'slider_durum'=>$_POST['sliderdurum'],
                'slider_banner'=>$_POST['sliderbanner'],
                'slider_resim'=>$resimyolu
                ));

                if($sliderbas){
                        $resimsil = $_POST['eskiresim'];
                        unlink("../resim/slider/$resimsil");
                     header("Location:../slider.php?yuklenme=basarili");
                
                }else{
                         header("Location:../slider.php?yuklenme=basarisiz");
                }
   }else{ //RESİM YOKSA SADECE BİLGİLERİ EKLE RESİM VARSA YUKARIDAKİ RESİM KODLARIYLA BERABER BAS
          $duzenle = $baglanti->prepare("UPDATE  slider SET 
                slider_baslik=:slider_baslik,
                slider_aciklama=:slider_aciklama,
                slider_sira=:slider_sira,
                slider_link=:slider_link,
                slider_button=:slider_button,
                slider_durum=:slider_durum,
                slider_banner=:slider_banner
                WHERE slider_id=$slideid
                ");
              

                $sliderbas=$duzenle->execute(array(
                        
                'slider_baslik'=>$_POST['sliderbaslik'],
                'slider_aciklama'=>$_POST['slideraciklama'],
                'slider_link'=>$_POST['sliderlink'],
                'slider_button'=>$_POST['sliderbutton'],
                'slider_sira'=>$_POST['slidersira'],
                'slider_durum'=>$_POST['sliderdurum'],
                'slider_banner'=>$_POST['sliderbanner'],
              
                ));

                if($sliderbas){
                       
                        header("Location:../slider.php?yuklenme=basarili");
                }else{
                         header("Location:../slider.php?yuklenme=basarisiz");
                }
   }
}
 ###############################################################




if(isset($_POST['urunsil'])){
$yonlendir = $_POST['katsid'];
        $urunsil=$baglanti->prepare("DELETE  from urunler WHERE urun_id=:urun_id");
        $urunsil->execute(array(
                'urun_id'=>$_POST['id']
        ));
        if($urunsil){
                        $resimsil = $_POST['resim'];
                        unlink("../resim/urunler/$resimsil");
           header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarili");
        }else{
               header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarisiz");
        }
}




if(isset($_POST['urunkaydet'])){
          $yonlendir=$_POST['katsid'];
              $uploads_dir='../resim/urunler';
             @$tmp_name=$_FILES['urunresim'] ["tmp_name"];
             @$name=$_FILES['urunresim'] ["name"];

             $sayi = rand(1,1000000);
             $sayi2 = rand(1,100000);
             $sayi3=rand(10000,2000000);

             $sayilar=$sayi.$sayi2.$sayi3;
             $resimyolu=$sayilar.$name;
             @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
                $urunkaydet=$baglanti->prepare("INSERT INTO urunler SET
        

 
     
        
#soldaki veri veritabanındaki veridir sağdaki veri ise bizim degişken adımızdır execute kısmında sağdaki degişken ile ulaşıyoz sola
        kategori_id=:kategori_id,
        urun_resim=:urun_resim,
        urun_baslik=:urun_baslik,
        urun_aciklama=:urun_aciklama,
        urun_sira=:urun_sira,
        urun_model=:urun_model,
        urun_renk=:urun_renk,
        urun_adet=:urun_adet,
        urun_durum=:urun_durum,
        urun_etiket=:urun_etiket,
        onecikan=:onecikan,
        urun_fiyat=:urun_fiyat
       
         ");

         $insert=$urunkaydet->execute(array(
               'urun_resim'=>$resimyolu,
               'kategori_id'=>$_POST['urunkategori'],
               'urun_baslik'=>$_POST['urunbaslik'],
               'urun_aciklama'=>$_POST['urunaciklama'],
               'urun_sira'=>$_POST['urunsira'],
               'urun_model'=>$_POST['urunmodel'],
               'urun_renk'=>$_POST['urunrenk'],
               'urun_adet'=>$_POST['urunadet'],
               'urun_etiket'=>$_POST['anahtar'],
               'urun_durum'=>$_POST['urundurum'],
               'urun_fiyat'=>$_POST['urunfiyat'],
               'onecikan'=>$_POST['onecikan']
              
               
         ));
         if($insert){
                        header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarili");
         }else{
                        header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarisiz");
         }
}



if(isset($_POST['urunduzenle'])){
                $yonlendir=$_POST['katsid'];
                  $urunid=$_POST['id']; 
                  if($_FILES['urunresim']['size']>0){
                  
              
                $uploads_dir='../resim/urunler';
                @$tmp_name=$_FILES['urunresim'] ["tmp_name"];
                @$name=$_FILES['urunresim'] ["name"];

                 $sayi = rand(1,1000000);
                 $sayi2 = rand(1,100000);
                 $sayi3=rand(10000,2000000);

                $sayilar=$sayi.$sayi2.$sayi3;
                $resimyolu=$sayilar.$name;
                @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
                
             
                $duzenle = $baglanti->prepare("UPDATE  urunler SET 
                                 kategori_id=:kategori_id,                         
                                urun_baslik=:urun_baslik,
                                 urun_aciklama=:urun_aciklama,
                                 urun_sira=:urun_sira,
                                urun_model=:urun_model,
                                urun_renk=:urun_renk,
                                urun_adet=:urun_adet,
                                urun_durum=:urun_durum,
                                urun_etiket=:urun_etiket,
                                onecikan=:onecikan,
                                urun_fiyat=:urun_fiyat
                WHERE urun_id=$urunid
               ");
              

                $urunduzenle=$duzenle->execute(array(
              
                'kategori_id'=>$_POST['urunkategori'],
                  'urun_baslik'=>$_POST['urunbaslik'],
                 'urun_aciklama'=>$_POST['urunaciklama'],
                'urun_sira'=>$_POST['urunsira'],
                'urun_model'=>$_POST['urunmodel'],
                  'urun_renk'=>$_POST['urunrenk'],
                 'urun_adet'=>$_POST['urunadet'],
                'urun_etiket'=>$_POST['anahtar'],
                 'urun_durum'=>$_POST['urundurum'],
                 'urun_fiyat'=>$_POST['urunfiyat'],
                  'onecikan'=>$_POST['onecikan']
                ));

                if($urunduzenle){
                        $resimsil = $_POST['eskiresim'];
                        unlink("../resim/urunler/$resimsil");
                           header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarili");
                
                }else{
                         header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarisiz");
                }
   }else{ //RESİM YOKSA SADECE BİLGİLERİ EKLE RESİM VARSA YUKARIDAKİ RESİM KODLARIYLA BERABER BAS
          $duzenle = $baglanti->prepare("UPDATE  urunler SET 
                                
                                kategori_id=:kategori_id,
                                urun_baslik=:urun_baslik,
                                urun_aciklama=:urun_aciklama,
                                urun_sira=:urun_sira,
                                urun_model=:urun_model,
                                urun_renk=:urun_renk,
                                urun_adet=:urun_adet,
                                urun_durum=:urun_durum,
                                urun_etiket=:urun_etiket,
                                onecikan=:onecikan,
                                urun_fiyat=:urun_fiyat
                                WHERE urun_id=$urunid
                ");
              

                $urunduzenle=$duzenle->execute(array(
                        
              
               'kategori_id'=>$_POST['urunkategori'],
               'urun_baslik'=>$_POST['urunbaslik'],
               'urun_aciklama'=>$_POST['urunaciklama'],
               'urun_sira'=>$_POST['urunsira'],
               'urun_model'=>$_POST['urunmodel'],
               'urun_renk'=>$_POST['urunrenk'],
               'urun_adet'=>$_POST['urunadet'],
               'urun_etiket'=>$_POST['anahtar'],
               'urun_durum'=>$_POST['urundurum'],
               'urun_fiyat'=>$_POST['urunfiyat'],
               'onecikan'=>$_POST['onecikan']
              
                ));

                if($urunduzenle){
                      header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarili");
                }else{
                       header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarisiz");
                }
   }


}


        if(isset($_POST['cokluresimsil'])){
        $yonlendir = $_POST['urunid'];
        $cokluresimsil=$baglanti->prepare("DELETE  from  cokluresim WHERE id=:id");
        $cokluresimsil->execute(array(
                  'id'=>$_POST['normalid']
        ));
        if($cokluresimsil){
                $resimsil=$_POST['resim'];
                unlink("../resim/cokluresim/$resimsil");
                header("Location:../cokluresim.php?id=$yonlendir&yuklenme=basarili");
        }else{
            header("Location:../cokluresim.php?id=$yonlendir&yuklenme=basarisiz");
        }
}





        if(isset($_POST['yorumonayla'])){
                $yorum_id=$_POST['yorum_id'];
                $duzenle = $baglanti->prepare("UPDATE yorumlar SET 
                
                yorum_onay=:yorum_onay

                WHERE yorum_id=$yorum_id
               ");

                $update=$duzenle->execute(array(
                       'yorum_onay'=>1
                ));

                if($update){
                     header("Location:../yorumlar.php?yuklenme=basarili");
                                        
                }else{
                         header("Location:../yorumlar.php?yuklenme=basarisiz");
                }

        }



if(isset($_GET['yorumsil'])){
        $yorumsil=$baglanti->prepare("DELETE  from yorumlar WHERE yorum_id=:yorum_id");
        $yorumsil->execute(array(
                'yorum_id'=>$_GET['id']
        ));
        if($yorumsil){
                header("Location:../yorumlar.php?yuklenme=basarili");
        }else{
                  header("Location:../yorumlar.php?yuklenme=basarili");
        }
}


    if(isset($_GET['siparisonayla'])){
                $siparisid=$_GET['id'];
                $duzenle = $baglanti->prepare("UPDATE siparisler SET 
                
                siparis_onay=:siparis_onay

                WHERE siparis_id=$siparisid
               ");

                $update=$duzenle->execute(array(
                       'siparis_onay'=>1
                ));

                if($update){
                     header("Location:../siparisler.php?yuklenme=basarili");
                                        
                }else{
                         header("Location:../siparisler.php?yuklenme=basarisiz");
                }

        }


    if(isset($_GET['siparisreddet'])){
                $siparisid=$_GET['id'];
                $duzenle = $baglanti->prepare("UPDATE siparisler SET 
                
                siparis_onay=:siparis_onay

                WHERE siparis_id=$siparisid
               ");

                $update=$duzenle->execute(array(
                       'siparis_onay'=>2
                ));

                if($update){
                     header("Location:../siparisler.php?yuklenme=basarili");
                                        
                }else{
                         header("Location:../siparisler.php?yuklenme=basarisiz");
                }

        }

?>



