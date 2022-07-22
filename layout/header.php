<?php 
$data=getCategories();
?>
<header>
    <div class="topheader">
        <div>
            <a href="/index.php" class="headerlogo"><img src="/images/LogoSample.jpg" alt="Tapaper logo"></a>
        </div>
        <div>
        <?php 
        if($_SESSION['login']=='OK'){
            echo '<a href="/supportfiles/logout.php" class="loginbutton">Wyloguj</a>';
        }else{
            echo '<a href="/Login.php" class="loginbutton">Zaloguj</a>';
        }
        ?>
        </div>
    </div>
    <div class="categoriescontainer">
        <?php
        foreach($data as $value){
            echo "<a href='/category.php?id=$value[0]' class='category'>$value[2]</a>";
        }
        ?>
    </div>
    <?php
    if($_SESSION['login']=='OK'){
        echo 
        '<div class="categoriescontainer admincontainer">
            <a href="/adminpanel/wallpaperlist.php" class="category adminbutton">Lista tapet</a>
            <a href="/adminpanel/categorylist.php" class="category adminbutton">Lista kategorii</a>
            <a href="/adminpanel/userlist.php" class="category adminbutton">Lista użytkowników</a>
        </div>';
    }?>
    
</header>