<?php

$nombre = date("D");

switch ($nombre) {
    case "Mon":
        echo $nombre = "Lunes";
        break;
        case "Tue":
            echo $nombre = "Martes";
            break;
            case "Wed":
                echo $nombre = "Miercoles";
                break;
                case "Thu":
                    echo $nombre = "Jueves";
                    break;
                    case "Fri":
                        echo $nombre = "Viernes";
                        break;
                        case "Sat":
                            echo $nombre ="Sabado";
                            break;
                            case "Sun":
                                echo $nombre ="Domingo";
                                break;
                            }                          

?>
