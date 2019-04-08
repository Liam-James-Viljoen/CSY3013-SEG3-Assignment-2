<?php session_start();?>
	<main class="admin">

	<?php
	if (isset($_POST['submit'])) {
		foreach ($accounts as $account) {
			if ($_POST['username'] == $account['username'] && password_verify($_POST['password'], $account['password'])){
				$_SESSION['loggedin'] = true;
			}
		}
	}


	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		require 'adminNavigation.html';
	?>


	<section class="right">

	<h2>You are now logged in</h2>
	</section>
	<?php
	}

	else {
		?>
		<h2>Log in</h2>

		<form action="/admin/login" method="post" style="padding: 40px">
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
