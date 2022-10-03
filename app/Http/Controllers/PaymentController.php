<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Log;
use App\ShippingCompany;
use App\LoadClass;
use App\BaseModel; //Para obter informações sobre os campos enumerados
use App\Form;
use Mail;

//Adição dessas 3 Facades
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Psr\Http\Message\ServerRequestInterface;
use MP;

class PaymentController extends Controller
{
    public function mp_notifications(){
        
        $log = new Log;
        $log->content = date('H:i:s');
        $log->content .= ' --- '.print_r($_GET, true);

        if (isset($_GET["id"])) {
            $payment_info = MP::get_payment_info($_GET["id"]);
            if ($payment_info["status"] == 200) {
                $log->content = ' --- '.print_r($payment_info, true);

                //Aqui atualiza o pedido com base no retorno
                $order_id = $payment_info['response']['collection']['external_reference'];
                $order_status = $payment_info['response']['collection']['status'];
                $order = Order::find($order_id);
                $order->payment_status = $order_status;
                if($order_status=='approved'){
                    $order->paid = date("Y-m-d H:i:s");
                }else{
                    $order->paid = null;
                }

                $order->save();

            }else{
                $log->content = ' ---  PAYMENT INFO FAILED ';
            }
        }else{
            $log->content .= ' --- No ID Status:200';
        }
        $log->save();

        http_response_code(200);    
        exit;

    }

}
