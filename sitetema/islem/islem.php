<?php
 session_start();
ob_start();
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
    if ($_FILES["logo"]["size"]<1024*1024){//Dosya boyutu  aldık ve 1Mb'tan az olmasını söyledik.
 
        if ($_FILES["logo"]["type"]=="image/jpeg"){  //Dosya tipi aldık ve sadece jpeg olmasını söyledik.
 
         
            $dosya_adi   =    $_FILES["logo"]["name"];  //Dsoya adını aldık.
 
            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret=array("cv","fg","th","lu","er");
            $uzanti=substr($dosya_adi,-4,4);
            $sayi_tut=rand(1,10000);
 
            $yeni_ad="../resim/".$uret[rand(0,4)].$sayi_tut.$uzanti;
 
            //Dosya yeni adıyla yuklenenresimler klasörüne kaydedilecek
 
            if (move_uploaded_file($_FILES["logo"]["tmp_name"],$yeni_ad)){
                echo 'Dosya başarıyla yüklendi.';
 
                //Bilgileri veritabanına kayıt ediyoruz..
 
            $sorgu = $baglanti->prepare("UPDATE ayarlar SET logo=:logo");
            $sorgu->execute(array(':logo'=> $yeni_ad));
            if($sorgu){
                echo 'Veritabanına kaydedildi.';
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


#SEPET İŞLEMLERİ
if (isset($_POST['sepeteekle'])) {
    $id=$_POST['urunid'];
    $adet=$_POST['adet']; // urun detaydan gelen adet değişkenini aldık
    
    setcookie('sepet['.$id.']',$adet, strtotime("7day"),'/' );
        Header('Location: ../sepet?eklenme=basarili');
 
}

if (isset($_GET['sepetsil'])) {
    $id=$_GET['id'];
    $adet=$_GET['adet']; // urun detaydan gelen adet değişkenini aldık
    $expire = time()+60*60*24*30;  
   setcookie('sepet['.$id.']',$adet, strtotime("-7day"),'/' );
        Header('Location: ../sepet?durum=silindi');
}



if(isset($_POST['alisverisbitir'])){
$toplamfiyat=$_POST['toplamfiyat'];
$kadi=$_POST['kadi'];

        foreach($_COOKIE['sepet'] as $key => $value){
                $urunler=$baglanti->prepare("SELECT *  FROM urunler  where urun_id=:urun_id order by urun_sira ASC");
                $urunler->execute(array(
                                     'urun_id'=>$key 
                                ));
                                $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);    
                                $fiyat = $urunlercek['urun_fiyat'];

                $alisveriskaydet=$baglanti->prepare("INSERT INTO siparisler SET
                kullanici_id=:kullanici_id,
                urun_id=:urun_id,
                urun_adet=:urun_adet,
                urun_fiyat=:urun_fiyat,
                toplam_fiyat=:toplam_fiyat,
                odeme_turu=:odeme_turu,
                siparis_onay=:siparis_onay           
         ");

         $insert=$alisveriskaydet->execute(array(
                'kullanici_id'=>$kadi,
                'urun_id'=>$key,
                'urun_adet'=>$value,
                'urun_fiyat'=>$fiyat,
                'toplam_fiyat'=>$toplamfiyat,
                'odeme_turu'=>$_POST['odeme'],
                'siparis_onay'=>0
               
         ));
}
         if($insert){
                header("Location:../index.php?yuklenme=basarili");
         }else{
                 header("Location:../index.php?yuklenme=basarisiz");
         }


}

?>