/<?php

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