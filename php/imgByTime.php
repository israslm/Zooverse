<?php 
    $h = date("H");
    if($h>6 && $h<=10){
        echo ' <img src="img/1.jpg" /> ';
    }
    if($h>10 && $h<=14){
        echo ' <img src="img/2.jpg" /> ';
    }
    if($h>14 && $h<=18){
        echo ' <img src="img/3.jpg" /> ';
    }
    else{
        echo ' <img src="img/4.jpg" /> ';
    }
?>