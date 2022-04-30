<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

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
        return view('pages/home',["header" => $this->getHeader(),"nftmarket" => $nftmarket, "marketplance" => $marketplance]);
    }
}
