@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Products
                  <a href="{{ route('products.create') }}">Add a Product
                  </a>
                </div>

                <div class="panel-body">
                    @foreach($products as $product)
                      <span style="font-size:25px;">{{ $product->name }}</span>

                      <a href="{{ route('products.edit', [$product]) }}">Edit</a>

                      <a href="{{ route('products.destroy', [ $product ]) }}"
                        onclick="event.preventDefault();
                        document.getElementById('product-delete={{ $product->id }}').submit();">Delete</a>

                      <form id="product-delete={{ $product->id }}" method="POST" action="{{ route('products.destroy', [ $product ]) }}" style="display: none;">
                          {{ csrf_field() }}
                          {{ method_field("DELETE") }}
                      </form>
                      <br />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
