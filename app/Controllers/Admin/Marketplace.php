<?php
namespace App\Controllers\Admin;

class Marketplace extends AdminController
{
	public function index(){
		$item = $this->db->query("select * from marketplance")->getResult();
		return view("admin/marketplace",["data" => $item]);
	}

	public function manager($id){
		$item = $this->db->query("select * from marketplance WHERE id='".$id."'")->getRow();
		return view("admin/marketplace_form",["data" => $item]);
	}
}

?>