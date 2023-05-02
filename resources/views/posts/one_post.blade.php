@extends('layouts.posts')

@section('content')
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data[$data['class_name']]->category->name }}" READONLY>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data[$data['class_name']]->title }}" READONLY>
        </div>

        <div class="form-group">
            <label for="textarea_id">Text</label>
            <textarea class="form-control" style="height: 200px" id="textarea_id" READONLY> {!! $data[$data['class_name']]->text !!} </textarea >
        </div>

        @php($string = '')
        @foreach($data[$data['class_name']]->tag as $cat_name)
            @php($data[$data['class_name']]->tag->last()->name == $cat_name->name ?  $string .= $cat_name->name . '' :  $string .= $cat_name->name . ',')
        @endforeach
        <div class="form-group">
            <label for="exampleInputEmail1">Tags</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $string }}" READONLY>
        </div>

        <label for="img_read">Image</label>
        <img class="w-25" src="{{ asset('/storage/' . $data[$data['class_name']]->image) }}" alt="Not image" id="img_read">

    </div>
    <div class="container">
        <div class="col-md-4">
            <div class="row-cols-1">
                @auth()
                <form action="{{ route('admin.posts.like.store', [$data[$data['class_name']]]) }}" method="POST">
                    @csrf
                    <button type="submit">
                        @if(auth()->user()->postLikes->contains($data[$data['class_name']]->id))
                            <h1><3</h1>
                        @else
                            <h1>?</h1>
                        @endif
                    </button>
                </form>
                @endauth
                @guest()
                        <button type="submit" disabled>
                                <h1>?</h1>
                        </button>
                @endguest

            </div>
            <div class="row-cols-2">
                <p>Post_id: {{ $data[$data['class_name']]->id }} Likes: {{ $data[$data['class_name']]->all_like() }}</p>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
{{--    <div class="card-footer">--}}
{{--        <a href="{{ route("admin.{$data['class_name']}.index", ['page=' . $page]) }}"><button type="button" class="btn btn-dark btn-lg">Back</button></a>--}}

{{--        <form action="{{ route('admin.posts.like.store', [$data[$data['class_name']]]) }}" method="POST">--}}
{{--            @csrf--}}
{{--            <button type="submit">--}}
{{--                <i class="far fa-heart nav-icon"></i>--}}
{{--            </button>--}}
{{--        </form>--}}
{{--    </div>--}}

<div class="container py-8">
    <!-- Title -->
    <div class="mb-8">
        <h2 class="fw-bold m-0">Chats</h2>
        <p>All comments: {{ count($data[$data['class_name']]->post_comment) }}</p>
    </div>

    <!-- Search -->
    <div class="mb-6">
        <form action="#">
            <div class="input-group">
                <div class="input-group-text">
                    <div class="icon icon-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                </div>

                <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users...">
            </div>
        </form>
        <form action="{{ route('one_post.comment', [$data[$data['class_name']]->id]) }}" method="POST">
            @csrf
            <label for="id_comment">Comment</label>
            <input name="comment" id="id_comment" type="text">
            <button type="submit">Send</button>
        </form>
    </div>

    <div class="card-list">
        <!-- Card -->
        @foreach($data[$data['class_name']]->post_comment as $comment)
        <div class="card-body">
            <div class="row gx-5">
                <div class="col-auto">
                    <div class="avatar avatar-online">
                        <img src="assets/img/avatars/7.jpg" alt="#" class="avatar-img">
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="me-auto mb-0">{{ $comment->comment_user->name }}</h5>
                        <span class="text-muted extra-small ms-2">{{ $comment->CarbonDate->diffForHumans() }}</span>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="line-clamp me-auto">
                            @if(!auth()->check())
                                {{--                                <p>{{ str_replace("/[\S]/", '*', "Hello! Yeah, I'm going to meet my friend of mine at the departments stores now.") }}</p>--}}
                                <p>{{ preg_replace("/[\S]/", '*',  $comment->comment ) }}</p>
                            @else
                                <p>{{ $comment->comment }}</p>
                            @endif
                            {{--                                <p>{{ preg_match_all("/[\w+]/", "Hello! Yeah, I'm going to meet my friend of mine at the departments stores now.", $matches)}}</p>--}}
                            {{--                                <pre>--}}
                            {{--                                    {{ print_r($matches) }}--}}
                            {{--                                </pre>--}}
                        </div>
                        @if(auth()->check() && auth()->user()->id == $comment->user_id)
                        <div class="badge badge-circle bg-primary ms-5">
                            <span>3</span>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
