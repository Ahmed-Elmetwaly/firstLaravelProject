@extends('layout.main')

@section('title','Shirts')

@section('content')

<div class="row">

    @forelse($shirts as $shirt)

    <div class="small-3 columns">
        <div class="item-wrapper">
            <div class="img-wrapper">
                <a href="{{ route('cart.addItem',$shirt->id) }}" class="button expanded add-to-cart">
                    Add to Cart
                </a>
                <a href="#">
                    <img src="{{ url('images', $shirt->image) }} "/>
                </a>
            </div>
            <a href="{{ route('shirt') }}">
                <h3>
                    {{ $shirt->name }}
                </h3>
            </a>
            <h5>
                {{ $shirt->price }} L.E
            </h5>

            <p>
                {{ $shirt->description }}
            </p>
        </div>
    </div>

    @empty

    <h4>There Is No Shirts Yet</h4>

    @endforelse
</div>

@endsection