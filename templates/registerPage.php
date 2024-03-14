<!DOCTYPE html>
<html>
<head>
    <title>Slipknot | Register</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../images\icon.png" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/custom/style.css" />
    <link rel="stylesheet" href="../assets/custom/shop.css" />
    <link rel="stylesheet" href="../assets/custom/login.css" />

    <script src="main.js"></script>
</head>
<body style="background-size:100%" background="../images\img5.jpg">

    <header class="jumbotron">
        <a class="logo" href="index.php/home"><img class="logo" src="../images\band.png" alt="logo" /></a>
        <nav class="nav-left">
            <div class="nav-inner">
                <ul>
                    <li style="margin-bottom: 20px">
                        <a href="index.php/home"> 00. HOME
                        </a>
                    </li>
                    <li>
                        <a href="/about"> 01. ABOUT
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <img style="margin-left: 10rem;" src="../images/nona.gif" alt="nonagramm" />
        <nav class="nav-right">
            <div class="nav-inner">
                <ul>
                    <li style="margin-bottom: 20px">
                        <a href="/tours"> 02. TOURS
                        </a>
                    </li>
                    <li>
                        <a href="/members"> 04. MEMBERS
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <div>
      <?php include 'form_register.php' ?>
    </div>

</body>
</html>
