@extends('admin.layout')
@section('menu')
    @include('admin.menu')
@endsection
@section('read')
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
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{ route("admin.{$data['class_name']}.index", ['page=' . $page]) }}"><button type="button" class="btn btn-dark btn-lg">Back</button></a>
{{--            @if(auth()->check())--}}
{{--                <a href="{{ route('admin.posts.like')}}">Like</a>--}}
{{--                <a href="{{ event(new \App\Events\CommentCreated($data[$data['class_name']])) }}">Like</a>--}}
{{--            @else--}}
{{--            @endif--}}
        </div>
        <div class="container">
            <div class="col-md-4">
                <div class="row-cols-1">
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

                </div>
                <div class="row-cols-2">
                    <p>Likes: {{ $data[$data['class_name']]->all_like() }}</p>
                </div>
            </div>
        </div>
@endsection
