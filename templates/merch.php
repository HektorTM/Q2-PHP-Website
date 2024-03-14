<?php
session_start();

//$conn = getDB();
//
//$postuser = $_POST["username"];
//$postpassword = $_POST["pw"];
//
//$strSQL = "SELECT * FROM users";
//
//$rs = mysqli_query($conn, $strSQL);
//$row = mysqli_fetch_array($rs);
//
//$user = $row['username'];
//$password = $row['password'];

if (isset($_SESSION['userId'])) {

} else {
    //if ($postpassword === $password) {
    //    $userId = $row['userId'];
    //    $_SESSION['userId'] = $userId;
    //    $_SESSION['username'] = $user;
    //    setcookie('userId', $userId, strtotime('+30 days'));
    //}



    if ($_POST["username"] == "Admin" && $_POST["pw"] == "12345") {
        $userId = 0;
        $_SESSION["userId"] = $userId;
        $_SESSION["username"] = "Admin";
        //setcookie('username', "Admin", strtotime('+30 days'));
        setcookie('userId', $userId, strtotime('+30 days'));
        header("Location: /index.php/merch");
    }else if ($_POST["username"] == "Max" && $_POST["pw"] == "password") { 
        $userId = 1;
        $_SESSION["Login"] = "YES";
        $_SESSION["userId"] = $userId;
        $_SESSION["username"] = "Max";
        setcookie('userId', $userId, strtotime('+30 days'));
        header("Location: /index.php/merch");
        //setcookie('username', "Max", strtotime('+30 days'));
    }else if ($_POST["username"] == "Paul" && $_POST["pw"] == "666") {
        $userId = 3;
        $_SESSION["Login"] = "YES";
        $_SESSION["userId"] = $userId;
        $_SESSION["username"] = "Paul";
        setcookie('userId', $userId, strtotime('+30 days'));
        //setcookie('username', "Paul", strtotime('+30 days'));
        header("Location: /index.php/merch");
    } else {
        $_SESSION["Login"] = "NO";
        header("Location: /index.php/login");
    }
}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Slipknot | Merch</title>
    <base href=<?= $baseUrl ?>>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="images/icon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/custom/style.css"/>
    <link rel="stylesheet" href="/assets/custom/shop.css" />
    <link rel="stylesheet" href="/assets/custom/cart.css" />
    <link rel="stylesheet" href="/assets/custom/logout.css" />

    <script src="main.js"></script>
</head>
<body style="background-size:100%" background="/images\img5.jpg">

    <header class="jumbotron">
        <a class="logo" href="/index.php/home"><img class="logo" src="images/band.png" alt="logo" /></a>
        <nav class="nav-left">
            <div class="nav-inner">
                <ul>
                    <li style="margin-bottom: 20px">
                        <a href="/index.php/home">    HOME
                        </a>
                    </li>
                    <li>
                        <a href="/index.php/about">    ABOUT
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <img style="margin-left: 10rem;" src="images/nona.gif" alt="nonagramm" />
        <nav class="nav-right">
            <div class="nav-inner">
                <ul>
                    <li style="margin-bottom: 20px">
                        <a href="/index.php/tours">    TOURS
                        </a>
                    </li>
                    <li>
                        <a href="/index.php/members">    MEMBERS
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div style="display: flex;">
        <?php if (isLoggedIn()) {
            include 'loggedin.php';
        } ?>
        
        <button class="Btn" style="margin-left: 20px;">
            <div class="sign"><svg viewbox="0 0 512 512">
                <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1
                        20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7
                        0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7
                        14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24
                        9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64
                        0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0
                        75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
            <div class="text">
                <a style="text-decoration: none; color: white;" href="/index.php/logout">Logout</a>
            </div>
        </button>

        <a href="/index.php/cart">
            <button data-quantity="<?= $countCartItems ?>" class="btn-cart">
                <span class="quantity"></span>
                <svg class="icon-cart" viewbox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
                    <title>icon-cart</title>
                    <path transform="translate(-3.62 -0.85)" d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
                </svg>

                
            </button>
        </a>

    </div>

    
    <!--
    <div style="display: flex; align-items: center;">
        
        <select class="currency_shop" id="currency" name="currency">
            <option value="EUR">EUR - &euro;</option>
            <option value="USD">USD - &dollar;</option>
        </select>
        
    </div>
    -->
    <div style="display: flex; margin-left: 69%; margin-botton: 30px;">
        
    </div>
    <section class="container" style="margin-top: 10px;" id="products">
        <div class="row">
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <div class="col">
                    <?php include 'card.php' ?>
                </div>
            <?php endwhile; ?>
        </div>



    </section>

    <footer>
        <div class="socialmedia">
            <a target="_blank" href="https://open.spotify.com/intl-de/artist/05fG473iIaoy82BF1aGhL8"><img class="spotify" src="images/icons/spotify.png" alt="spotify" /></a>
            <div class="gap"></div>
            <a target="_blank" href="https://www.youtube.com/channel/UCOJZ1tna8yj8mAEITPkHNCQ"><img class="youtube" src="images/icons/youtube.png" alt="youtube" /></a>
            <div class="gap"></div>
            <a target="_blank" href="https://twitter.com/slipknot"><img class="twitter" src="images/icons/twitter.png" alt="twitter" /></a>
            <div class="gap"></div>
            <a target="_blank" href="https://www.facebook.com/slipknot/"><img class="facebook" src="images/icons/facebook.png" alt="facebook" /></a>
            <div class="gap"></div>
            <a target="_blank" href="https://www.instagram.com/slipknot/"><img class="instagram" src="images/icons/instagram.png" alt="instagram" /></a>
            <div class="gap"></div>
            <a target="_blank" href="https://music.apple.com/de/artist/slipknot/6907568"><img class="apple" src="images/icons/apple.png" alt="apple" /></a>
            <div class="gap"></div>
        </div>
        <a style="color:white;" target="_blank" href="https://slipknot1.com/"><p>&copy; 2023 Slipknot</p></a>
        <a style="color:white;" href="/index.php/impressum"><p>Impressum</p></a>
    </footer>
</body>
</html>
