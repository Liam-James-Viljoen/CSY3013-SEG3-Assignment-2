<?php
namespace fothebysDatabase\controllers;
class auctionsController {
	private $auctionsTable;

	public function __construct($auctionsTable) {
		$this->auctionsTable = $auctionsTable;
	}
	public function returnAuctions(){
		$auctionsTable = $this->auctionsTable->findAll();
		return $auctionsTable;
	}
	public function auctions(){
		$auctionsTable = $this->auctionsTable->findAll();

		return [
			'template' => 'auctions.php',
			'title' => 'auctions',
			'variables' => ['auctions' => $auctionsTable]
		];
	}
	public function edit(){
		if (isset($_POST['auctions'])) {
			if (empty($_POST['auctions']['auction_name'])){
				unset($_POST);
				header('location: editAuction');
			}else{
				$this->auctionsTable->save($_POST['auctions']);
				header('location: auctions');
			}
		}
		else {
			if  (isset($_GET['id_auctions'])) {
				$result = $this->auctionsTable->find('id_auctions ', $_GET['id_auctions']);
				$auctions = $result[0];
			}
			else  {
				$auctions = false;
			}
			return [
				'template' => 'editAuctions.php',
				'title' => 'edit Auctions',
				'variables' => ['auctions' => $auctions]
			];
		}
	}
	public function delete(){
		$this->auctionsTable->delete($_POST['id_auctions']);

		header('location: auctions');
	}
}
