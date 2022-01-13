<?php 
    if(isset($_SESSION['id'])){
        header('location: ../views/index.php');
    };
?>

<!DOCTYPE html>
<html lang="en">
<?php 
    include '../defaults/header.php';
?>
    <link rel="stylesheet" href="../styles/successful.css">
    <title>Account created!</title>
</head>
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
                    <h1>Thank you for registering! We have sent an email verification to the address provided!</h1>
                </div>
            </div>

            <?php 
                include '../defaults/footer.php';
            ?>

        </div>
    </div>
</body>
</html>