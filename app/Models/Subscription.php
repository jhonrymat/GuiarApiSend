<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "plan_id",
        'paypal_plan_id',
        'price',
        "started_at",
        "finish_at",
        "renewal",
        "ended_at",
        "renewal_cancelled_at",
        "paypal_subscription_id",
        "next_billing"
    ];

    public function cancel()
    {
        $this->renewal = false;
        $this->renewal_cancelled_at = Carbon::now();
        $this->save();
    }
}
