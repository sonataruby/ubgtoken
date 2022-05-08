<?php

namespace App\Controllers;

class Blockchain extends BaseController
{
    public function index()
    {

        
    }

    public function completejson($file){
    	$data = file_get_contents(FCPATH."contracts/".$file.".json");
    	$data = str_replace(["\n","\t",'"'],["","",'\"'],$data);
    	echo $data;
    }
}
