<?php
    if(isset($_POST['logInButton'])){
        $username = $_POST['logInUsername'];
        $password = $_POST['logInPassword'];

        $result = $account->login($username, $password);
        
        if($result == true){
            $_SESSION['userLoggedIn'] = $username;
            header("Location: index.php");
        }
    }
?>
