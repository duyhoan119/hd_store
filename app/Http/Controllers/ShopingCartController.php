<?php

namespace App\Http\Controllers;

use App\Models\product_variant;
use App\Models\shoping_cart;
use Illuminate\Http\Request;

class ShopingCartController extends Controller
{
    public function index(int $user_id) {
        $carts = shoping_cart::query()->where('user_id',$user_id)->with(['product','product.product'])->get();
        // dd($carts);
        return view('Client.shoping_cart.index',['carts'=>$carts]);
    }
    public function store(Request $request){
        $data= $request->all();
        if (shoping_cart::query()->where("user_id",$data['user_id'])->where("variant_id",$data['variant_id'])->exists()) {
            $cart = shoping_cart::query()->where("user_id",$data['user_id'])->where("variant_id",$data['variant_id'])->first();
            $cart->quantity_order += $data['quantity_order'];
            $cart->save();
            $this->updateQuantity($data['variant_id'],$data['quantity_order'],'equals');
            return [true,'successfully'];
        }
        shoping_cart::query()->create($data);
        $this->updateQuantity($data['variant_id'],$data['quantity_order'],'equals');
        return [true,'successfully'];
    }
    public function destroy($id){
        $cart = shoping_cart::find($id)->first();
        if(isset($cart)){
           if (shoping_cart::query()->delete($id)) {
                $this->updateQuantity($cart->variant_id,$cart->quantity_order,'plus');
                return ['status'=>200,'messages'=>'Delete successfully'];
            }
        }
        return ['status'=>403,'messages'=> "delete falses"];
    }

    protected function updateQuantity(int $id, int $quantity,$action = 'plus'){
        if($action==='equals'){
            $variant = product_variant::find($id);
            $variant->quantity -= $quantity;
            $variant->save();
            return true;
        }
        $variant = product_variant::find($id);
        $variant->quantity += $quantity;
        $variant->save();
    }
}
