<?php

namespace App\Controllers;

class Bank extends BaseController
{

    public function index()
    {
        return view('pages/bank');
    }

    public function deposit(){
       
        if (!logged_in())
        {
            return redirect()->route('login');
        }
        $price = $this->request->getPost("amount");
        
        
        $total =  $price;
        $discordLine = 0;
        
        $discord = 0;
        $pay = $total - $discord;
        $item = [
            "name" => "Deposit",
            "price" => $price,
            "discord" => $discord,
            "payment" => $pay,
            "qty" => 1
        ];

        $arv = [
            "name" => "Deposit",
            "cost" => $total,
            "discord" => $discord,
            "discordline" => $discordLine,
            "payment" => $pay,
            "return_action" => "deposit"
        ];
        $invoice_id = $this->invoice->createInvoice($arv, [$item]);

        return _go("/payment/invoice/".$invoice_id);
    }

    public function widthdraw(){
        if (!logged_in())
        {
            return redirect()->route('login');
        }
    }
}
