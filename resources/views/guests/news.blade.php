@extends('layouts.app')

@section('content')


<section id="pasta">
    <div class="container">
        <h1>Blog page</h1>
        <div class="row">
            @foreach($posts as $post)

            <div class="col-4">
                <div class="card">
                    {{$post['title']}}

                    <p>
                        {{$post['content']}}
                    </p>
                </div>
            </div>


            @endforeach
        </div>
    </div>
</section>

@endsection