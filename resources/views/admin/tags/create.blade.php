@extends('admin.layout')
@section('menu')
    @include('admin.menu')
@endsection
@section('create')
        <form action="{{ route("admin.{$data['class_name']}.create_post") }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" value="{{ old('name') }}">
                    <p class="text-danger">@error('name'){{ $message }}@enderror</p>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route("admin.{$data['class_name']}.all") }}"><button type="button" class="btn btn-dark btn-lg">Back</button></a>
                <button type="submit" class="btn btn-primary" style="margin-left: 90%">Submit</button>
            </div>
        </form>
@endsection
