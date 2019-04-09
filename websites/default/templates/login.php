<?php session_start();?>
	<main class="admin">

	<?php
	if (isset($_POST['submit'])) {
		$returnedUser = $user[0];
		if (password_verify($_POST['password'], $returnedUser['password'])){
			$_SESSION['loggedin'] = true;
			$_SESSION['access_level'] = $returnedUser['access_level'] ;
		}

	}
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	?>


	<section class="right">

	<h2>You are now logged in</h2>
	</section>
	<?php
	}

	else {
		?>
		<h2>Log in</h2>

		<form action="login" method="post" style="padding: 40px">
			<label>Enter Username</label>
			<input type="username" name="username" />

			<label>Enter Password</label>
			<input type="password" name="password" />

			<input type="submit" name="submit" value="Log In" />
		</form>

	<?php
	}
	?>


	</main>
