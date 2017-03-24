<?php

namespace App\Modules\Website\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class DonateController extends Controller
{

    public function index(CheckoutService $checkoutService)
    {

        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Doação', 10.0))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        redirect($response->getRedirectionUrl());

    }

    public function create()
    {

    }

    public function store(Request $request)
    {



    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
