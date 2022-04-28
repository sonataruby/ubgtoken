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
}