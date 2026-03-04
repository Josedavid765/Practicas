<?php

$edad1 = 10;

if ($edad1 >= 18){
    echo "Eres mayor de edad \n";
}else{
    echo "Eres menor de edad\n";
}

switch($edad1){
    case 1: 
        echo "tienes un año\n";
        break;
    case 18:
        echo "tienes 18 años\n";
        break;
    default:
        echo "dato erroneo\n";
}

echo "Numeros Pares: ";
for($i=0;$i<=10;$i++){
        if($i%2==0){
            echo $i."\n";
        }
}

hi("Jose David");
hi("Pedro");
hi("Juan");
hi("Hector");

echo suma(1,10);

function suma(int $num1, int $num2){
    $suma = $num1+$num2;
    return "el resultado de la operacion de la suma es: $suma\n";
}

function hi($nombre){
    echo "Hola: $nombre \n";
}

echo strtoupper("jose david\n");

$nombres = ["Hector", "Juan", "Jose David", "Pedro", "Gabriel", "Sara"];
$lenght = count($nombres);

for($i=0; $i<$lenght;$i++){
        echo $nombres[$i]."\n";
}

foreach($nombres as $nom){
        echo $nom.";";
}

$beer = [
        "name" => "Amstel",
        "alcohol" => 8.5,
        "country" => "Alemania"
];

echo $beer["country"];