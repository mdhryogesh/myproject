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
    $number=$_POST["number"];
    $family=$_POST["family"];
    $stmt=$conn-> prepare("INSERT INTO customereservation(name,email,number,family) values(?,?,?,?)");
    $stmt-> bind_param("ssis",$name,$email,$number,$family);
    if($stmt->execute()){
        echo "from submitted succesfully";
    }
    else{
        echo "error".$stmt->error;
    }
    }

?>
