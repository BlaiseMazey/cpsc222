<? php
//name of file is grade_calculator.php
$scores = [$_POST["grade1"],$_POST["grade2"],$_POST["grade3"]];

// commented out for sentimental value $_POST["grade1","grade2","grade3"]; // not how i want to do this come back 

function getLetter($grade) // in here i will add validation no i wont should already be validated
	{

	if($grade >= 90)
		{
		return 'A';
		}
	if($grade < 90 && $grade >= 80 )
		{
		return 'B';
		}
	if($grade >80 && $grade >= 70)
		{
		return 'C';
		}
	if($grade >70 && $grade >= 60)
		{
		return 'D';
		}
	else
	{
	return 'F';
	}

	}

function calcAverage($grade1, $grade2, $grade3)	
	{
	return ($grade1+$grade2+$grade3)/3;
	
	}	
?>

<!DOCTYPE html>
<html lang="en">
        <head>
                <title>Exam 2 Part 2</title>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width" />
        </head>
        <body>

	<?php // cool php thing
	if (isset($_POST["grade1"] == false || isset($_POST["grade2"] == false || isset($_POST["grade3"] == false)
 // bad way to do it but should work
{
?>
<label> Input grades below </label>
		<form action="grade_calculator.php" method="post">
		<select name="grade1" id="grade1"> 
			<?php
	//should have made a function
				for($x=0; $x<100; $x++)
				{
				echo "<option value=/"".$x."/">".$x."</option>"; // should display a dropdown 0-100 no //need to clean data because that is only available options 

				}
				
			?>
		</select> 
		<select name="grade2" id="grade2"> 
			<?php
				for($x=0; $x<100; $x++)
				{
				echo "<option value=/"".$x."/">".$x."</option>"; // should display a dropdown 0-100 no //need to clean data because that is only available options 

				}
				
			?>
		</select> 
<select name="grade3" id="grade3"> 
			<?php
				for($x=0; $x<100; $x++)
				{
				echo "<option value=/"".$x."/">".$x."</option>"; // should display a dropdown 0-100 no //need to clean data because that is only available options  

				}
				
			?>
		</select> 
		<input type="submit" value="click here"
		</form>
	<?php } //end of cool php if thing
	else
	echo "<p> the grades are</p><br>";

	echo "<p> grade 1 is ".$scores[0]." , ". getLetter($scores[0])."</p><br>";
	echo "<p> grade 2 is ".$scores[1]." , ". getLetter($scores[1])."</p><br>";
	echo "<p> grade 3 is ".$scores[2]." , ". getLetter($scores[2])."</p><br>";
	echo "<p> the average is ".calcAverage($scores[0], $scores[1], $scores[2])." , the grade for the class is". getLetter(calcAverage($scores[0], $scores[1], $scores[2]))."</p><br>";


	?>
        </body>
</html>
