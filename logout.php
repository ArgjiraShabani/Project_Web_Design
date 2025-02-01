/<?php
/*session_start();  
if(isset($_SESSION['Email'])){
session_destroy();

header("Location: login.php");
}else{
    header('Location:login.php');
}*/

?>

<?php
    session_start();
    $_SESSION=[];
    session_destroy();

    if(isset($_COOKIE['login'])){
        setcookie('login','',time()-3600,'/');
    }

    header('Location: login.php');
    exit();
?>