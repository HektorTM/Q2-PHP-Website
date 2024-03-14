<?php
		
		$id = $_SESSION['userId'];
		$username = $_SESSION['username'];
		
		?>
		
		
		<div class="logged_in">
		    Logged in as: <?= $username ?> #<?= $id ?>
		</div>