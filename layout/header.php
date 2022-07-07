<header>
    <div class="topheader">
        <div>
            <a href="index.php" class="headerlogo"><img src="images/LogoSample.jpg" alt="Tapaper logo"></a>
        </div>
        <div>
        <?php 
        if($_SESSION['login']=='OK'){
            echo '<a href="#" class="loginbutton">Panel Administracyjny</a>';
        }
        
        if($_SESSION['login']=='OK'){
            echo '<a href="Logout.php" class="loginbutton">Wyloguj</a>';
        }else{
            echo '<a href="Login.php" class="loginbutton">Zaloguj</a>';
        }
        ?>
        </div>
    </div>
    <div class="categoriescontainer">
        <a href="/category.php" class="category">Kategoria</a>
        <a href="/category.php" class="category">Kategoria</a>
        <a href="/category.php" class="category">Kategoria</a>
        <a href="/category.php" class="category">Kategoria</a>
        <a href="/category.php" class="category">Kategoria</a>
        <a href="/category.php" class="category">Kategoria</a>
    </div>
</header>