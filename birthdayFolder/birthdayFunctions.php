<?php
function convertHour($hour,$ampm)
	{
	if($ampm == "PM")
		{
		$hour+=11;
		}
		return $hour;
	} //kinda pointless, gives the military time of the taken hour, expects ampm to return a string
	
function printBirthdayNicely($hour, $min, $second, $month,$day,$year,$ampm)
	{
$hour = convertHour($hour,$ampm);
	return  date("l F jS, y - g:ia",mktime($hour,$min,$second,$month,$day,$year)). \n;
	} //should work properly
	function printBirthdayISO($hour, $min, $second, $month,$day,$year,$ampm)
		{
		$hour = convertHour($hour,$ampm);
	return  date("c",mktime($hour,$min,$second,$month,$day,$year)). \n;
	
		}
?>
