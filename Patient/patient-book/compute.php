<?php

function computer($treat){

  $newtime = 0;
    if ($treat == "Dental Checkup"){
        $newtime = 15;
      
      } elseif ($treat == "Cosmetic Dentistry"){
        $newtime = 60;
      
      } elseif ($treat == "Dental Bridge"){
        $newtime = 45;

      }elseif ($treat == "Root Canal Treatment"){
        $newtime = 90;
        
      }elseif ($treat == "Dental Crown"){
        $newtime = 45;

      }elseif ($treat == "Restoration"){
        $newtime = 45;

      }elseif ($treat == "Odontectomy"){
        $newtime = 60;

      }elseif ($treat == "Orhtodontics"){
        $newtime = 15;
      }elseif ($treat == "Dental Implants"){
        $newtime = 90;
      }

      return $newtime;
}
      
?>