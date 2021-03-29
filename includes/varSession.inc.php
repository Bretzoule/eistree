<?php

$json = file_get_contents($_SERVER['DOCUMENT_ROOT']."/data/produits.json");

$data = json_decode($json, TRUE);

$articlesArbustes = $data['arbustes'];
$articlesPlantesFleuries = $data['plantesfleuries'];
$articlesPlantesInterieur = $data['plantesinterieur'];
?>