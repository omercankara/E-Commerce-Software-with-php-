
<?php
session_start();
        require_once 'islem/baglan.php';
        echo "<br>";
?>


<?php

       if(isset($_POST['login'])){
        $kadi=htmlspecialchars($_POST['kullaniciadi']);
        $pass=htmlspecialchars($_POST['sifre']);
      
        
        

        $kullanicisor=$baglanti->prepare("SELECT * from kullanici WHERE kullanici_adi=:kullanici_adi  and kullanici_sifre=:kullanici_sifre and kullanici_yetki=:kullanici_yetki");
        $kullanicisor->execute(array(
                'kullanici_adi' =>$kadi,
                'kullanici_sifre'=>$pass,
                'kullanici_yetki'=>1
        
        ));

        $var=$kullanicisor->rowCount(); // kodları saydırmaya yarar varsa 1 yoksa  0 yazar
        if($var >0){
                echo $_SESSION['normalgiris']=$kadi; //Session tut panele izinsiz giris yapmayı engellicez
                header("Location:index.php?durum=hosgeldin");
        }else{
                header("Location:login.php?durum=hata");
        }
}


 

if(isset($_POST['kayit'])){
        $kadi = htmlspecialchars($_POST['kullaniciadi']);
        $sifre = htmlspecialchars($_POST['sifre']);
        $sifretekrar = htmlspecialchars($_POST['sifretekrar']);
        $mail = htmlspecialchars($_POST['mail']);
        $isim= htmlspecialchars($_POST['isim']);
   


        $kullanicisor=$baglanti->prepare("SELECT * from kullanici WHERE kullanici_adi=:kullanici_adi  and kullanici_yetki=:kullanici_yetki");
        $kullanicisor->execute(array(
                'kullanici_adi' =>$kadi,
                'kullanici_yetki'=>1 //Normal kullanıcılar için 1
        ));
        $var =$kullanicisor->rowCount();
           if($var >0){
                 header("Location:login.php?durum=hata");
        }else{
                if($sifre==$sifretekrar){
                       $kullanicikaydet=$baglanti->prepare("INSERT INTO kullanici SET
                 kullanici_adi=:kullanici_adi,
                 kullanici_sifre=:kullanici_sifre,
                 kullanici_adsoyad=:kullanici_adsoyad,
                 kullanici_yetki=:kullanici_yetki,
                 kullanici_mail=:kullanici_mail
             
        ");
        $insert=$kullanicikaydet->execute(array(

                'kullanici_adi'=>$kadi,
                'kullanici_sifre'=> $sifre,
                'kullanici_adsoyad'=>$isim,
                'kullanici_yetki'=>1,            //Normal kullanıcı
                'kullanici_mail'=>$mail
        ));
                if ($insert) {
                        header("Location:login.php?durum=basarili");
                }else{
                     header("Location:login.php?durum=hata");
                }       
                }else{
                           header("Location:login.php?durum=parola");
                }
        }
         
}
 



    if(isset($_POST['kullaniciduzenle'])){
                $id=$_POST['kullaniciid'];
                
                $duzenle = $baglanti->prepare("UPDATE kullanici  SET 
          
                kullanici_adsoyad=:kullanici_adsoyad,
                kullanici_mail=:kullanici_mail,
                kullanici_il=:kullanici_il,
                kullanici_ilce=:kullanici_ilce,
                kullanici_tel=:kullanici_tel,
                kullanici_adres=:kullanici_adres
                        WHERE kullanici_id=$id
                ");

                $update=$duzenle->execute(array(
                'kullanici_adsoyad'=>$_POST['kullaniciadi'],
                'kullanici_mail'=>$_POST['email'],
                'kullanici_il'=>$_POST['sehir'],
                'kullanici_ilce'=>$_POST['ilce'],
                'kullanici_tel'=>$_POST['telefon'],
                'kullanici_adres'=>$_POST['adres']
                ));

                if($update){
                         header("Location:kullanici.php?yuklenme=basarili");
                }else{
                          header("Location:kullanici.php?yuklenme=basarisiz");
                }
        }


if(isset($_POST['yorumkaydet'])){
        $gelenurl=$_SERVER['HTTP_REFERER'];
        $yorumkaydet=$baglanti->prepare("INSERT INTO yorumlar SET

                kullanici_id=:kullanici_id,
                urun_id=:urun_id,
                yorum_detay=:yorum_detay,
                yorum_onay=:yorum_onay

         ");

         $insert=$yorumkaydet->execute(array(
                'kullanici_id'=>$_POST['kullaniciid'],
                'urun_id'=>$_POST['urunid'],
                'yorum_detay'=>$_POST['yorum'],
                'yorum_onay'=> 0
         ));
         if($insert){
                 header("Location:$gelenurl?yuklenme=basarili");
         }else{
                header("Location:$gelenurl?yuklenme=basarisiz");
         }
}








if(isset($_POST['siparisguncelle'])){
                
                $siparisid=$_POST['numara']; 
                $duzenle = $baglanti->prepare("UPDATE  siparisler  SET 
                  siparis_yeniadet=:siparis_yeniadet,
                  siparis_not=:siparis_not
               
                WHERE siparis_id=$siparisid
               ");
              

                $siparisbas=$duzenle->execute(array(
                        'siparis_yeniadet'=>$_POST['yeniadet'],
                        'siparis_not'=>$_POST['not']                       
                ));

                if($siparisbas){
                     header("Location:siparis.php?yuklenme=basarili");
                
                }else{
                      header("Location:siparis.php?yuklenme=basarisiz");
                }

        }

?>