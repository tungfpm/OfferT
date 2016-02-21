<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
function getofferAndroi(){
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://api.artofclick.com/web/Api/v2.0/offer.json?api_key=59fbe5402c7a3ec194de906a31c720ae3e9ede20d15a1157646138bef3011372");
		//"http://api.artofclick.com/web/Api/v2.0/offer.json?api_key=59fbe5402c7a3ec194de906a31c720ae3e9ede20d15a1157646138bef3011372"

		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$off = curl_exec($ch);
		curl_close($ch);
 		$off_array  = json_decode($off,true);
 		//var_dump($off_array);
 		$count = $off_array["count"]; //175

 		$i = 1;
 		foreach ($off_array['offers'] as $item => $value) {

 			foreach ($value["os"] as $key => $ope) {
 				if ($ope == "Android") {
 					echo $i++;
 					echo $ope;
 					echo $value['id'].'<br>';
 				}				
 			}
 		}

 		// for ($i=0; $i < $count; $i++) { 
 		// 	$adr = $off_array["offers"][$i]["os"][0];
 		// 	//echo $adr;
 		// 	echo "<br>";
 		// 	//echo($off_array["offers"][$i]["id"]);
 		// 	if ($adr == "Android") {
 		// 		echo($off_array["offers"][$i]["id"]);
 		// 	}
 		// }
 }
getofferAndroi();
?>
</body>
</html>