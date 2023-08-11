<!DOCTYPE html>
<html>
<link rel="stylesheet" href="index1.css">

<body>

<h1 align="center">Sql injection in PHP</h1>
    <div id="frm">
        <h1>Login</h1>
        
        <form name="f1" action="index1.php" method="POST">
            <P>
                <label>Username</label>
                <input type="text" id="user" name="user"/>
            </P>
            <P>
                <label>Password</label>
                <input type="text" id="pass" name="pass"/>
            </P>

            <p>
                <input type="submit" name="submit" id="btn" value="login"/>
            </p>



        </form>
    </div>


</body>


</html>

<?php 

if(isset($_POST['submit']))
{

    $host="localhost";
    $user="root";
    $password='';
    $db_name="sql_demo";


    $con=mysqli_connect($host,$user,$password,$db_name);
    if(mysqli_connect_errno())
    {
        die("Failed to connect with MYSQL : ".mysqli_connect_error());
    }
    $username=$_POST['user'];
    $password=$_POST['pass'];


    $username=stripcslashes($username);
    $password=stripcslashes($password);
    $username=mysqli_real_escape_string($con,$username);
    $password=mysqli_real_escape_string($con,$password);
    $sql="select * from login where username='$username' and password='$password'";
    $result=mysqli_query($con ,$sql);
    $count=mysqli_num_rows($result);

    if($count >0)
    {
        echo "<h1><centre>Login successful</centre></h1>";
        echo "Query is: ".$sql;
    }
    else{
        echo "<h1>Login Failed. Invalid username or password.</h1>";
    }
    if($count>0)
    {
        echo "<div id='GFG'>";
        echo "<table>
        <tr bgcolor='#CCC'>
        <th>Username</th>
        <th>Password</th>
        </tr>";
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<tr align=left style='font-size: 18px;'>";
            echo "<td align =center>".$row['username']."</td>";
            echo "<td align=left>".$row['password']."</td>";
            echo "</tr>";
        }
        
    }
}
?>