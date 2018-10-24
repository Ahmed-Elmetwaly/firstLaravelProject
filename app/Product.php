<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Order;

class Product extends Model
{
    //

	protected $fillable=['name','description','size','price','category_id','image'];

    protected $table= 'products';

    public function category(){
    	// return $this->hasMany('App\Category');
    	return $this->belongsTo(Category::class);
    }

    public function order(){
    	return $this->belongsTo(Order::class);
    }

}
