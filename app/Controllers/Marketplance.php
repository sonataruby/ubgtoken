<?php
namespace App\Controllers;

class Marketplance extends BaseController
{
	
    public function index()
    {
        
		return view('marketplance/home');
	}

	public function info($id)
    {
        $data = $this->getData();
       	$result = $this->db->query("select * from marketplance WHERE id='".$id."' LIMIT 1")->getRow();
       	$data["item"] = $result;
       	
		return view('marketplance/info',$data);
	}

	public function buy()
    {
        
		return view('marketplance/buy');
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