<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Card;

use App\Product;

class Order extends Model
{

	protected $fillable=['total','delivered'];

	public function orderItems()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }


	public function user()
	{
		return $this->belongsTo(User::class);
	}

	
	public static function createOrder(){
		$user=Auth::user();
		$order=$user->orders()->create([
			'total'=>Cart::total(),
			'delivered'=>0
		]);
		$cartItems=Cart::content();
		foreach ($cartItems as $cartItem){
			$order->orderItems()->attach($cartItem->id,[
				'qty'=>$cartItem->qty,
				'total'=>$cartItem->qty*$cartItem->price
			]);
		}
	}
}
