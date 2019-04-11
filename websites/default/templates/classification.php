<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

			<h2>Classification</h2>

			<a class="new" href="editClassification">Add new classification</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Classification Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';


			foreach ($classifications as $classification) {
				echo '<tr>';
				echo '<td>' . $classification['classification_name'] . '</td>';
				echo '<td><a style="float: right" href="editClassification?id_classifications=' . $classification['id_classifications'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deleteClassification">
				<input type="hidden" name="id_classifications" value="' . $classification['id_classifications'] . '" />
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
