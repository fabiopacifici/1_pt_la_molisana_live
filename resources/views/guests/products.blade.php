@extends('layouts.app')

@section('content')


<section id="pasta">
    <div class="container">
        <h1>Products page</h1>
        <div class="row">
            @foreach($pasta as $product)


            <div class="col-4">
                <div class="card">
                    <img src="{{$product['src']}}" alt="">
                    {{$product['titolo']}}
                </div>
            </div>


            @endforeach
        </div>
    </div>
</section>



@endsection