<?php 
require('../config/config.php');
if(!empty($_POST)){
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pwd'];
$sql='select * from  register where email= :email';
$stmt=$pdo->prepare($sql);
$stmt->execute(
    array(
        ":email"=>$email
    )
    );
    $res=$stmt->fetchAll();
    if($res){
        echo "This email exist";
    }
    else {
        $sql="insert into register(name,email,password) values(:name,:email,:password)";
        $stmt=$pdo->prepare($sql);
        $res=$stmt->execute(
            array(
                ":name"=>$name,
                ":email"=>$email,
                ":password"=>$pass

            )
            );
           if($res) {
            echo "Login successful";
           }
           else{
            echo "Not successful";
           }
    }
    
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example</title>
</head>
<body>
    <h3>Login Form</h3>
    <form action="" method="post">
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Enter your name"></br></br>
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Enter your email"></br></br>
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="pwd" placeholder="Enter your password"></br></br>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>