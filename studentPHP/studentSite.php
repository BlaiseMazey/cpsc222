<?php
require_once("student.php");
require_once("studentFunctions.php");
	$studentArray = array(
	new Student("joe", "shmoe", "12345", array("Calc 3"=>72, "Underwater Basket Weaving"=>30,"cpsc222" =85),
	new Student("jean", "valjean", "24601", array("prison"=>93,"Bread making" =>100, "revolution"=>50 )
        new Student("bob", "bobertn", "83201", array("bob 101"=>93,"bob 102" =>100,"bob 103"=> 100)
 ); // ends the new student array
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <title>Student Display</title>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width"/>
        </head>
<?php
for ($lcv =0; $lcv<count($studentArray); $lcv++)
	{
	printStudent($studentArray[$lcv]);
	}
?>
        <body>
</body>
</html>
