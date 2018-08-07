<?php

namespace App\Mail;

use App\Models\EventPrize;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

//    public $order;
    public $prize;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventPrize $prize)
    {
        //从外部传入订单实例
//        $this->order=$order;
        //从外部传入奖品实例
        $this->prize=$prize;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('799675065@qq.com')
                    ->subject('中奖通知')
                    ->view('Admin.mail.order',['prize'=>$this->prize]);
    }
}
