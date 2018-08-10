<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\User;
use App\Product;
use App\Order;
use App\OrderDetail;
use Carbon\Carbon;
use App\Mail\SendEmailRecommends;
use Mail;

class SendEmailRecommendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = Order::with('user')->get()->unique('user_id');
        foreach ($users as $user) {
            $orderProduct = OrderDetail::whereIn('order_id', Order::where('user_id', $user->user_id)->get()->pluck('id'))
                ->get()->unique('product_id')->pluck('product_id');
            $category = Product::whereIn('id', $orderProduct)->get()->unique('category_id')->pluck('category_id');
            $productRecommend = Product::whereNotIn('id', $orderProduct)->whereIn('category_id', $category)->get();
            Mail::to($user->user->email)->send(new SendEmailRecommends($user, $productRecommend));
        }
    }
}
