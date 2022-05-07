<?php
namespace App\Controllers\Admin;

class Hotel extends AdminController
{
	public function index(){
		$item = $this->db->query("select * from hotels")->getResult();
		return view("admin/hotel",["data" => $item]);
	}

	public function manager($id){
		$item = $this->db->query("select * from hotels WHERE id='".$id."'")->getRow();
		return view("admin/hotel_form",["data" => $item]);
	}


	public function save($id){
		$data = $this->request->getPost("form");
		
		$this->db->query("update hotels SET country='".$data["country"]."', province_code='".$data["province_code"]."', province='".$data["province"]."', star='".$data["star"]."', status='".$data["status"]."', service='".$data["service"]."', infomation='".$data["infomation"]."', maps='".$data["maps"]."' WHERE id='".$id."'");
		
		return _go("admin/hotel");
	}


	public function delete($id){
		
		$this->db->query("delete from hotels  WHERE id='".$id."'");
		return _go("admin/hotel");
	}


}

?>