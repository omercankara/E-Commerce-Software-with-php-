<?php 
 
        try{
          $baglanti = new PDO("mysql:host=localhost; dbname=eticaret",'root','');
          #echo 'Ben hâlâ dolaşıyorum avare Hani görsen, enikonu divane';
        
        }
        catch(Exception $e){
                echo $e->getMessage();
                echo 'calismadim bak';
        }

?>