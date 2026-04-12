<?php
$months = array("January" -> 1, "Feburary" -> 2, "March" -> 3, "April" -> 4, "May"->5,"June"->6,"July"->7,"August"->8,"September"->9, "October"->10, "November"->11, "December"->12);
$month= $_POST['month'] ;
$day= $_POST['day'] ;
$year = $_POST['year'];
$hour = $_POST['hour'];
$minute = $_POST['min'];
$dayOrNight = $_POST['ampm'];
$buttonPresses = "";
if($minute == 0)
        $minute = '0';

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

<form method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>" >
<table border=1 >
<tr>
<th><b>Month    </b> </th>
<th><b>Day      </b> </th>
<th><b>Year     </b> </th>
<th><b>Hour     </b> </th>
<th><b>Minute   </b> </th> 
<th><b>AM/PM</b> </th>

</tr>

<tr>
<th>
<select name ="month">
<?php

for($lcv=0;$lcv<count($months); $lcv++ )
echo "<option value = ".$months[$lcv]."> ".$months[$lcv] ."</option> ";
?>
</select>

</th>
<?php
echo "<th> ";
echo "<select name= \"day\" > ";
for($lcv=1;$lcv<31; $lcv++ )
echo "<option value = ".$lcv."> ".$lcv ."</option> ";

echo"</select> ";
echo "</th>";
?>
<?php
//year
echo "<th> ";
echo "<select name= \"year\" > ";
for($lcv=2026;$lcv>1901; $lcv-- )
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
for($lcv=0;$lcv<=60; $lcv++ )
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
        <input type ="submit" name="submit" value ="Click Here"/input>
</form>

<?php
//echo "<a href = \"birthday.php? " concat all variables we took in to do thit then do \"">ClickHere" /</a>;
?>

<?php
if($_SERVER['REQUEST_METHOD'=="POST" ]) //mktime()
{
echo "work plz ". $month." ".$day." ".$year. " ".$hour." ".$minute." ".$dayOrNight;
}
 ?>
        </body>
</html>


<table border=1 >
