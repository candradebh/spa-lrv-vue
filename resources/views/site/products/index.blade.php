@extends('layouts.site')

@section('content')

<div class="container">
    <div class="col s12">
        @foreach($products as $product)
            <div class="row">
                @for($i=0;$i<4;$i++)
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{asset('img/site/sample-1.jpg')}}">
                                <span class="card-title">{{$product->name}}</span>
                                <a class="btn-floating halfway-fab waves-effect waves-light red">
                                    <i class="material-icons">shopping_cart</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                    </div>
                @endfor
             </div>
        @endforeach
    </div>
</div>

@endsection