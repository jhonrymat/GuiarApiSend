<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalWebhookEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'event_type',
        'body'
    ];
}
