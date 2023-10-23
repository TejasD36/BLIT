<?php
    $connection = mysqli_connect("localhost", "root", "", "task1") or die("Database is not connected." . mysqli_connect_error());
    $query='<table style="border-collapse: collapse; width: 100%; margin: 0 auto;text-align left">';

    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd'])) {
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        
        // Check if it's an admin login
        $sql1 = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $result1 = mysqli_query($connection, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            header('Location: admin.php');
            exit();
        } else {
            // Debugging output
            echo 'Admin login query: ' . $sql1 . '<br>';
        }
    
        $password = md5($password);
        // Check if it's a user login
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            header('Location: welcome.html');
            exit();
        } else {
            $query=$query.'<tr><th>Login Failed</th></tr>
            ';
        }
    } else {
        $query=$query.'<tr><th> Email and Password Invalid </tr></th>
            ';
    }

    if(isset($query)){
        $query=$query.'<tr><th><form action="register.html" method="POST"><input type="submit" value="Retry"></form></th></te></table>';
        echo($query);
    }
?>
