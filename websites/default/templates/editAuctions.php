<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

<section class="right">

	<?php


	if (isset($_POST['submit'])) {
		echo 'Auction Saved';
	}else {
		?>
			<h2>Edit Auction</h2>

			<form action="editAuction" method="POST">

				<input type="hidden" name="auctions[id_auctions]" value="<?php echo $auctions['id_auctions']; ?>" />
				<label>Name</label>
				<input type="text" name="auctions[auction_name]" value="<?php echo $auctions['auction_name']; ?>" />
        <label>Date</label>
				<input type="date" name="auctions[date]" value="<?php echo $auctions['date']; ?>" />
        <label>Time</label>
				<input type="time" name="auctions[time]" value="<?php echo $auctions['time']; ?>" />

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
