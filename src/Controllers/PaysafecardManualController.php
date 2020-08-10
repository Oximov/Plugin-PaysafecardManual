<?php

namespace Azuriom\Plugin\PaysafecardManual\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\PaysafecardManual\Models\PendingCode;
use Azuriom\Plugin\PaysafecardManual\Requests\PaymentRequest;
use Azuriom\Plugin\Shop\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PaysafecardManualController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
        $code = str_replace(['-', ' '], '', $request->input('code'));

        $request->merge(['code' => $code]);

        $this->validate($request, [
            'code' => 'required|size:16',
        ]);

        if (PendingCode::where('code', $code)->exists()) {
            throw ValidationException::withMessages([
                'code' => trans('paysafecardmanual::messages.duplicate'),
            ]);
        }

        PendingCode::create([
            'user_id' => $request->user()->id,
            'code' => $code,
        ]);

        return redirect()->back()->with([
            'success' => trans('paysafecardmanual::messages.status.pending'),
        ]);
    }
}
