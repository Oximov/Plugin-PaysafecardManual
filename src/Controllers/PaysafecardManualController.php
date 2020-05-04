<?php

namespace Azuriom\Plugin\PaysafecardManual\Controllers;

use Illuminate\Support\Facades\Auth;
use Azuriom\Plugin\Shop\Models\Payment;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\PaysafecardManual\Requests\PaymentRequest;

class PaysafecardManualController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay()
    {
        $code_1 = request()->input('code_1');
        $code_2 = request()->input('code_2');
        $code_3 = request()->input('code_3');
        $code_4 = request()->input('code_4');
        $payment = Payment::findOrFail(request()->input('payment_id'));
        
        $payment->update(['status'=>'PENDING', 'payment_id'=>$code_1.'-'.$code_2.'-'.$code_3.'-'.$code_4]);

        return view('paysafecardmanual::success');
    }
}
