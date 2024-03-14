<!DOCTYPE html>
<html>
<head>
	<title>Slipknot | Cart</title>
    <base href=<?=$baseUrl?>>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images\icon.png"/>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/custom/style.css">
    <link rel="stylesheet" href="/assets/custom/shop.css"/>
    <link rel="stylesheet" href="/assets/custom/cart.css">
    <script src="main.js"></script>

</head>
<body style="background-size:100%"background="/images\img5.jpg">
    
  <header class="jumbotron">
            <a class="logo" href="/index.php/home"><img class="logo" src="/images\band.png" alt="logo"></a>
            <nav class="nav-left">
                <div class="nav-inner">
                    <ul>
                        <li style= "margin-bottom: 20px">
                            <a href="/index.php/home"> 00. HOME
                            </a>
                        </li>
                        <li>
                            <a href="/index.php/about">
                                01. ABOUT
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <img style="margin-left: 10rem;" src="/images/nona.gif" alt="nonagramm">
            <nav class="nav-right">
                <div class="nav-inner">
                    <ul>
                        <li style= "margin-bottom: 20px">
                            <a href="/index.php/tours">
                                02. TOURS
                            </a>
                        </li>
                        <li>
                            <a href="/index.php/members">
                                04. MEMBERS
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
    </header>
	<div style="display: flex; align-items: center;">
		<div class="backbtn">
			<a href="/index.php/merch"> Back </a>
		</div>
		<!--
        <select class="currency" id="currency" name="currency">
		    <option value="EUR">EUR - &euro;</option>
		    <option value="USD">USD - &dollar;</option>
		</select> 
        -->

		<div class="cart" style="margin-left: 10px;" id="cart" name="cart">
			Cart (<?= $countCartItems ?>)
        </div>
        
    </div>	

    <section class="container" style="margin-top: 10px;" id="cartItems">
        <div style="color: white; font-weight: bold; margin-top: 10px;" class="row">
            <h2>Cart</h2>
        </div>
        <div class="row cartItemHeader">
            <div class="col-12 text-right"> Price
            </div>
        </div>
        <?php foreach ($cartItems as $cartItem): ?>
            <div class="row cartItem">
                <?php include 'cartItem.php'; ?>
            </div>
        <?php endforeach; ?>
        <div class="row">
            <div style="color: red; font-size: 35px;" class="col-12 text-right">
                Subtotal (<?= $countCartItems ?> Item/s): <span class="price">€<?= number_format($cartSum / 100, 2, ",", " ") ?></span>
            </div>
        </div>
        <div style="margin-top: 10px;" class="row">
            <a class="btn btn-primary col-12" disabled> Proceed to checkout </a>
        </div>
    </section>

	<footer>
		<div class="socialmedia">
			<a target="_blank" href="https://open.spotify.com/intl-de/artist/05fG473iIaoy82BF1aGhL8"><img class="spotify" src="/../images/icons/spotify.png" alt="spotify"></a>
			<div class="gap"></div>
			<a target="_blank" href="https://www.youtube.com/channel/UCOJZ1tna8yj8mAEITPkHNCQ"><img class="youtube" src="/../images/icons/youtube.png" alt="youtube"></a>
			<div class="gap"></div>
			<a target="_blank" href="https://twitter.com/slipknot"><img class="twitter" src="/../images/icons/twitter.png" alt="twitter"></a>
			<div class="gap"></div>
			<a target="_blank" href="https://www.facebook.com/slipknot/"><img class="facebook" src="/../images/icons/facebook.png" alt="facebook"></a>
			<div class="gap"></div>
			<a target="_blank" href="https://www.instagram.com/slipknot/"><img class="instagram" src="/../images/icons/instagram.png" alt="instagram"></a>
			<div class="gap"></div>
			<a target="_blank" href="https://music.apple.com/de/artist/slipknot/6907568"><img class="apple" src="/../images/icons/apple.png" alt="apple"></a>
			<div class="gap"></div>
		</div>
		<a style="color:white;" target="_blank" href="https://slipknot1.com/"><p>&copy; 2023 Slipknot</p></a>
		<a style="color:white;" href="impressum.html"><p>Impressum</p></a>
	</footer>
</body>
</html>
