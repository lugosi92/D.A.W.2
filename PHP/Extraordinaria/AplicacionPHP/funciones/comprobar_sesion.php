<?php

function comprobar_sesion(){
        
    if(!isset($_SESSION['usuario'])){
        return true;
    }
}