<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

	<?php


	if (isset($_POST['submit'])) {
		echo 'Classification Saved';
	}else {
		?>
			<h2>Edit Classifications</h2>

			<form action="editClassification" method="POST">

				<input type="hidden" name="classifications[id_classifications]" value="<?php echo $classifications['id_classifications']; ?>" />
				<label>Name</label>
				<input type="text" name="classifications[classification_name]" value="<?php echo $classifications['classification_name']; ?>" />

				<input type="submit" name="submit" value="Save Auction" />

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
