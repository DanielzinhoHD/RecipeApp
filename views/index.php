<?php include '../defaults/header.php';?>
<link rel="stylesheet" href="~/styles/index.css">
<title>Home</title>

<body>
    <?php 
        include '../defaults/navbar.php';
    ?>

    <div class="offset">
        <div id="body">
            
            <div class="first-section">
                <div id="first-img"></div>
                <div class="first-block">
                    <div class="first-text">
                        Create your own <span class="red">account</span> now and add recipes into your <span class="purple">favorites</span>!
                    </div>
                    <button type="button" class="first-btn" onclick="location.href='/loginSignUp.php?signup'">Enter</button>
                    
                </div>
                <a class="first-arrow" href="#second-img"><i class="fas fa-chevron-down"></i></a>
            </div>
            
            <div class="line" id="first-line"></div>

            <div class="second-section">
                <div id="second-img"></div>
                <div class="second-block">
                    <div class="second-text">
                        <span class="green">Random</span> food and <span class="pink">how to do</span> them!
                    </div>
                    <form action="">
                        <button type="button" class="second-btn" onclick="location.href='../includes/random-food.inc.php'">I wanna see one!</button>
                    </form>
                </div>
                <a class="second-arrow" href="#third-img"><i class="fas fa-chevron-down"></i></a>
            </div>

            <div class="line" id="second-line"></div>

            <div class="third-section">
                <div id="third-img"></div>
                <div class="third-block">
                    <div class="third-text">
                        <span class="blue">Search</span> for recipes through their main <span class="red">ingredients</span>!
                    </div>
                    <form action="">
                        <button type="button" class="third-btn">Find out</button>
                    </form>
                </div>
            </div>

            <?php 
                include '../defaults/footer.php';
            ?>
        </div>
    </div>
</body>
<script src="../scripts/index.js"></script>
</html>