<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $arr = array(2,2,2,2);
    foreach($arr as $elemento){
        $elemento = $elemento * 2;
    }
    foreach($arr as $elemento){
        echo $elemento . " ";
    }
    ?>

    <?php
        $a = 4;
        $b = &$a;
        $a = 6;
        echo $b;
    ?>
</body>
</html>

Pregunta 1: 15
Pregunta 2: 1 2 3 
Pregunta 3: 1 2 3
Pregunta 4: 12
Pregunta 5: Hola mundo error
Pregunta 6: Hola mundo
Pregunta 7: 15 15
Pregunta 8: La variable no esta definida

9:
10:10 25
11: 7
12: 10 10
13:1 2 3 4 
14: 

15: 
16:5
17: 2 4 6
18: 1 - 4 5
19:si, no
20: nombre edad pais

21: 10 20 50 
22: 1 2 3 4 5 6
23: 1 3 5 8
24: 1 2 3 4 5
25: No existe