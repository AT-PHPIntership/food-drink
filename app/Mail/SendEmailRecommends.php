<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailRecommends extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $productRecommend;
    /**
     * Create a new message instance.
     *
     * @param Jobs\SendEmailRecommendJob $user             user
     * @param Jobs\SendEmailRecommendJob $productRecommend productRecommend
     *
     * @return void
     */
    public function __construct($user, $productRecommend)
    {
        $this->user = $user;
        $this->productRecommend = $productRecommend;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.send-mail-recommend')
            ->with([
                'user' => $this->user,
                'products' => $this->productRecommend,
            ]);
    }
}
