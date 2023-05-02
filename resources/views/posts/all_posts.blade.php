@extends('layouts.posts')

@section('content')
    <div class="glasses">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="titlepage">
                        <h2>Our Glasses</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor
                            e et dolore magna aliqua. Ut enim ad minim veniam, qui
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    @foreach($data['posts'] as $post)
                    <div class="glasses_box">
                        <figure><img src="../../../../sait/Sait/html/images/glass1.png" alt="#"/></figure>
                        <h3><span class="blu">Category: </span>{{ $post->category->name }}</h3>
                        <a href="{{ route('one_post', [$post->id]) }}"><p>{{$post->title}}</p></a>
                    </div>
                    @endforeach
                <div class="col-md-12">
                    <a class="read_more" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
@endsection
