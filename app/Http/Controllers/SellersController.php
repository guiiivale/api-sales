<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroySellerRequest;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellersController extends Controller
{
   public function store(StoreSellerRequest $request)
   {
      $data = $request->validated();
      $seller = Seller::create($data);
      
      return response()->json([
         'message' => 'Seller created successfully',
         'success' => true,
         'name' => $seller->name,
         'email' => $seller->email,
         'id' => $seller->id,
         ] , 201);
   }

   public function index()
   {
      $sellers = Seller::all();
      return response()->json([
         'message' => 'Sellers fetched successfully',
         'success' => true,
         'data' => $sellers,
         ] , 200);
   }

   public function update(UpdateSellerRequest $request)
   {
      $data = $request->validated();
      $seller = Seller::find($data['seller_id']);
      $seller->update($data);
      
      return response()->json([
         'message' => 'Seller updated successfully',
         'success' => true,
         'name' => $seller->name,
         'email' => $seller->email,
         'id' => $seller->id,
         ] , 200);
   }

   public function destroy(DestroySellerRequest $request)
   {
      $data = $request->validated();
      $seller = Seller::find($data['seller_id']);
      $seller->delete();
      
      return response()->json([
         'message' => 'Seller deleted successfully',
         'success' => true,
         ] , 200);
   }
}
