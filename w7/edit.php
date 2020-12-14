<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users V2 </title>
</head>
<body>

<form action="edit.php" method="post">

    <label for="name">Search for name: </label>
    <input type="text" name="name" id="name" value="" required><br><br>
    
    <label for="newname">Enter new name: </label>
    <input type="text" name="newname" id="newname" value="" required><br>
    
    <label for="newsurname">Enter new surname: </label>
    <input type="text" name="newsurname" id="newsurname" value="" required><br>
    
    <label for="newdob">Enter new DOB: </label>
    <input type="date" name="newdob" id="newdob" value="" required><br>
    
    <label for="newemail">Enter new email: </label>
    <input type="email" name="newemail" id="newemail" value="" required><br>
    
    <input type="submit" value="update">
      


<?php
$server='localhost';
$username='root';
$password='';
$schema= 'csy2038db';

$pdo= new PDO ('mysql:dbname=' . $schema . ';host=' . $server, $username , $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['name'])){

    
    
    $inpName = $_POST['name'];
    $inpField = 'name'; 
    $inpNewname = $_POST['newname'];
    $inpNewsurname = $_POST['newsurname'];
    $inpNewemail = $_POST['newemail'];
    $inpNewdob = $_POST['newdob'];
    

    $result = $pdo->query('SELECT * FROM persons WHERE ' . $inpField . '="' . $inpName . '"' );
    
    foreach($result as $row){
    
        echo  '<ul>' . '<li>' . '<b> Previous Data : ' . $row['name'] . " " . $row['surname'] . '</b>' ." was born on " . $row['dob'] . " and his email is " . $row['email'] . '</li>' .'</ul>';    
    }
    
    $update =  $pdo->query('UPDATE persons SET name="' . $inpNewname . '", surname= "' . $inpNewsurname . '", email= "' . $inpNewemail . '", dob= "' . $inpNewdob .   '" WHERE ' . $inpField .'="' . $inpName. '"' );
    
    $newresult = $pdo->query('SELECT * FROM persons WHERE ' . $inpField . '="' . $inpNewname . '"' );
    
    foreach($newresult as $row){
    
        echo  '<ul>' . '<li>' . '<b> New Data : ' . $row['name'] . " " . $row['surname'] . '</b>' ." was born on " . $row['dob'] . " and his email is " . $row['email'] . '</li>' .'</ul>';    
    }




}

?>
</form>
</body>
</html>
