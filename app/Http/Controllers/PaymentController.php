<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\NewPaymentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    function payment(Request $request)
    {
        $part = Part::findOrFail($request->part_id);
        $amount = $part->sale_price ? $part->sale_price : $part->price;

        $payment = Payment::create([
            'price' => $amount,
            'status' => 'pending',
            'part_id' => $request->part_id,
            'user_id' => Auth::id()
        ]);

        // Setup Stripe Process
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $part->trans_name
                    ],
                    'unit_amount' => (int)($amount * 100),
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'customer_email' => Auth::user()->email,
            'success_url' => route('front.success', ['payment' =>  $payment->id]),
            'cancel_url' => route('front.cancel', ['payment' =>  $payment->id]),
        ]);

        // send notification
        $admins = User::where('role', 'admin')->get();
        // $user->notify(new NewPaymentNotification());
        Notification::send($admins, new NewPaymentNotification($payment));

        return response()->json(['session_id' => $session->id]);
    }

    function success(Request $request)
    {
        $payment = Payment::find($request->payment);
        $payment->update([
            'status' => 'completed'
        ]);

        return 'Payment Done';
    }

    function cancel(Request $request)
    {
        $payment = Payment::find($request->payment);
        $payment->update([
            'status' => 'cancel'
        ]);

        return 'Payment Canceled';
    }
}
