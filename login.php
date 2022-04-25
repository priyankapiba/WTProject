//login.php
<?php
    if(isset($_POST['login'])){
         
        session_start();
        include('includes/db.php');
     
        $username=$_POST['username'];
        $password=$_POST['password'];
        $db = mysqli_connect('localhost','root','','firstProject');
        $query=mysqli_query($db,"SELECT * FROM admin WHERE email='$username' && password='$password'");
     
        if (mysqli_num_rows($query) == 0){
            $_SESSION['message']="Login Failed. User not Found!";
            header('location:firstPage.php');
        }
        else{
            $row=mysqli_fetch_array($query);
             
            if (isset($_POST['remember'])){
                //set up cookie
                setcookie("user", $row['user_name'], time() + (86400 * 30)); 
                setcookie("pass", $row['user_password'], time() + (86400 * 30)); 
            }
             
            $_SESSION['id']=$row['user_id'];
            header('location:index.php');
        }
    }
    else{
        header('location:index.php');
        $_SESSION['message']="Please Login!";
    }
?>