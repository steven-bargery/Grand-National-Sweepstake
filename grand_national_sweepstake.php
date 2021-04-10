<?php 

$favs1 = array('Burrows Saint', 'Magic Of Light', 'Any Second Now', 'Takingrisks', 'Cloth Cap', 'Minella Times');

$favs2 = array('Kimberlite Candy', 'Mister Malarky', 'Discorama', 'Acapella Bourgeois', 'Potters Corner', 'Farclas');

$remaining = array('Bristol De Mai', 'Chris\'s Dream', 'Yala Enki', 'Ballyoptic', 'Definitly Red', 'Lake View Lad', 'Talkischeap', 'Tout Est Permis', 'Anibale Fly', 'Balko Des Flos', 'Alpha Des Obeaux', 'OK Corral', 'Shattered Love', 'Jett', 'Lord Du Mesnil', 'Class Conti', 'Milan Native', 'Vieux Lion Rouge', 'Cabaret Queen', 'Minellacelebration', 'Canelo', 'The Long Mile', 'Give Me A Copper', 'Sub Lieutenant', 'Hogan\'s Height', 'Double Shuffle', 'Ami Desbois', 'Blaklion');

$entries = array('Dad', 'Mum', 'Sibling 1', 'Sibling 2', 'Sibling 3', 'Sibling 4');

foreach ($entries as $entrant) {
	$randomfav1 = array_rand($favs1, 1);
	$draw[$entrant][] = $favs1[$randomfav1];
	unset($favs1[$randomfav1]);
	
	$randomfav2 = array_rand($favs2, 1);
	$draw[$entrant][] = $favs2[$randomfav2];
	unset($favs2[$randomfav2]);
	
	$randomremaining = array_rand($remaining, 4);
	foreach ($randomremaining as $ranremain) {
		$draw[$entrant][] = $remaining[$ranremain];
		unset($remaining[$ranremain]);
	}
	
	//give the siblings the remaining horses
	if ($entrant != "Dad" && $entrant != "Mum") {
		$randomremaining2 = array_rand($remaining, 1);
		$draw[$entrant][] = $remaining[$randomremaining2];
		unset($remaining[$randomremaining2]);
	} else {
		$draw[$entrant][] = "";
	}
}

//transpose the data so it is formatted correctly for the csv file
function transposeData($data) {
  $retData = array();
    foreach ($data as $row => $columns) {
      foreach ($columns as $row2 => $column2) {
       		$retData[$row2][$row] = $column2;
      }
    }
	return $retData;
}

$data = transposeData($draw);
//print_r($data);

//output the data to a csv file
$output = fopen("php://output",'w') or die("Can't open php://output");
header("Content-Type:application/csv"); 
header("Content-Disposition:attachment;filename=pressurecsv.csv"); 
fputcsv($output, array_keys($draw));
foreach($data as $row){
	fputcsv($output, $row);
}
fclose($output) or die("Can't close php://output");

//print_r($draw);
//print_r($remaining);

?>