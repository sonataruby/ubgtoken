<?php
namespace App\Controllers;
class Mynft extends BaseController
{
	public function index()
    {
        
		return view('mynft/home');
	}

	public function info()
    {
        
		return view('mynft/info');
	}

	public function buy()
    {
        
		return view('mynft/buy');
	}

	public function sell($token_id=0)
    {
        
		return view('mynft/sell');
	}
	
	public function booking($token_id=0){
		return view('mynft/booking',["token_id" => $token_id]);
	}

}