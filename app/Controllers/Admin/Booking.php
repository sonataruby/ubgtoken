<?php
namespace App\Controllers\Admin;

class Booking extends AdminController
{
	public function index(){
		$item = $this->db->query("select * from booking")->getResult();
		return view("admin/booking",["data" => $item]);
	}

	public function manager($id){
		$item = $this->db->query("select * from booking WHERE id='".$id."'")->getRow();
		return view("admin/booking_form",["data" => $item]);
	}


	public function save($id){
		$data = $this->request->getPost("form");
		
		$this->db->query("update booking SET country='".$data["country"]."', province_code='".$data["province_code"]."', province='".$data["province"]."', star='".$data["star"]."', status='".$data["status"]."', service='".$data["service"]."', infomation='".$data["infomation"]."', maps='".$data["maps"]."' WHERE id='".$id."'");
		
		return _go("admin/booking");
	}


	public function delete($id){
		
		$this->db->query("delete from booking  WHERE id='".$id."'");
		return _go("admin/booking");
	}


}

?>