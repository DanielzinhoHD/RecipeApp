<?php 
    include '../defaults/header.php';
?>
<link rel="stylesheet" href="../styles/successful.css">
<title>Account verified!</title>

<body>
    <?php 
        include '../defaults/navbar.php';
        
        if(isset($_SESSION['id'])){
            header('location: ../index.php');
        };
    ?>
    
    <div class="offset">
        <div id="body">
            
            <div id="section">
                <?php include '../defaults/bg.php'?>

                <div class="container">
                    <i class="fas fa-hamburger burguer"></i>
                    <h1>Thank you for verifying your email! You can <a href="./loginSignUp.php">login</a> now!</h1>
                </div>
            </div>

            <?php 
                include './defaults/footer.php';
            ?>

        </div>
    </div>
</body>
</html>