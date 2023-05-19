<?php

namespace App\Http\Controllers;

use App\Events\OrderInternal;
use App\Models\Order;
use App\Models\User;
use App\Notifications\PaymentRequest;
use Illuminate\Http\JsonResponse;
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
        if($orderDetail) {
            $contractStatus = $orderDetail->freight_payer_self === '1' ? "INTERNAL" : "CUSTOMER";
            $order = [
                'greeting' => 'Good day,',
                'heading' => 'Order Properties.',
                'bl_release_date' => 'Date: ' . $orderDetail->bl_release_date,
                'bl_user' => 'User: ' . $orderDetail->user->name,
                'freight_payer_self' => 'Contract Status: ' . $contractStatus,
                'contract_number' => 'Contract No: ' . $orderDetail->contract_number,
                'bl_number' => 'BL No: ' . $orderDetail->bl_number
            ];
            $this->email = 'info@you-source.co.za';
            $this->notify(new PaymentRequest($order));

            dd('Order notification completed!');
        }
        dd('There are no internal contracts found!');
    }

    public function testEvent(){

        $user = User::factory()->create();
        $order = Order::factory()->create([
            'bl_release_user_id' => $user->id,
            'freight_payer_self' => false,
        ]);

        // Dispatch the event
        event(new OrderInternal($order));

        dd('Order ID#: '.$order->id.' event and listener dispatched!');
    }
}
