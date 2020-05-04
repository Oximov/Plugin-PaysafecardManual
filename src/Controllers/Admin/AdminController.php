<?php

namespace Azuriom\Plugin\PaysafecardManual\Controllers\Admin;

use Azuriom\Plugin\Shop\Models\Offer;
use Azuriom\Plugin\Shop\Models\Payment;
use Azuriom\Http\Controllers\Controller;

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

        return view('paysafecardmanual::admin.index', ['payments'=>$payments]);
    }

    public function accept_payment(Payment $payment)
    {
        $user = $payment->user;
        foreach ($payment->items as $id => $quantity) {
            $offer = Offer::find($id);
            $user->money = $user->money + ($offer->money * $quantity);
        }
        
        $payment->status = 'DELIVERED';

        $user->save();
        $payment->save();
        //TODO notify user mail or database

        $payments = Payment::where([
            ['status', '=', 'PENDING'],
            ['payment_type', '=','paysafecardmanual']
        ])->get();

        return redirect()->route('paysafecardmanual.admin.index')->with(['success'=>'Points credited to '.$user->name]);
    }

    public function refuse_payment(Payment $payment)
    {
        $payment->status = 'CANCELLED';
        $payment->save();
        //TODO notify user mail or database
        
        return redirect()->route('paysafecardmanual.admin.index')->with(['success'=>'Payment refused to '.$user->name]);
    }
}
