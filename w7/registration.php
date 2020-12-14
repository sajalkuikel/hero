<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<form action="registration.php" method= "GET">
    <h1>Registration form</h1>

    <label for= "name"> Name: </label>
    <input type="text" name="name" id="name" >

    <label for= "surname"> Surname: </label>
    <input type="text" name="surname" id= "surname" ><br><br>

    <label for= "email"> Email: </label>
    <input type="email" name="email" id="email" >

    <label for= "dob"> DoB: </label>
    <input type="date" name = "date" id="dob"> <br><br>

    <input type="submit" value= "submit" >
</form>

<?php

$server='localhost';
$username='root';
$password='';
$schema= 'csy2038db';

$pdo= new PDO ('mysql:dbname=' . $schema . ';host=' . $server, $username , $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


;  

if(isset($_GET['name']) && isset($_GET['surname']) && isset($_GET['email']) && isset($_GET['date'])){

    // var_dump($_GET);
    
    $inpName = $_GET['name'];
    $inpSurname = $_GET['surname'];
    $inpEmail = $_GET['email'];
    $inpDOB = $_GET['date'];
 
    // $date= new DateTime($inpDOB);
    // echo $date-> format('Y-m-d'); 

    $pdo -> query('INSERT INTO persons (name, surname,  dob, email) VALUES ( "' . $inpName . '", "' . $inpSurname  . '", "' . $inpDOB  . '", "' . $inpEmail . '")' );
    

    
}

?> 
</body>
</html>