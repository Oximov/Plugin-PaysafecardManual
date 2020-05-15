<?php

namespace Azuriom\Plugin\PaysafecardManual\Controllers\Admin;

use Azuriom\Plugin\Shop\Models\Offer;
use Azuriom\Plugin\Shop\Models\Gateway;
use Azuriom\Plugin\Shop\Models\Payment;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Shop\Events\PaymentPaid;

class AdminController extends Controller
{
    /**
     * Show the home admin page of the plugin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where([
            ['status', '=', 'PENDING'],
            ['payment_type', '=','paysafecardmanual']
        ])->get();

        $gateway = Gateway::where('type', '=', 'paysafecardmanual')->first();
        
        $offers = $gateway ? $gateway->offers : null;
        

        return view('paysafecardmanual::admin.index', ['payments'=>$payments, 'offers'=>$offers]);
    }

    public function accept_payment(Payment $payment)
    {
        $user = $payment->user;
        $money = request()->input('money');
        $user->money +=  $money;
        
        $payment->status = 'DELIVERED';
        
        $user->save();
        $payment->save();
        //TODO notify user mail or database
        event(new PaymentPaid($payment));

        return redirect()->route('paysafecardmanual.admin.index')->with(['success'=>'Points credited to '.$payment->user->name.' for : '.$money]);
    }

    public function refuse_payment(Payment $payment)
    {
        $payment->status = 'CANCELLED';
        $payment->save();
        //TODO notify user mail or database
        
        return redirect()->route('paysafecardmanual.admin.index')->with(['success'=>'Payment refused to '.$payment->user->name]);
    }
}
