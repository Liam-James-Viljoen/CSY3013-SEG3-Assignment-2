<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>


<section class="right">

			<h2>Add/Edit Acount</h2>


			<form action="editAccount" method="POST">

				<input type="hidden" name="user[id_admin_acounts]" value="<?php echo $user['id_admin_acounts']; ?>" />
				<label>Username</label>
				<input type="text" name="user[username]" value="<?php echo $user['username']; ?>" />
        <label>Password</label>
				<input type="password" name="user[password]" value="" />


				<input type="submit" name="submit" value="Save Account" />
			</form>

</section>
<?php
}else{
  header('location: login');
}

?>
