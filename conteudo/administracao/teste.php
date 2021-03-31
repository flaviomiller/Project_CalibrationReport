<?php
/*
$stdCertDate = new DateTime(01-2021);//"02-2021";

if ($stdCertDate == "") {
    echo "";
} else { 
     $teste = $stdCertDate-> format('m/Y');
     echo $teste ;
     //echo $teste;
}
*/
?>

<br>
<br>

<?php

//$stdCertDate = new DateTime('');

$stdCertDate = '1111';

var_dump($stdCertDate);

echo "<br><br>";

if ($stdCertDate == "") {
    echo "Vazio";
} else { 
    $teste = new DateTime($stdCertDate);
    echo $teste-> format('m/Y');
     //echo $teste;
}

?>