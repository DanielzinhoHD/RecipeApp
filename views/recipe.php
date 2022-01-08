<?php
    include '../defaults/header.php';
    include '../includes/food-info.inc.php';
    include '../includes/functions.inc.php';
    include '../includes/dbh.inc.php';

    echo '<title>Recipe - '. getFoodName($meal).'</title>';

?>
<link rel="stylesheet" href="../styles/recipe.css">

<body>
    <?php 
        include '../defaults/navbar.php';
    ?>
    <div class="offset">
        <div id="body">

            <div id="section">
                <div id="img" style="background-image: url(<?php echo getFoodIMG($meal)?>);"></div>
                
                <form id="fav-form" action="../includes/add-fav.inc.php" method="POST">
                    
                    <?php
                        $userID;
                        if(isset($_SESSION['id'])){
                            $userID = $_SESSION['id'];
                        }else{
                            $userID = false;
                        }

                        if(isset($_GET['mealID'])){
                            if($userID){
                                $recipeID = $_GET['mealID'];
    
                                if(alreadyAdded($conn, $userID, $recipeID) !== false){
                                    echo '<button value='. getFoodID($meal).' class="fav" type="button">Remove from favorites <i class="fas fa-star"></i></button>';
                                }else{
                                    echo '<button value='. getFoodID($meal).' class="fav" type="button">Add to favorites <i class="far fa-star"></i></button>';
                                }
                            }
                        }else{
                            header("location: ../views/index.php");
                        }                    
                    ?>
                </form>

                <div class="recipe-container">
                        <div class="name">
                            <?php echo getFoodName($meal);?>
                        </div>
                        <p>
                            <?php if(getYoutubeLink($meal)){
                                echo '<a class="link" target="_blank" href=' . getYoutubeLink($meal) . '>Click to watch the youtube video!</a>';
                            }?>
                        </p>
                        <hr id="horizontal">
                        <div class="recipe">
                            <div class="ingredients">
                                <h3>Ingredients:</h3>
                                <?php getFoodIngredients($meal);?>
                            </div>
                        <hr id="vertical">
                            <div class="steps">
                                <h2>How to do:</h2>
                                <?php echo "<p>" . getFoodInstructions($meal) . "</p>"?>
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
<script src="../scripts/recipe.js"></script>
</html>