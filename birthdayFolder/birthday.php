<?php
require_once "birthdayfunctions.php";

$months = array("January" =>1, "Februrary"=>2, "March"=>3, "April"=>4, "May"=>5,"June"=>6,"July"=>7,"August"=>8,"September"=>9, "October"=>10, "November"=>11,"December"=>12);
$buttonPressed = ($_SERVER['REQUEST_METHOD'] === 'POST'); 
$linkedClicked = isset($_GET['month']);
if($buttonPressed == true)
{
$month= $_POST['month'] ;
$day= $_POST['day'] ;
$year = $_POST['year'];
$hour = $_POST['hour'];
$minute = $_POST['min'];
$dayOrNight = $_POST['ampm'];
}
	if($linkedClicked == true)
{
$month= preg_replace('/[a-zA-Z]/','',$_GET['month']) ; // this is the way we did it in class so im keeping it. Would it not be more efecive to typecast this to a number
$day= preg_replace('/[a-zA-Z]/','',$_GET['day'] );
$year =preg_replace('/[a-zA-Z]/','', $_GET['year']);
$hour = preg_replace('/[a-zA-Z]/','', $_GET['hour']);
$minute = preg_replace('/[a-zA-Z]/','',$_GET['min']);
$dayOrNight = preg_replace('^/[a-zA-Z]/','',$_GET['ampm']);
}
?>
<!DOCTYPE html>
<html lang=en>

	<head>
 		<title> Birthday Format Fun</title>
               	<meta charset="utf-8" />
       	        <meta name = "viewport" content="width=device-width"/>
</head>
	<body>
<h1>Birthday Formater</h1>
<?php if($buttonPressed == false && $linkedClicked == false)//check this line
{ ?>
<form method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>" >
<table border=1 >
<tr>
<th><b>Month	</b> </th>
<th><b>Day	</b> </th>
<th><b>Year	</b> </th>
<th><b>Hour	</b> </th>
<th><b>Minute	</b> </th> 
<th><b>AM/PM</b> </th>

</tr>

<tr>
<th>
<select name ="month">
<?php

foreach($months as $name => $num)
	{
echo "<option value = ".$num."> ".$name ."</option> ";
	}
?>
</select>

</th>
<?php
echo "<th> ";
echo "<select name= \"day\" > ";
for($lcv=1;$lcv<=31; $lcv++ )
echo "<option value = ".$lcv."> ".$lcv ."</option> ";

echo"</select> ";
echo "</th>";
?>
<?php
//year
echo "<th> ";
echo "<select name= \"year\" > ";
for($lcv=2026;$lcv>=1901; $lcv-- )
echo "<option value = ".$lcv."> ".$lcv ."</option> ";

echo"</select> ";
echo "</th>";
?>
<?php
//hour
echo "<th> ";
echo "<select name= \"hour\" > ";
for($lcv=1;$lcv<=12; $lcv++ )
echo "<option value = ".$lcv."> ".$lcv ."</option> ";

echo"</select> ";
echo "</th>";
?>
<?php
//min
echo "<th> ";
echo "<select name= \"min\" > ";
for($lcv=0;$lcv<=59; $lcv++ )
echo "<option value = ".$lcv."> ".$lcv ."</option> ";
echo"</select> ";
echo "</th>";
?>
<?php
//ampm
echo "<th> ";
echo "<select name= \"ampm\" > ";
echo "<option value = "."AM"."> "."AM" ."</option> ";
echo "<option value = "."PM"."> "."PM" ."</option> ";
echo"</select> ";
echo "</th>";
?>

</tr>
</table>

<br/>

<br/>
	<input type ="submit" name="submit" value ="Click Here">
</form>
<?php } //should close out the thing rember this its cool. 
	elseif($buttonPressed == true)
	{	
	
	echo "<h3>".printBirthdayNicely(preg_replace($hour, $minute, $month,$day,$year,$dayOrNight)."\n"."</h3>";
	
		echo "<a href='birthday.php?month=$month&day=$day&year=$year&hour=$hour&min=$minute&ampm=$dayOrNight'>"."show ISO Date"."</a>"; // i should match variable names, works currently
$buttonPressed = false;
	}
	else
	{
		echo"<h4>".printBirthdayISO($hour, $minute, $month,$day,$year,$dayOrNight)."</h4>";
	}
		?> 


	</body>
</html>
