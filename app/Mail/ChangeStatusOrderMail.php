<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeStatusOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param Http\Controllers\Admin\OrdersController $data data
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.order-change-status-mail')
        ->with(['name' => $this->data['name'],
            'status' => $this->data['status'],
            'pending' => $this->data['pending'],
            'accepted' => $this->data['accepted'],
            'rejected' => $this->data['rejected'],
        ]);
    }
}
