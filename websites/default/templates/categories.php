<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

			<h2>Categories</h2>

			<a class="new" href="editCategories">Add new category</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Category Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';


			foreach ($categories as $category) {
				echo '<tr>';
				echo '<td>' . $category['categories_name'] . '</td>';
				echo '<td><a style="float: right" href="editCategories?id_categories=' . $category['id_categories'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deleteCategories">
				<input type="hidden" name="id_categories" value="' . $category['id_categories'] . '" />
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
