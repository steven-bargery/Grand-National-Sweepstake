<?php 

$favs1 = array('Tiger Roll', 'Any Second Now', 'Burrows Saint', 'Definitly Red', 'Kimberlite Candy', 'Walk In The Mill');

$favs2 = array('Magic Of Light', 'Potters Corner', 'Bristol De Mai', 'Elegant Escape', 'Anibale Fly', 'Total Recall');

$remaining = array('Aso', 'Top Ville Ben', 'Beware The Bear', 'Peregrine Run', 'Jett', 'Alpha Des Obeaux', 'The Storyteller', 'Talkischeap', 'Yala Enki', 'Ballyoptic', 'Sub Lieutenant', 'Ok Corral', 'Tout Est Permis', 'Vintage Clouds', 'Crievehill', 'Lake View Lad', 'Jury Duty', 'Pleasant Company', 'Acapella Bourgeois', 'Shattered Love', 'Dounikos', 'Kildisart', 'Death Duty', 'Ramses De Teillee', 'Valtor', 'Saint Xavier', 'Warriors Tale', 'Double Shuffle');

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
	
	if ($entrant != "Dad" && $entrant != "Mum") {
		$randomremaining2 = array_rand($remaining, 1);
		$draw[$entrant][] = $remaining[$randomremaining2];
		unset($remaining[$randomremaining2]);
	}
}

print_r($draw);
print_r($remaining);

?>
