@extends('admin.layout')
@section('menu')
    @include('admin.menu')
@endsection
@section('table')
<div class="row">
    <div class="col-12">
        <div class="card">
{{--            @livewire('livewire.test-live-wire')--}}
            @livewire('TestLiveWire')
{{--            @include('admin.card_header')--}}
{{--            <div class="card-body table-responsive p-0">--}}
{{--                <table class="table table-hover text-nowrap">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>ID</th>--}}
{{--                        <th>Email</th>--}}
{{--                        <th>Login</th>--}}
{{--                        <th>Role</th>--}}
{{--                        <th>Date Update</th>--}}
{{--                        <th>Date Create</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($data[$data['class_name']] as $item)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $item->id }}</td>--}}
{{--                        <td><a href="{{ route("admin.{$data['class_name']}.show", [$item->id, $data[$data['class_name']]->currentPage()]) }}">{{ $item->email }}</a></td>--}}
{{--                        <td><a href="{{ route("admin.{$data['class_name']}.show", [$item->id, $data[$data['class_name']]->currentPage()]) }}">{{ $item->name }}</a></td>--}}
{{--                        <td><span class="tag tag-success">{{ $data['role'][$item->role] }}</span></td>--}}
{{--                        <td><span class="tag tag-success">{{ $item->updated_at }}</span></td>--}}
{{--                        <td><span class="tag tag-success">{{ $item->created_at }}</span></td>--}}

{{--                        <td class="text-right py-0 align-middle">--}}
{{--                            <div class="btn-group btn-group-sm">--}}

{{--                                <a href="{{ route("admin.{$data['class_name']}.show", [$item->id, 'page=' . $data[$data['class_name']]->currentPage()]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>--}}
{{--                                <a href="{{ route("admin.{$data['class_name']}.edit", [$item->id, 'page=' . $data[$data['class_name']]->currentPage()]) }}" class="btn btn-info"><i class="fas fa-recycle"></i></a>--}}
{{--                                <form action="{{ route("admin.{$data['class_name']}.destroy", $item->id) }}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('delete')--}}
{{--                                    <button type="submit"><i class="fas fa-trash text-danger border-0 bg-transparent"  role="button"></i></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </td>--}}

{{--                    </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
{{--@include('admin.pagination_and_create')--}}
@endsection
