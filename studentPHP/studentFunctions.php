<?php
require_once "student.php";

	function printName(Student $student)
	{
	return $student->getlName() . ", " . $student->getfName();
	}
	function getLetterGrade($g)
	{
	if ($g >= 95) return "A";
	elseif ($g >=85) return "B";
        elseif ($g >=75) return "C";
        elseif ($g >=65) return "D";
        else return "F";
	}
function printGrades(Student $student )
	{
	$classes = $student->getclasses();
	$numericalGrade=0;
	$letterGrade="";
	$display ="<table border=1>" ."<tr>"."<td>".Grades . "</td>"."<td>"."<ul>" ; //does not close the table out here
	foreach ($classes as $classes=> $numericalGrade )
	{
	$letterGrade = getLetterGrade($numericalGrade);
	$display .= "<li>".$classes ." " .$numericalGrade. " " . $letterGrade. "</li>";
	}
	$display .="</ul>" . "</td>" . "</tr>"."</table>" ; //closes the table must always be last
	return $display;
	} //end print grades
function printStudent(student $student)
	{
	$name = printName($student)
	$display = "";
	$display =  "<table border =1>". " <tr>". "<td>" .Name. "</td>" ;
	$display .= "<td>".$name. "</td>";
	$display.=  "</tr>" ."<td>".student ID."</td>". "<td>".$student->getSID()."</td>". "</tr>" ;
	$display .= "</table>";
	$display .= printGrades($student);
	echo $display;
// may need to change, if anything add a return statemtn and echo the return in main.
	} //end print student 

?>
