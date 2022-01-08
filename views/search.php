<?php 
    include '../defaults/header.php';
    include '../includes/search-food.inc.php';

    echo '<title>Searching for '.$_GET['search'].'</title>'
?>
<link rel="stylesheet" href="../styles/items.css">
<link rel="stylesheet" href="../styles/search.css">

<body>
    <?php
        include '../defaults/navbar.php';
    ?>
    <div class="offset">
        <div id="body">
            
            <div id="section">
                <?php include '../defaults/bg.php'?>
                <div class="container">
                    <h2>Search for recipes</h2>

                    <div class="search-form">
                        <form action="../views/search.php" method="GET">
                            <input class="search" name="search" type="text" placeholder="Search">
                        </form>
                    </div>

                    <div class="items-container">
                        
                        <!-- Results go here -->
                        
                    </div>
                </div>
            </div>

            <?php 
                include '../defaults/footer.php';
            ?>

        </div>
    </div>
</body>
<script src="../scripts/search-icons.js"></script>
</html>