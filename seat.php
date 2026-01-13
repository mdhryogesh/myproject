<?php
require "config.php";
$conn=new mysqli($servername, $username ,$password ,$dbname);

if($conn->connect_error){
die ("error");
}
else{
echo "database connected successfully";
}

$conn->select_db($dbname);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $textarea=$_POST["textarea"];
    $stmt=$conn-> prepare("INSERT INTO contact(name,email,textarea) values(?,?,?)");
    $stmt-> bind_param("sss",$name,$email,$textarea);
    if($stmt->execute()){
        echo "from submitted succesfully";
    }
    else{
        echo "error".$stmt->error;
    }
    }

?>