<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

			<h2>Accounts</h2>

			<a class="new" href="editAccount">Add new account</a>

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
				echo '<td><a style="float: right" href="editAccount?id_admin_acounts=' . $users['id_admin_acounts'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deleteAccount">
				<input type="hidden" name="id_admin_acounts" value="' . $users['id_admin_acounts'] . '" />
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
  header('location: login');
}
?>
