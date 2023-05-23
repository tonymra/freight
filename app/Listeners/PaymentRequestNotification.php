<?php
namespace App\Listeners;

use App\Events\OrderInternal;
use App\Models\Order;
use App\Notifications\PaymentRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class PaymentRequestNotification implements ShouldQueue
{
    use Notifiable, InteractsWithQueue;

    /**
     * The number of times the queued listener may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    public $email;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderInternal  $event
     * @return void
     */
    public function handle(OrderInternal $event)
    {
        $order = $event->order;

        if (!$order->freight_payer_self) {
            $orderNotification = [
                'heading' => 'Order Properties.',
                'bl_release_date' => 'Date: ' . $order->bl_release_date,
                'bl_user' => 'User: ' . $order->user->name,
                'freight_payer_self' => 'Contract Status: INTERNAL',
                'contract_number' => 'Contract No: ' . $order->contract_number,
                'bl_number' => 'BL No: ' . $order->bl_number
            ];

            $this->email = 'info@you-source.co.za';
            $this->notify(new PaymentRequest($orderNotification));
        }
    }
}

