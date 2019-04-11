<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

	<?php


	if (isset($_POST['submit'])) {
		echo 'Item Saved';
	}else {
		?>
			<h2>Edit Items</h2>

			<form action="editItems" method="POST">

				<input type="hidden" name="items[id_items]" value="<?php echo $items['id_items']; ?>" />
				<label>Name</label>
				<input type="text" name="items[item_name]" value="<?php echo $items['item_name']; ?>" />
        <label>Artists Name</label>
				<input type="text" name="items[artist_name]" value="<?php echo $items['artist_name']; ?>" />

        <label>Classification</label>
        <Select name="items[classification]">
				<?php
				foreach ($classifications as $classification){ if ($items['classification'] == $classification['classification_name']){ ?>
						<option selected="selected" value="<?=$classification['classification_name'] ?? ''?>"><?=$classification['classification_name'] ?? ''?></option>
					<?php } else { ?>
						<option value="<?=$classification['classification_name'] ?? ''?>"><?=$classification['classification_name'] ?? ''?></option>
				<?php } } ?>
				</select>

        <label>Category</label>
        <Select name="items[category]">
        <?php
        foreach ($categories as $category){ if ($items['category'] == $category['categories_name']){ ?>
            <option selected="selected" value="<?=$category['categories_name'] ?? ''?>"><?=$category['categories_name'] ?? ''?></option>
          <?php } else { ?>
            <option value="<?=$category['categories_name'] ?? ''?>"><?=$category['categories_name'] ?? ''?></option>
        <?php } } ?>
        </select>

        <Label>Sub-Categories</label>




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
