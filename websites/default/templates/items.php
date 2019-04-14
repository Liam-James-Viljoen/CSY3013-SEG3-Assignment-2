<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

			<h2>Items</h2>

			<a class="new" href="editItems">Add new item</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Item Name</th>';
			echo '<th>Classification</th>';
			echo '<th>Category</th>';
			echo '<th>Sub-Category</th>';
      echo '<th>Artist Name</th>';
      echo '<th>Year Of Production</th>';
			echo '<th>Estimated Price (£)</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';


			foreach ($items as $item) {
				echo '<tr>';
				echo '<td>' . $item['item_name'] . '</td>';
				echo '<td>' . $item['classification'] . '</td>';

				foreach ($categories as $category) {
					if ($category['id_categories'] == $item['category']){
						echo '<td>' . $category['categories_name'] . '</td>';
					}
				}

				foreach ($subcategories as $subcategory) {
					if ($subcategory['id_sub_categories'] == $item['sub_category']){
						echo '<td>' . $subcategory['sub_category_name'] . '</td>';
					}
				}

				echo '<td>' . $item['artist_name'] . '</td>';
        echo '<td>' . $item['year_of_production'] . '</td>';
        echo '<td>' . $item['estimated_price'] . '</td>';


				echo '<td><a style="float: right" href="editItems?id_items=' . $item['id_items'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deleteItems">
				<input type="hidden" name="id_items" value="' . $item['id_items'] . '" />
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
