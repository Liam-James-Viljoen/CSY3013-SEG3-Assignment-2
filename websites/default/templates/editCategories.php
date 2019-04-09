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
			<h2>Edit Category</h2>

			<form action="/admin/editCategories" method="POST">

				<input type="hidden" name="category[id]" value="<?php echo $category['id']; ?>" />
				<label>Name</label>
				<input type="text" name="category[name]" value="<?php echo $category['name']; ?>" />


				<input type="submit" name="submit" value="Save Category" />

			</form>
<?php
	}
?>
</section>
<?php
}else{
  header('location: /admin/login');
}
?>
