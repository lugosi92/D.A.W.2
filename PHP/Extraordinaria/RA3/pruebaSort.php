<?php

$fruits = array(
    "Orange1", "Orange2", "Orange3", "Orange20"
);
natsort($fruits);
foreach ($fruits as $key => $val) {
    echo "fruits[" . $key . "] = " . $val . "\n";
}

?>