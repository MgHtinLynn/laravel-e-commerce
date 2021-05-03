<?php

namespace App\Http\Controllers;

use App\Http\Repository\PaymentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class PaymentController extends Controller
{
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function checkoutView()
    {
        return view('payment.checkout-view');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     * @throws ApiErrorException
     */
    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(config('stripe.secretKey'));
        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $request->input('products'),
            'mode' => 'payment',
            'success_url' => route('checkout-success'),
            'cancel_url' => route('checkout-cancel'),
        ]);

        return response()->json([
            'id' => $checkoutSession->id
        ]);
    }

    public function checkoutSuccess(Request $request)
    {
        //dd($request->all());
        return view('checkout.success');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function storeTransactions(Request $request): JsonResponse
    {
        $this->paymentRepository->storeTransactionList($request->all());
        return response()->json([
            'message' => 'success',
            'status' => 201
        ]);
    }
}
