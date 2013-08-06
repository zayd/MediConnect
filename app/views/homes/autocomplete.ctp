<?php
/* pr($doctors); pr($specialties); pr($procedures); */
$len = count($doctors);
for ($i = 0; $i < $len; $i++) {
  echo "{$doctors[$i]['Doctor']['name']}|{$doctors[$i]['Specialty']['name']}|doctor\n";
}

$len = count($specialties);
for ($i = 0; $i < $len; $i++) {
  echo "{$specialties[$i]['Specialty']['name']}|{$specialties[$i]['Specialty']['tags']}|specialty|{$specialties[$i]['Specialty']['id']}\n";
}

$len = count($procedures);
for ($i = 0; $i < $len; $i++) {
  echo "{$procedures[$i]['Procedure']['name']}|{$procedures[$i]['Procedure']['tags']}|procedure\n";
}

if (count($specialties) == 0 && count($doctors) == 0 && count($procedures) == 0)
	echo "No Results, try other terms or even use layman terms ||message\n";
?>