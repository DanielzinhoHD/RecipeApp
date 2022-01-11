<?php 
    session_start();
?>

<header>
    <ul>
        <li>
            <a href="../views/index.php"><i class="fas fa-pizza-slice"></i></a>
        </li>
        <li>
            <a href="../views/index.php">Home</a>
        </li>
        <li>
            <a>Contact</a>
            <div class="dropdown">
                <a id="copy-email">Click to Copy Email</a>
                <div id="contact-icons">
                    <a href="https://github.com/DanielzinhoHD" target="_blank"><i class="fab fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/christian-daniel-gomes/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </li>
        <li>
            <a href="../includes/random-food.inc.php">Random Food</a>
            <div class="dropdown">
                <a id="nav-search">Search</a>
            </div>
        </li>
        <?php
        if(isset($_SESSION['id'])){
            echo '<li>
                    <a>' . $_SESSION['name'] . '</a>
                    <div class="dropdown">
                        <a href="/favlist.php">Favorites List</a>
                        
                        <a href="../includes/logout.inc.php">Logout</a>
                    </div>
                </li>';
        }else{
            echo '<li>
                    <a href="/loginSignUp.php">Login</a>
                </li>';
            echo '<li>
                    <a href="/loginSignUp.php?signup">Sign Up</a>
                </li>';
        }
    ?>
    </ul>
</header>