<?php
    include("includes/config.php");
    include("Includes/Classes/Account.php");
    include("Includes/Classes/Constants.php");

    $account = new Account($con);    
    
    include("Includes/Handlers/registerHandler.php");
    include("Includes/Handlers/loginHandler.php");

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
?>
<html>
<head>
    <title>Welcome to Slopify</title>
    <link rel="stylesheet" type="text/css" href="Assets/Css/login.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
    <script src="Assets/Js/login.js"></script>
</head>
<body>
    <?php
        if(isset($_POST['registerButton'])){
            echo '<script>
                    $(document).ready(function() {
                        $("#loginForm").hide();
                        $("#registerForm").show();
                    });
                </script>';
        }
        else{
            echo '<script>
                    $(document).ready(function() {
                        $("#loginForm").show();
                        $("#registerForm").hide();
                    });
                </script>';
        }
    ?>    
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="login.php" method="POST">
                    <h2>Log in to your account</h2>
                <p>
                    <?php echo $account->getError(Constants::$loginFailed)?>
                    <label for="logInUsername">Username: </label>
                    <input type="text" class="logInUsername" name="logInUsername" value="<?php getInputValue('logInUsername') ?>" placeholder="e.g. bartSimpson" required>
                </p>

                <p>
                    <label for="logInPassword">Password: </label>
                    <input type="password" class="logInPassword" name="logInPassword" placeholder="Your password" required>
                </p>

                    <button type="submit" name="logInButton">LOG IN</button>

                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet? Signup here.</span>
                    </div>
                </form>

                <form id="registerForm" action="login.php" method="POST">
                    <h2>Log in to your account</h2>
                <p>
                    <?php echo $account->getError(Constants::$usernameCharacters)?>
                    <?php echo $account->getError(Constants::$usernameTaken)?>
                    <label for="logInUsername">Username: </label>
                    <input type="text" class="logInUsername" name="logInUsername" value="<?php getInputValue('logInUsername') ?>" placeholder="e.g. bartSimpson" required>
                </p>

                <p>
                    <?php echo $account->getError(Constants::$firstNameCharacters)?>
                    <label for="firstName">First name: </label>
                    <input type="text" id="firstName" name="firstName" value="<?php getInputValue('firstName') ?>" placeholder="e.g. Bart" required>
                </p>

                <p>
                    <?php echo $account->getError(Constants::$lastNameCharacters)?>
                    <label for="lastName">Last name: </label>
                    <input type="text" id="lastName" name="lastName" value="<?php getInputValue('lastName') ?>" placeholder="e.g. Simpson" required>
                </p>

                <p>
                    <?php echo $account->getError(Constants::$emailInvalid)?>
                    <?php echo $account->getError(Constants::$emailTaken)?>
                    <label for="email">Email: </label>
                    <input type="email" id="email" name="email" value="<?php getInputValue('email') ?>" placeholder="e.g. bart@gmail.com" required>
                </p>

                <p>            
                    <?php echo $account->getError(Constants::$passwordsDoNotMatch)?>
                    <?php echo $account->getError(Constants::$passwordNotAlphanumeric)?>
                    <?php echo $account->getError(Constants::$passwordsDoNotMatch)?>
                    <label for="logInPassword">Password: </label>
                    <input type="password" class="logInPassword" name="logInPassword" placeholder="Your password" required>
                </p>

                <p>
                    <label for="password2">Confirm password: </label>
                    <input type="password" id="password2" name="password2" placeholder="Your password" required>
                </p>

                <button type="submit" name="registerButton">SIGN UP</button>

                <div class="hasAccountText">
                     <span id="hideRegister">Already have an account? Login here.</span>
                </div>
                </form>
            </div>
                <div id="loginText">
                    <h1>Get great music, right now</h1>
                    <h2>Listen to loads of songs for free!</h2>
                    <ul>
                        <li>Discover music you'll fall in love with</li>
                        <li>Create your own playlists</li>
                        <li>Follow your favourite artists</li>
                    </ul>
                </div>
        </div>
    </div>
</body>
</html>