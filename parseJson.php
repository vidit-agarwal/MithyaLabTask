<?php

	$searchKey = $_POST['name_hotel'];
	//$searchKey="Hyatt Regency";
	
	$contents = file_get_contents('hotelList.json');
	$json_inventory = json_decode($contents,true);

	
	foreach ($json_inventory as $key => $hotelDesc) {



		foreach ($hotelDesc as $hotelKey => $hotelValue) {

					
				if(strcmp($hotelKey,"name")==0)
				{
					if(strcmp($hotelValue,$searchKey)==0)
					{
						echo json_encode(array($hotelDesc['uniq_id'], $hotelDesc['location'], $hotelDesc['phone'], $hotelDesc['rating'] , $hotelDesc['rooms'],$hotelDesc['price'])); 
					}
				}
		}
		
	}
?>