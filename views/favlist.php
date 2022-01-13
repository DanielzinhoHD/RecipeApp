<?php
    include '../defaults/header.php';
    include '../includes/functions.inc.php';
    include '../includes/dbh.inc.php';
?>
<link rel="stylesheet" href="../styles/favs.css">
<link rel="stylesheet" href="../styles/items.css">

<body>
    <?php 
        include '../defaults/navbar.php';

        if(!isset($_SESSION['id'])){
            header('location: ../views/loginSignUp.php');
        }else{
            echo "<title>Favorites List - " . $_SESSION['name'] . "</title>";
        };
    ?>
    <div class="offset">
        <div id="body">
            
            <div id="section">
                <?php include '../defaults/bg.php'?>

                <div class="container">
                    <h1>Favorites List</h1>

                    <form action="">
                        <input name="filter" id="filter" type="text" placeholder="Filter favorites">
                    </form>
                    <hr id="horizontal">
                    <div class="favs">

                        <!-- Favs go here -->

                    </div>

                </div>
            </div>

            <?php 
                include '../defaults/footer.php';
            ?>

        </div>
    </div>
</body>
<script src="../scripts/filter-favs.js"></script>
</html>