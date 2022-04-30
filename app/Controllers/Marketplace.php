<?php
namespace App\Controllers;

class Marketplace extends BaseController
{
	
    public function index()
    {
        $item = $this->db->query("select * from marketplance")->getResult();
		return view('marketplace/home',["data" => $item]);
	}

	public function info($id)
    {
        $data = $this->getData();
       	$result = $this->db->query("select * from marketplance WHERE id='".$id."' LIMIT 1")->getRow();
       	$data["item"] = $result;
       	$data["header"] = $this->getHeader();
		return view('marketplace/info',$data);
	}

	public function buy()
    {
        
		return view('marketplace/buy');
	}

	private function getData(){
		$result = $this->db->query("select * from ads_items")->getResult();
         
        $nftmarket = [];
        $marketplance = [];

        foreach ($result as $key => $value) {
            if($value->ads_type == "marketplance"){
                $marketplance[] = $value;
            }

            if($value->ads_type == "nftmarket"){
                $nftmarket[] = $value;
            }
        }
        return ["nftmarket" => $nftmarket, "marketplance" => $marketplance];
	}
	
}