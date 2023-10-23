
<?php

    $connection = mysqli_connect("localhost","root","","task1") or die("Database is not connected.".mysqli_connect_error());
    $query='<table style="border-collapse: collapse; width: 100%; margin: 0 auto;text-align left">';
    
    if(isset($_POST['name']) && !empty($_POST['name'])){
        if(preg_match('/^[A-Za-z\s]+$/',$_POST['name'])){
            $name = $_POST['name'];
        }else{
            $query=$query.'<tr><th>Name Invalid</th></tr>
            ';

        }

    }else{
        $query=$query.'<tr><th>Name Invalid</th></tr>
        ';
    }

    if(isset($_POST['mn']) && !empty($_POST['mn'])){
        if(preg_match('/^[0-9]{10}$/',$_POST['mn'])){
            $mob_no = $_POST['mn'];
        }else{
            $query=$query.'<tr><th>Mobile Number Invalid</th></tr>
            ';

        }

    }else{
        $query=$query.'<tr><th>Mobile Number Invalid</th></tr>
        ';
    }

    if(isset($_POST['age']) && !empty($_POST['age'])){
        if(preg_match('/^[0-9]+$/',$_POST['age'])){
            $age = $_POST['age'];
        }else{
            $query=$query.'<tr><th>Age Invalid</th></tr>
            ';
        }

    }else{
        $query=$query.'<tr><th>Age Invalid</th></tr>
        ';
    }

    if(isset($_POST['email']) && !empty($_POST['email'])){
        if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$_POST['email'])){
            $check_email = $_POST['email'];
			$sql = "SELECT email FROM user WHERE email='$check_email'";
            $result = mysqli_query($connection,$sql);
				if(mysqli_num_rows($result)>0){
					$query=$query.'<tr><th>Email Already Exists
                    ';
				}else{
				$email = $_POST['email'];
			}
        }else{
            $query=$query.'<tr><th>Email Invalid</th></tr>
            ';
        }

    }else{
        $query=$query.'<tr><th>Email Invalid</th></tr>
        ';
    }

    if(isset($_POST['pwd']) && !empty($_POST['pwd'] && isset($_POST['cpwd']) && !empty($_POST['pwd'])))
        if(preg_match('/^(?=.*[A-Z]).{8,}$/',$_POST['pwd'])){
            if($_POST['pwd']==$_POST['cpwd']){
                $password = $_POST['pwd'];
                $password = md5($password);
            }else{
                $query=$query.'<tr><th>Password and Confirm Password Does not match
                ';
            }
        }else{
            $query=$query.'<tr><th>Password Invalid</th></tr><tr><td>Password must contain 1 capital letter<br>More than 8 Letters</tr></td>
            ';
        }

    

    if(isset($name) && isset($mob_no) && isset($age) && isset($email) && isset($password)){

        $name=strtolower($name);
        $sql = "INSERT INTO user (name,mob_no,age,email,password) VALUES('$name','$mob_no','$age','$email','$password')";

        if(mysqli_query($connection,$sql)){
            header("Location:login.html");
        }else{
            $query=$query.'<tr><th> Oops Data not inserted! Try again </tr></th>
            ';
        }
    }

    if(isset($query)){
        $query=$query.'<tr><th><form action="register.html" method="POST"><input type="submit" value="Retry"></form></th></te></table>';
        echo($query);
    }

?>