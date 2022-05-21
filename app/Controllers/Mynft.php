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
		$db = $this->db->query("select * from hotels")->getResult();
		return view('mynft/booking',["token_id" => $token_id, "hotel" => $db]);
	}


	public function province($id){
		$db = $this->db->query("select * from hotels")->getRow();
		print_r(json_encode($db));
		exit();
	}

	public function bookingtoken(){
		$token_id = $this->request->getGet("id");
		$tokenid = $this->request->getPost("tokenid");
		$name = $this->request->getPost("name");
		$firstname = $this->request->getPost("firstname");
		$lastname = $this->request->getPost("lastname");

		$email = $this->request->getPost("email");
		$passport = $this->request->getPost("passport");
		$address = $this->request->getPost("address");
		$phone = $this->request->getPost("phone");
		$hotel = $this->request->getPost("hotel");
		$checkin = $this->request->getPost("checkin");
		$checkout = $this->request->getPost("checkout");
		$this->db->query("insert into booking set tokenid='".$tokenid."', firstname='".$firstname."', lastname='".$lastname."', phonenumber='".$phone."', email='".$email."', passport='".$passport."', address='".$address."', hotel_country='vn', hotel_localtion='".$hotel."', hotel_checkin='".$checkin."', hotel_checkout='".$checkout."', status='News'");
		$arv = [
			"checkin" => strtotime($checkin),
			"checkout" => strtotime($checkout)
		];
		print_r(json_encode($arv));
		exit();

	}
}