@extends('admin.layout')
@section('menu')
    @include('admin.menu')
@endsection
@section('create')
{{--        <p>{{  }}</p>--}}
        <form action="{{ route("admin.{$data['class_name']}.store") }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputLogin">Login</label>
                    <input name="login" type="text" class="form-control" id="exampleInputLogin" placeholder="Login" value="{{ old('login') }}">
                    <p class="text-danger">@error('login'){{ $message }}@enderror</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}">
                    <p class="text-danger">@error('email'){{ $message }}@enderror</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password" value="{{ old('password') }}">
                    <p class="text-danger">@error('password'){{ $message }}@enderror</p>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputRole">Role</label>
                <select class="custom-select rounded-0" name="role_id" id="exampleInputRole">
                    <option value="{{ '' }}">Not role</option>
                    @foreach($data['role'] as $role_id => $role_name)
                        <option value="{{ $role_id }}">{{ $role_name }}</option>
                    @endforeach
                </select>
                <p class="text-danger">@error('role_id'){{ $message }}@enderror</p>
            </div>
            <!-- /.card-body -->
                <a href="{{ route("admin.{$data['class_name']}.index") }}"><button type="button" class="btn btn-dark btn-lg">Back</button></a>
                <button type="submit" class="btn btn-primary" style="margin-left: 90%">Submit</button>

        </form>
@endsection
