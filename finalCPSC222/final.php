<?php
// this project has taught me that i do not like echo
 session_start();

login();


function loginPage() //not ideal but allows me to put all of my html in html, use this format for all forms
{
    
         ?>   
         <form action="final.php" method="post">
         <p1>Username: </p1> <input type= "text" name="username"> <br/>
         <p2>Password: </p2> <input type= "password" name="password"> <br/>
         <input type = "submit" value="Login">
         </form>
    <?php   
    } // end of login function
   
    function login()
         {
            if(isset($_POST["username"],$_POST["password"]) == false) // may not be right
                    {
                        return;
                    } //$_SESSION may be what i need
            $loginInfo= file("auth.db", FILE_IGNORE_NEW_LINES);
  $user = $_POST["username"];
            $pass = md5($_POST["password"]);
             if($user == $loginInfo[0] &&  $pass == $loginInfo[1]) //that was wrong for a while
            {
                //i need to sanitze the inout
       $_SESSION["user"] = $user; // thank you vs code
            }
        }
        function linksPage()
        {
            
            
            ?>
            <p>Welcome <?php echo htmlspecialchars($_SESSION["user"])?> (<a href="final_logout.php" title = "Log Out"> Log Out</a>)<br>
</p><br/>
            <ul>
           <li> <a href="final.php?num=1" title = "User List">User List </a></li><br>
           <li> <a href="final.php?num=2" title = "Group List">Group List</a></li><br>
           <li> <a href="final.php?num=3" title = "SysLog">SysLog</a></li><br>
        </ul>
           <?php 
        }
        function displayUserList()
        {
        $chunks = file("/etc/passwd", FILE_IGNORE_NEW_LINES);// may have to change
?>
            <p>Welcome <?php echo htmlspecialchars($_SESSION["user"])?> (<a href="final_logout.php" title = "Log Out">Log Out</a>)<br>
</p><br/>
<a href= "final.php" title = "<=== Back to Dashboard"><=== Back to Dashboard</a><br/> 

<table border="1">
         

    <tr>
        <th>
        Username
        </th>
        <th>
        Password
        </th><th>
        UID
        </th><th>
        GID
        </th>
        <th>
        Home Directory
        </th>
        <th>
        Default Shell
        </th>
    </tr>
<?php 
foreach ( $chunks  as $chunk)
    {
        $parts = explode(":", $chunk); // i took this from a bro code video, explode is cool, should break it apart 
    //should have done the next part as echo and a loop. 
    ?>
    <tr>

    <td><?php echo htmlspecialchars($parts[0]); // i just now remember why i did this, you could probably inject code with this so thats why ?> </td>
        <td>x</td>
    <td><?php echo htmlspecialchars($parts[2]); ?> </td>
    <td><?php  echo htmlspecialchars($parts[3]); ?> </td>
    

    <td><?php echo htmlspecialchars($parts[5]); ?> </td>
        <td><?php echo  htmlspecialchars($parts[6]); ?> </td>
    </tr>
    <?php
        
        }
?>

    
    </table>
<?php
        }
    function displaygroupList()
    {
          $chunks = file("/etc/group", FILE_IGNORE_NEW_LINES);// may have to change
?>

            <p>Welcome <?php echo htmlspecialchars($_SESSION["user"])?> (<a href="final_logout.php"> Log Out</a>)<br>
</p><br/>
<a href= "final.php" title = "<=== Back to Dashboard"><=== Back to Dashboard</a><br/> 

<table border="1">
         

    <tr>
        <th>
        Group Name
        </th>
        <th>
        Password
        </th><th>
        GID
        </th><th>
        Members
        </th>
        
    </tr>
<?php 
foreach ( $chunks  as $chunk)
    {
        $parts = explode(":", $chunk); // i took this from a bro code video, explode is cool, should break it apart 
    //should have done the next part as echo and a loop. 
    ?>
    <tr>

    <td><?php  echo  htmlspecialchars($parts[0]); ?> </td>
        <td><?php  echo  htmlspecialchars($parts[1]); ?> </td>
    <td><?php  echo htmlspecialchars($parts[2]); ?> </td>
    <td><?php  echo htmlspecialchars($parts[3]); ?> </td>
  
    </tr>
    <?php
        
        }
?>

    
    </table>
<?php
        }
    function displaySysLog()
    {
         $chunks = file("/var/log/syslog", FILE_IGNORE_NEW_LINES);// may have to change
?>

            <p>Welcome <?php echo htmlspecialchars($_SESSION["user"])?> (<a href="final_logout.php" title = "Log Out">Log Out</a>)<br>
</p><br/>
<a href= "final.php" title = "<=== Back to Dashboard"><=== Back to Dashboard</a><br/> 

<table border="1">
         

    <tr>
        <th>
       Date
        </th>
        <th>
        HostName
        </th><th>
        Application[pid]
        </th><th>
        Message
        </th>
        
    </tr>
<?php 
foreach ( $chunks  as $chunk)
    {
        $parts = explode(" ", $chunk); // i took this from a bro code video, explode is cool, should break it apart 
    //should have done the next part as echo and a loop. 
    $parts[0] = $parts[0]." ".$parts[1]." ".$parts[2];
    $parts[1] = $parts[3];
    $parts[2] =$parts[4];
   $y=5;
    while ($y < count($parts)) // should be the lenght of the array at this point
    {
    $parts[3] .= " ".$parts[$y]; // dp tis work
    $y++;
    }

    ?>
    <tr>

    <td><?php  echo  htmlspecialchars($parts[0]); ?> </td>
        <td><?php  echo htmlspecialchars($parts[1]); ?> </td>
    <td><?php  echo htmlspecialchars($parts[2]); ?> </td>
    <td><?php  echo htmlspecialchars($parts[3]); ?> </td>
  
    </tr>
    <?php
        
        }
?>

    
    </table>
<?php
    }    
    function errorPage()
    {

?>

            <p>Welcome <?php echo htmlspecialchars($_SESSION["user"])?> (<a href="final_logout.php" title = "Log Out"> Log Out </a>)<br>
</p><br/>
<p>Invalid Page</p>
<a href= "final.php" title = "<=== Back to Dashboard"> <======= Back to Dashboard </a><br/> 
<?php
    }
    function displayHiddenPage()
    {
?>


<?php
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
            <h1>Cpsc222 Exam</h1>
            <?php
            
           
           if(!isset($_SESSION["user"] ))
            {
            loginPage();
            }
            else
                {
linksPage();
                    if (isset($_GET["num"]))
                        {
if($_GET ["num"] == 1)
    {
        displayUserList();
    }
    else if($_GET ["num"]== 2)    //that was really nice of you vsCode
    {
         displaygroupList();
    }
    else if($_GET ["num"] == 3)
        {
            displaySysLog();// change
        }
        else if($_GET ["num"] >=4 || $_GET["num"] <=0)
            {
              errorPage();
            }
                        }
                    
                }
            ?>
        </body>
        </html>
