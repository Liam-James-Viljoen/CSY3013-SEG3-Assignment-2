<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

			<h2>Accounts</h2>

			<a class="new" href="/admin/editAccounts">Add new account</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Username</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';


			foreach ($user as $users) {
				echo '<tr>';
				echo '<td>' . $users['username'] . '</td>';
				echo '<td><a style="float: right" href="/admin/editAccounts?id=' . $users['id_admin_acounts'] . '">Edit</a></td>';
				echo '<td><form method="post" action="/admin/deleteAccounts">
				<input type="hidden" name="id" value="' . $users['id_admin_acounts'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';
  ?>
</section>
<?php
}else{
  header('location: /admin/login');
}
?>
