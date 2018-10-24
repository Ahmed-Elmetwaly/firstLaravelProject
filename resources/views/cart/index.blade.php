@extends('layout.main')

@section('content')

<div class="row">
	{{-- <div class="col-12 col-lg-offset-1"> --}}
		<h3>Cart Items</h3>


		<table class="table table-hover">
			<thead>
				<tr>
					<th>name</th>
					<th>price</th>
					<th>qty</th>
					<th>size</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>

				@foreach($cartItems as $cartItem)
				<tr>
					<td>{{ $cartItem->name }}</td>

					<td>{{ $cartItem->price }}</td>

					<td >

						{!! Form::open(['route'=>['cart.update',$cartItem->rowId],'method'=>'put']) !!}
						
						<input size="1" type="text" name="qty" value="{{ $cartItem->qty }}">
						
						
					</td>

					<td>
						<div > 
							{!! Form::select('size', ['small'=>'Small','medium'=>'Medium','large'=>'Large'] , $cartItem->options->has('size')?$cartItem->options->size:'' ) !!}
						</div>

					</td>

					<td>
						
						<input style="float: left;"  class="button small danger" type="submit" name="" value="OK" >
						{!! Form::close() !!}

						<form action="{{ route('cart.destroy',$cartItem->rowId) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('delete') }}
							<input type="submit" class="button small alert" value="Delete">
						</form>
					</td>
				</tr>
				@endforeach

				<tr>
					<td></td>
					<td>
						<strong>Sub Total:</strong>  {{ Cart::subtotal() }}
						<br>
						<strong> Tax:</strong> {{ Cart::tax() }}
						<br>
						<strong>Total:</strong> {{ Cart::total() }}
					</td>
					<td>
						<strong>Total Items:</strong> {{ Cart::count() }}
					</td>
					<td></td>
					<td></td>
				</tr>

			</tbody>

		</table>

		<a href="{{ route('checkout.shipping') }}" class="button">Checkout</a>
	{{-- </div> --}}
</div>


@endsection