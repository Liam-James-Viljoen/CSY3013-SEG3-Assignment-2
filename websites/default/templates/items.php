<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

			<h2>Items</h2>

			<a class="new" href="editAccount">Add new item</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Item Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';


			foreach ($items as $item) {
				echo '<tr>';
				echo '<td>' . $item['item_name'] . '</td>';
				echo '<td>' . $item['artist_name'] . '</td>';
        echo '<td>' . $item['year_of_production'] . '</td>';

        if ($item['height'] != null){
          echo '<td>' . $item['height'] . '</td>';
        }
        if ($item['lengh'] != null){
          echo '<td>' . $item['lengh'] . '</td>';
        }
        if ($item['aprox_weight'] != null){
          echo '<td>' . $item['aprox_weight'] . '</td>';
        }

        echo '<td>' . $item['estimated_price'] . '</td>';

				echo '<td><a style="float: right" href="editAccount?id_admin_acounts=' . $item['id_admin_acounts'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deleteAccount">
				<input type="hidden" name="id_admin_acounts" value="' . $item['id_admin_acounts'] . '" />
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
