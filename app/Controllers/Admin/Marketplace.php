<?php
namespace App\Controllers\Admin;
use \CodeIgniter\Files\File;
class Marketplace extends AdminController
{
	//protected $helpers = ['form'];

	public function index(){
		$item = $this->db->query("select * from marketplance")->getResult();
		return view("admin/marketplace",["data" => $item]);
	}

	public function manager($id){
		$item = $this->db->query("select * from marketplance WHERE id='".$id."'")->getRow();
		return view("admin/marketplace_form",["data" => $item]);
	}

	public function save($id){
		$data = $this->request->getPost("form");
		$img = $this->uploadImage("banner_file",$data["banner"],$data["prikeys"]);
		$data["banner"] = $img["name"];
		$this->db->query("update marketplance SET item_id='".$data["item_id"]."', banner='".$data["banner"]."', name='".$data["name"]."', price='".$data["price"]."', qty='".$data["qty"]."', description='".$data["description"]."', star='".$data["star"]."', night='".$data["night"]."', bed='".$data["bed"]."', chuky='".$data["chuky"]."', exitmoiky='".$data["exitmoiky"]."', prikeys='".$data["prikeys"]."' WHERE id='".$id."'");
		return _go("admin/marketplace");
	}

	public function uploadImage($name,$old_file="",$wname="") { 
        
        $img = $this->request->getFile($name);
        if ($img->isValid() && ! $img->hasMoved()) {
        	if($old_file != "") @unlink(FCPATH . $old_file);
        	$ext = $img->getClientExtension();
            $newName = $wname.".".$ext;
            $img->move(FCPATH . 'uploads', $newName);
            
            return ["name" => '/uploads/'.$newName];
        }else{
        	return ["name" => $old_file];
        }

    }


    public function ajaxsync($id){
    	$data = $this->db->query("select * FROM marketplance where id='".$id."'")->getRow();
    	echo json_encode($data);
    }

    public function syncupdate($itemid){
    	$this->db->query("update marketplance SET sync='1' where item_id='".$itemid."'");
    }
    
}

?>