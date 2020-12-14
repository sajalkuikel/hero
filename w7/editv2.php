<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
</head>
<body>

<form action="editv2.php" method="post">

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
    
    $criteria= [
        'inpName' => $_POST['name'], 
        'inpNewname' => $_POST['newname'],
        'inpNewsurname' => $_POST['newsurname'],
        'inpNewemail' => $_POST['newemail'],
        'inpNewdob' => $_POST['newdob'],
        
    ];
    
    $result = $pdo->query('SELECT * FROM persons WHERE name = "' . $_POST['name'] . '"' );  
    foreach($result as $row){
        echo  '<ul>' . '<li>' . '<b> Previous Data : ' . $row['name'] . " " . $row['surname'] . '</b>' ." was born on " . $row['dob'] . " and his email is " . $row['email'] . '</li>' .'</ul>';    
    }
    
   
    $update =  $pdo->prepare('UPDATE persons SET name= :inpNewname, surname= :inpNewsurname, email= :inpNewemail, dob= :inpNewdob  WHERE name= :inpName ' );
    $update -> execute($criteria);

    $result = $pdo->query('SELECT * FROM persons WHERE name = "' . $_POST['newname'] . '"' );
    
    foreach($result as $row){
    
        echo  '<ul>' . '<li>' . '<b> New Data : ' . $row['name'] . " " . $row['surname'] . '</b>' ." was born on " . $row['dob'] . " and his email is " . $row['email'] . '</li>' .'</ul>';    
    }
    
  




}

?>
</form>
</body>
</html>


<?php


    $messageQuery = $pdo->prepare('SELECT * from messages');
    $userQuery = $pdo->prepare('SELECT * FROM persons WHERE id = :id');
    $messageQuery->execute();
    echo '<ul>';
    while ($message = $messageQuery->fetch()) {
    $userCriteria = [
    'id' => $message['user_id']
    ];
    $userQuery->execute($userCriteria);
    $user = $userQuery->fetch();
    echo '<li>' .
    $user['name'] . ' ' . $user['surname'] .
    ' posted the message <strong>' . $message['message_text'] . '</strong>' .
    ' on ' . $message['message_date']
    . '</li>';
    }
    echo '</ul>';

?>