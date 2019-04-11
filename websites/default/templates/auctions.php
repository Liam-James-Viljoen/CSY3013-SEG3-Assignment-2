<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

			<h2>Auction</h2>

			<a class="new" href="editAuction">Add new auction</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Auction Name</th>';
			echo '<th>Date</th>';
      echo '<th>Time</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
      echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';


			foreach ($auctions as $auction) {
				echo '<tr>';
				echo '<td>' . $auction['auction_name'] . '</td>';
				echo '<td>' . $auction['date'] . '</td>';
        echo '<td>' . $auction['time'] . '</td>';
				echo '<td><a style="float: right" href="editAuction?id_auctions=' . $auction['id_auctions'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deleteAuction">
				<input type="hidden" name="id_auctions" value="' . $auction['id_auctions'] . '" />
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
