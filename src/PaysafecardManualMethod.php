<?php

namespace Azuriom\Plugin\PaysafecardManual;

use Azuriom\Models\User;
use Azuriom\Plugin\Shop\Cart\Cart;
use Azuriom\Plugin\Shop\Models\Payment;
use Azuriom\Plugin\Shop\Payment\PaymentMethod;
use Illuminate\Http\Request;

class PaysafecardManualMethod extends PaymentMethod
{
    /**
     * The payment method id name.
     *
     * @var string
     */
    protected $id = 'paysafecardmanual';

    /**
     * The payment method display name.
     *
     * @var string
     */
    protected $name = 'Paysafecard Manual';

    public function startPayment(Cart $cart, float $amount, string $currency)
    {
        $payment = $this->createPayment($cart, $amount, $currency);
        return view('paysafecardmanual::paysafecardmanual', ['payment_id' => $payment->id]);
    }

    public function notification(Request $request, ?string $paymentId)
    {

        return response()->json(['status' => 'Not implemented.']);
    }

    public function success(Request $request)
    {
        return view('shop::payments.success');
    }

    public function view()
    {
        return 'paysafecardmanual::admin.paysafecardmanual';
    }

    public function rules()
    {
        return [
            
        ];
    }

    public function image()
    {
        return asset('plugins/paysafecardmanual/img/paysafe-card.png');
    }

    public function hasFixedAmount()
    {
        return false;
    }
}
