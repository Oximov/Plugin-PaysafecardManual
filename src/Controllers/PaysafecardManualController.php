<?php

namespace Azuriom\Plugin\PaysafecardManual\Controllers;

use Illuminate\Support\Facades\Auth;
use Azuriom\Plugin\Shop\Models\Payment;
use Azuriom\Http\Controllers\Controller;

class PaysafecardManualController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay()
    {
        $code = request()->input('code');
        $payment = Payment::findOrFail(request()->input('payment_id'));
        
        $payment->update(['status'=>'PENDING', 'payment_id'=>$code]);

        return view('paysafecardmanual::success');
    }
}
