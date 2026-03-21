<?php
        $EmployeeName = "Blaise Mazey";
        $HoursWorked = 40; //changed to .1 to see if it will print properly
        $HourlyPayRate = 54.50;
        $FederalTaxWitholdingRate = .245;
        $StateTaxWitholdingRate= .055;
$grosPay = $HourlyPayRate*$HoursWorked;
$netPay =  $grosPay - ( ($grosPay)*$FederalTaxWitholdingRate + ($grosPay)*$StateTaxWitholdingRate) ;
$taxBracket = "";
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <title> Tax Help</title>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width"/>
        </head>
        <body>

<?php
        echo "<table border =1>";
                echo "<tr>";
                        echo "<td>"."<b>" . "Employee Name:     "."</b>" ."</td>";
                        echo "<td>".$EmployeeName."</td>";
                echo "</tr>";
               echo "<tr>";
                        echo "<td>"."<b>". "Hours Worked:       "."</b>"."</td>";
                        echo "<td>".$HoursWorked."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>"."<b>". "Pay Rate:       "."</b>"."</td>";
                        echo "<td>"."$". $HourlyPayRate."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>"."<b>". "Gross Pay:       "."</b>"."</td>";
                        echo "<td>"."$". $HourlyPayRate*$HoursWorked."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>"."<b>". "Federal Witholding "."(" . $FederalTaxWitholdingRate*100 ."%)" . ": "."</b>
                        echo "<td>"."$". ($HourlyPayRate*$HoursWorked)*$FederalTaxWitholdingRate ."</td>";
                echo "</tr>";
 echo "<tr>";
                        echo "<td>"."<b>". "State Witholding "."(" . $StateTaxWitholdingRate*100 ."%)" . ": "."</b>".">
                        echo "<td>"."$".$HourlyPayRate*$HoursWorked*$StateTaxWitholdingRate."</td>";
                echo "</tr>"; //fix this
               echo "<tr>";
                        echo "<td>"."<b>"."Net Pay:      ". "</b>"."</td>";

                        echo "<td>"."$".$netPay. "</td>";

             echo "</tr>";
if($netPay < 11925 )
        {
        $taxBracket = "ten percent ";
        }
if($netPay > 11925 && $netPay <48475 )
        {
        $taxBracket = "$ 1,192.50 plus 12 percent over $11,925 ";
        }
if($netPay > 48475 && $netPay <103350 )
        {
        $taxBracket = "$ 5,578.50 plus 22 percent over $48,475 ";
        }
if($netPay > 197300 && $netPay < 250525 )
        {
        $taxBracket = "$ 40,199 plus 32 percent over $197,300 ";
        }
if($netPay > 250525 && $netPay < 626350 )
        {
        $taxBracket = "$ 57,231 plus 32 percent over $250,525 ";
        }
if($netPay > 626351 )
        {
        $taxBracket = "$ 188,769 plus 37 percent over $626,350 ";
        }
                       echo "<td>"."<b>"."Tax Bracket:      ". "</b>"."</td>";

                        echo "<td>".$taxBracket. "</td>";




        echo "</table>";
 ?>

        </body>
</html>
