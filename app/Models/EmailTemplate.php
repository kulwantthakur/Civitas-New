<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable = [
        'payment_method',
        'subject',
        'html_content',
        'pdf_attachment',
    ];

    /**
     * Get template by payment method
     */
    public static function getByPaymentMethod($paymentMethod)
    {
        return self::where('payment_method', $paymentMethod)->first();
    }

    /**
     * Get all templates indexed by payment method
     */
    public static function getAllIndexed()
    {
        return self::all()->keyBy('payment_method');
    }
}
