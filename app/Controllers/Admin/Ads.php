<?php
namespace App\Controllers\Admin;

class Ads extends AdminController
{
	public function index(){
		$item = $this->db->query("select * from ads_items")->getResult();
		return view("admin/ads",["data" => $item]);
	}

	public function manager($id){
		$item = $this->db->query("select * from ads_items WHERE id='".$id."'")->getRow();
		return view("admin/ads_form",["data" => $item]);
	}


	public function save($id){
		$data = $this->request->getPost("form");
		$img = $this->uploadImage("banner_file",$data["banner"]);
		$data["banner"] = $img["name"];
		$this->db->query("update ads_items SET item_id='".$data["item_id"]."', banner='".$data["banner"]."', name='".$data["name"]."', price='".$data["price"]."', star='".$data["star"]."', night='".$data["night"]."', bed='".$data["bed"]."' WHERE id='".$id."'");
		
		return _go("admin/ads");
	}


	public function delete($id){
		
		$this->db->query("delete from ads_items  WHERE id='".$id."'");
		return _go("admin/ads");
	}

	public function uploadImage($name,$old_file="") { 
        
		
        

        $img = $this->request->getFile($name);
        if ($img->isValid() && ! $img->hasMoved()) {
        	if($old_file != "") @unlink(FCPATH . $old_file);
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads', $newName);
            $ext = $img->getClientExtension();
            return ["name" => '/uploads/'.$newName,"ext" => $ext];
        }else{
        	return ["name" => $old_file];
        }

      
           

    }

}

?>