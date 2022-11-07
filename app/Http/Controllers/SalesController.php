<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetSellerSalesRequest;
use App\Http\Requests\StoreSaleRequest;
use App\Models\Sale;
use App\Models\Seller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    const COMMISSION = 8.15;

    public function store(StoreSaleRequest $request)
    {
        $data = $request->validated();
        $seller = Seller::find($data['seller_id']);
        $sale = Sale::create($data);
        $sale->seller()->associate($seller);
        $sale->save();
        $seller->commission += ($data['amount'] * self::COMMISSION / 100);
        $seller->save();

        return response()->json([
            'message' => 'Sale created successfully',
            'success' => true,
            'amount' => $sale->amount,
            'commission' => $sale->amount * self::COMMISSION / 100,
            'seller_id' => $sale->seller->id,
            'id' => $sale->id,
            'date' => $sale->created_at,
        ], 201);
    }

    public function getSellerSales(GetSellerSalesRequest $request)
    {
        $data = $request->validated();
        $seller = Seller::find($data['seller_id']);
        $sales = Sale::where('seller_id', $seller->id)->get();
        return response()->json([
            'success' => true,
            'message' => 'Sales retrieved successfully',
            'name' => $seller->name,
            'email' => $seller->email,
            'commission' => $seller->commission,
            'seller_id' => $seller->id,
            'sales' => $sales,
        ], 200);
    }
}
