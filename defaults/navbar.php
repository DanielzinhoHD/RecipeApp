<?php 
    session_start();
?>

<header>
    <nav>
        <div class="menu-icon">
            <a href="../index.php"><i class="fas fa-pizza-slice"></i></a>
        </div>
        <ul>
            <li>
                <a href="../index.php">Home</a>
            </li>
            <li>
                <label for="contact">Contact</label>
                <input type="checkbox" id="contact">
                
                <div class="dropdown">
                    <a id="copy-email">Click to Copy Email</a>
                    <div id="contact-icons">
                        <a href="https://github.com/DanielzinhoHD" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/christian-daniel-gomes/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </li>
            <li>
                <label for="get-recipe">Get Recipe</label>
                <input type="checkbox" id="get-recipe">
                <div class="dropdown">
                    <a href="../includes/random-food.inc.php">Random Food</a>
                    <a id="nav-search">Search</a>
                </div>
            </li>
            <?php
            if(isset($_SESSION['id'])){
                echo '<li>
                        <label for="user-nav">' . $_SESSION['name'] . '</label>
                        <input type="checkbox" id="user-nav">
                        <div class="dropdown">
                            <a href="../views/favlist.php">Favorites List</a>
                            
                            <a href="../includes/logout.inc.php">Logout</a>
                        </div>
                    </li>';
            }else{
                echo '<li>
                        <a href="../views/loginSignUp.php">Enter</a>
                    </li>';
            }
        ?>
        </ul>
        <div class="bars">
            <i class="fa fa-bars"></i>
        </div>
    </nav>
</header>
