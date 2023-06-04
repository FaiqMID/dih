<?php

namespace App\Listeners;

use App\Models\Notification;
use App\Events\OrderStatusChanged;
use App\Models\UserAddress;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderStatusNotification
{
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
     * @param  \App\Events\OrderStatusChanged  $event
     * @return void
     */
    public function handle(OrderStatusChanged $event)
    {
        $order = $event->order;
        $user_address_id = $order->user_address_id;
        $user_id = UserAddress::where('id', $user_address_id)->first()->user_id;

        $status_msg = "";
        switch ($order->status) {
            case 0:
                $status_msg = "dibuat, silahkan bayar terlebih dahulu";
                break;

            case 1:
                $status_msg = "sedang diproses";
                break;
            
            case 2:
                $status_msg = "sedang dikirim";
                break;
            
            case 3:
                $status_msg = "sudah terkirim";
                break;
            
            default:
                # code...
                break;
        }
        $message = "Pesanan anda pada {$order->created_at} {$status_msg}!";
        $notification = new Notification([
            'user_id' => $user_id,
            'order_detail_id' => $order->id,
            'message' => $message,
            'is_read' => false,
        ]);
        $notification->save();
    }
}
