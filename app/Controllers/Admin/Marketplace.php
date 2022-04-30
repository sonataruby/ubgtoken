<?php
namespace App\Controllers\Admin;

class Marketplace extends AdminController
{
	public function index(){
		$item = $this->db->query("select * from marketplance")->getResult();
		return view("admin/marketplace",["data" => $item]);
	}
}

?>