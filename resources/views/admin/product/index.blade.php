@extends('admin.layout.admin')

@section('content')

<h3>Products</h3>

<ul>
	@forelse($products as $product)

	<li>
		<h4>Name of product: {{ $product->name }}</h4>
		{{-- <h4>Name of category: {{ count($product->category())?$product->category()->name:"N/a" }}</h4> --}}
		
		<form action="{{ route('product.destroy',$product->id) }}" method="post">
			{{ csrf_field() }}
			{{ method_field('delete') }}

			<input type="submit" name="" value="Delete" class="btn btn-sm btn-danger">

		</form>
			

	</li>

	@empty

	<h3>There Is No Products</h3>

	@endforelse
</ul>

@endsection