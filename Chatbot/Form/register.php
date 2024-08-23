<?php

include 'connect.php'; 

if(isset($_POST['signup'])){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordconfirmation = $_POST['Cpassword'];
    $password=md5($password);

    $checkEmail = "SELECT * From users where email='$email'";
    $result= $conn->query($checkEmail);
    if($result->num_rows > 0){
        echo "Email Already Exists";
    }
    else{
        $insertQuery="INSERT INTO users(firstName, lastName, email, password, passwordconfirmation);
        VALUES ('$firstName','$lastName',$email,'$password','$Cpassword')";

        if($conn->query($insertQuery)==TRUE){
            header("location: signup.php");
        }
        else{
            echo "Error".$conn->error;
        }
    }
}

if(isset($_POST["signin.php"])){
    $email= $_POST["email"];
    $password = $_POST["password"];
    $password=md5($password);

    $sql="SELECT * FROM users where email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        session_start();
        $row= $result->fetch_assoc();
        $_seesion['email']= $row['email'];
        header("loaction: index.php");
        exit();
    }
    else{
        echo "Not Found, Incorrect Email or Password";
    }
}
?>