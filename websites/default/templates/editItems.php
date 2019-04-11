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
            <option selected="selected" value="<?=$category['id_categories'] ?? ''?>"><?=$category['categories_name'] ?? ''?></option>
          <?php } else { ?>
            <option value="<?=$category['id_categories'] ?? ''?>"><?=$category['categories_name'] ?? ''?></option>
        <?php } } ?>
        </select>

        <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
        <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
        <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
        <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Need to figure out how to filter select box dynamically (Currently only god knows) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
        <Label>Sub-Categories</label>
          <Select name="items[sub_category]">
          <?php foreach ($categories as $category){ ?>
                  <optgroup label="<?=$category['categories_name'] ?? ''?>">
                          <?php foreach ($subcategories as $subcategory) { ?>
                                <?php if ($subcategory['id_categories_sub_categories'] == $category['id_categories']){?>
                                      <option value="<?=$subcategory['sub_category_name'] ?? ''?>"><?=$subcategory['sub_category_name'] ?? ''?></option>
                                <?php } ?>
                          <?php } ?>
                  <?php } ?>
                  </optgroup>
          </select>

        <Label>Year of production</label>
        <input type="number" name="items[year_of_production]" min="1200" max="5000" step="1" value="2019" />
        
				<input type="submit" name="submit" value="Save Item" />

			</form>
<?php
	}
?>
</section>
<?php
} else {
  header('location: login');
}
?>
