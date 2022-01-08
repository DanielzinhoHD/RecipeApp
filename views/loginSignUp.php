<?php 
    if(isset($_SESSION['id'])){
        header('location: ../views/index.php');
    };

    include '../defaults/header.php';
?>
<link rel="stylesheet" href="../../RecipeApp/styles/login-signup.css">
<title>Joining RecipeApp</title>

<body>
    <?php 
        include '../defaults/navbar.php';
    ?>
    
    <div class="offset">
        <div id="body">
            
            <div id="login-signup">
                <?php include '../defaults/bg.php'?>
                <div class="container">
                    <div class="text-box">
                        <div class="title login">Login</div>
                        <div class="title signup">SignUp</div>
                    </div>
                    <div class="form-container">
                        <div class="form-inner">
                            <form action="../includes/login.inc.php" class="form-login" method="POST">
                            <!-- Logging In here -->
                                <div class="field">
                                    <input name="l-email" type="text" placeholder="Email Address" required>
                                </div>

                                <div class="field">
                                    <input name="l-pwd" type="password" placeholder="Password" required>
                                </div>

                                <!-- Error messages -->
                                <span id="error-msg-login"></span>
                                
                                <div class="field">
                                    <input name="login" type="submit" value="Login">
                                </div>
                                
                                <div class="login-link">Not a member? <a href="" id="signup">Sign up now!</a></div>
                            </form>
                        <!-- Registering here -->
                            <form action="../includes/register.inc.php" class="form-signup" method="POST">
                                
                                <div class="field">
                                    <input name="r-name" type="text" placeholder="Name" >
                                </div>
                                <div class="field">
                                    <input name="r-email" type="email" placeholder="Email Address" >
                                </div>
                                                               

                                <div class="field">
                                    <input name="r-pwd" type="password" placeholder="Password" >
                                </div>
                                <div class="field">
                                    <input name="r-pwd2" type="password" placeholder="Confirm password" >
                                </div>

                                <!-- Error messages -->
                                <span id="error-msg-signup"></span>

                                <div class="field">
                                    <input name="signup" type="submit" value="Sign Up">
                                </div>
                                
                                <div class="signup-link">Already have an account? <a href="" id="login">Log in now!</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
                include '../defaults/footer.php';
            ?>

        </div>
    </div>
</body>
<script src="../scripts/login-signup.js"></script>
<script src="../scripts/create-account.js"></script>
<script src="../scripts/login-account.js"></script>
</html>