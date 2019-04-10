<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

	<?php


	if (isset($_POST['submit'])) {
		echo 'Category Saved';
	}else {
		?>
			<h2>Edit Sub-Category</h2>

			<form action="editSubcategories" method="POST">

				<input type="hidden" name="subcategory[id_sub_categories]" value="<?php echo $subcategory['id_sub_categories']; ?>" />

				<label>Sub-Category Name</label>
				<input type="text" name="subcategory[sub_category_name]" value="<?php echo $subcategory['sub_category_name']; ?>" />

				<label>Category</label>
				<Select name="subcategory[id_categories_sub_categories]">
				<?php
				foreach ($categories as $category){ if ($subcategory['id_categories_sub_categories'] == $category['id_categories']){ ?>
						<option selected="selected" value="<?=$category['id_categories'] ?? ''?>"><?=$category['categories_name'] ?? ''?></option>
					<?php } else { ?>
						<option value="<?=$category['id_categories'] ?? ''?>"><?=$category['categories_name'] ?? ''?></option>
				<?php } } ?>
				}}
				</select>

				<input type="submit" name="submit" value="Save Category" />

			</form>
<?php
	}
?>
</section>
<?php
}else{
  header('location: login');
}
?>
