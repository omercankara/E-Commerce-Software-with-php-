<?php 
 
        try{
          $baglanti = new PDO("mysql:host=localhost; dbname=eticaret",'root','');
          echo 'VERİTABANİNA BAĞLANDİİM VERİTABANİNA BAĞLANDİİM VERİTABANİNA BAĞLANDİİM VERİTABANİNA BAĞLANDİİM ';
        
        }
        catch(Exception $e){
                echo $e->getMessage();
                
        }

?>