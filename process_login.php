<?php 
    session_start();
    include('config.php');


    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
    

        if (count($errors) == 0) {
            $password = md5($password);
            $sql = "SELECT * FROM tb_member WHERE m_user = '$username' AND m_pass = '$password' ";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_array($query);

            if (!mysqli_num_rows($result) == 1) {
                $_SESSION['m_user'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
            } else {
                array_push($errors, "Wrong username/password combinattion");
                $_SESSION['error'] = "Wrong username or password try again!";
                header("location: login.php");
            }
        
        }
    }

?>