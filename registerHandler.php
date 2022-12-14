<?php
    function sanitizeFormPassword($inputText) {
        $inputText = strip_tags($inputText);
        return $inputText;
    }

    function sanitizeFormUsername($inputText){
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

    function sanitizeFormString($inputText){
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        $inputText = ucfirst(strtolower($inputText));
        return $inputText;
    }

    if(isset($_POST['registerButton'])){
    
        $username = sanitizeFormUsername($_POST['logInUsername']);
        $firstName = sanitizeFormString($_POST['firstName']);
        $lastName = sanitizeFormString($_POST['lastName']);
        $email = sanitizeFormString($_POST['email']);
        $password = sanitizeFormPassword($_POST['logInPassword']);
        $password2 = sanitizeFormPassword($_POST['password2']);

        $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $password, $password2);

        if($wasSuccessful == true){
            $_SESSION['userLoggedIn'] = $username;
            header("Location: index.php");
        }
    }
?>