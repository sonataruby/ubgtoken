<?php
namespace App\Controllers;
class Market extends BaseController
{
	public function index()
    {
        
		return view('market/home');
	}

	public function info()
    {
        
		return view('market/info');
	}

	public function buy()
    {
        
		return view('market/buy');
	}
}