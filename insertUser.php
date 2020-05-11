<?php include "php/sqlConnection.php"; 

if( isset($_SESSION['login']) )
{
    echo 'Zaten bir hesaba bağlısın.';
    //Header("Location:index.php");
} else
{
    if(isset($_POST['createUser']))
    {
        if( isset($_POST['new_email']) )
        {            
            $name     = $_POST['new_name'];
            $email    = $_POST['new_email'];
            $password = $_POST['new_password'];
            $error = 0;

            if($name == null)     { $_SESSION["error_name"] = 2; $error = 1; }
            if($email == null)    { $_SESSION["error_mail"] = 2; $error = 1; } else 
            {
                $result1 = mysqli_query($con, "SELECT * FROM user WHERE email_address='$email'");
                $result2 = mysqli_query($con, "SELECT * FROM company WHERE email_address='$email'");
                if ((mysqli_num_rows($result1) > 0) || (mysqli_num_rows($result2) > 0))
                {
                    $_SESSION["error_mail"] = 1;
                    $error = 1;
                } else
                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $_SESSION["error_mail"] = 3;
                    $error = 1;
                }
            }
            if($password == null) { $_SESSION["error_pass"] = 2; $error = 1; }

            if($error == 1)
            {
                echo "Bu alanlar boş bırakılamaz.";
                header("Location:kayit_ol.php");
            } else
            {
                $sql = "INSERT INTO user (name, email_address, password) VALUES ('$name', '$email', '$password')";
                $result = mysqli_query($con, $sql);

                if($result)
                {
                    $_SESSION['login'] = 1;
                    $_SESSION['email'] =  $email;
                    $_SESSION['username'] =  $name;
                    echo "başarılı";
                    header("Location:index.php");
                }else
                {
                    echo "Soru eklenemedi.";
                    header("Location:index.php");
                }
            }
            

        }else{
            echo 'failed';
            setError("Failed to get post values");
            //Header("Location:index.php");
        }
    }
}

?>