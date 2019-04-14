<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

			<h2>Subcategory</h2>

			<a class="new" href="editSubcategories">Add new Subcategory</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Subcategory Name</th>';
			echo '<th>Category Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';


			foreach ($subcategories as $subcategory) {
				echo '<tr>';
				echo '<td>' . $subcategory['sub_category_name'] . '</td>';

        foreach ($categories as $category){
          if ($category['id_categories'] == $subcategory['id_categories_sub_categories']){
            echo '<td>' . $category['categories_name'] . '</td>';
          }
        }

				echo '<td><a style="float: right" href="editSubcategories?id_sub_categories=' . $subcategory['id_sub_categories'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deleteSubcategories">
				<input type="hidden" name="id_sub_categories" value="' . $subcategory['id_sub_categories'] . '" />
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
