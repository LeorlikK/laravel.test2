@extends('admin.layout')
@section('menu')
    @include('admin.menu')
@endsection
@section('read')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data[$data['class_name']]->name }}" READONLY>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data[$data['class_name']]->email }}" READONLY>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{ route("admin.{$data['class_name']}.index", ['page=' . $page]) }}"><button type="button" class="btn btn-dark btn-lg">Back</button></a>
        </div>

@endsection
