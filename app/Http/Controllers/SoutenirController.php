<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoutenirController extends Controller
{
    public function storeValue(Request $request)
    {
        $value = $request->input('value');

        if ($value === 'custom') {
            $customAmount = str_replace(',', '.', $request->input('custom_amount'));
            if (is_numeric($customAmount) && $customAmount > 0) {
                session(['selected_value' => 'custom']);
                session(['custom_amount' => $customAmount]);
            } else {
                session()->forget('custom_amount');
                session()->forget('selected_value');
                return response()->json(['message' => 'Invalid custom amount'], 422);
            }
        } else {
            session(['selected_value' => $value]);
            session()->forget('custom_amount');
        }
    }
}
