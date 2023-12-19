<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        //menampilakn data dari db payments
        $items = Payments::with('bills')->get();
        return view('payments.index', [
            'items' => $items
        ]);
    }
}
