<?php 
require __DIR__ . "../../functions/db.php";
$data=DBArrayQuery("Select * from kategoria;");
?>
<header>
    <div class="topheader">
        <div>
            <a href="/index.php" class="headerlogo"><img src="/images/LogoSample.jpg" alt="Tapaper logo"></a>
        </div>
        <div>
        <?php 
        if($_SESSION['login']=='OK'){
            echo '<a href="#" class="loginbutton">Panel Administracyjny</a>';
        }
        
        if($_SESSION['login']=='OK'){
            echo '<a href="/Logout.php" class="loginbutton">Wyloguj</a>';
        }else{
            echo '<a href="/Login.php" class="loginbutton">Zaloguj</a>';
        }
        ?>
        </div>
    </div>
    <div class="categoriescontainer">
        <?php
        foreach($data as $value){
            echo "<a href='/category.php?id=$value[0]' class='category'>$value[1]</a>";
        }
        ?>
    </div>
</header>