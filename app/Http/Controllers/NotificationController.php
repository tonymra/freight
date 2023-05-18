<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Notifications\PaymentRequest;
use Illuminate\Notifications\Notifiable;

class NotificationController extends Controller
{
    use Notifiable;

    public $email; // Add the $email property to the controller

    public function index()
    {
        return view('welcome');
    }

    public function sendNotification()
    {
        $orderDetail = Order::where('freight_payer_self',0)->first();
        $contractStatus = $orderDetail->freight_payer_self === '1' ? "INTERNAL":"CUSTOMER";

        $order = [
            'greeting' => 'Good day,',
            'heading' => 'Order Properties.',
            'bl_release_date' => 'Date: '.$orderDetail->bl_release_date,
            'bl_user' => 'User: '.$orderDetail->user->name,
            'freight_payer_self' => 'Contract Status: '.$contractStatus,
            'contract_number' => 'Contract No: '.$orderDetail->contract_number,
            'bl_number' => 'BL No: '.$orderDetail->bl_number
        ];

        $this->email = 'info@you-source.co.za'; // Assign the email address to the $email property

        $this->notify(new PaymentRequest($order));

        dd('Order completed!');
    }
}
