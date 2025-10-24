<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscriptions';
    protected $fillable = [
        'donation_id',
        'user_email',
        'amount',
        'currency',
        'payrexx_id',
        'payrexx_link',
        'payrexx_status',
        'payrexx_reference',
        'payrexx_raw_response',
    ];

    public $editRules = [];
    public $errors;


    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
