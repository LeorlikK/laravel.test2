@extends('admin.layout')

@section('menu')
    @include('admin.personal_menu')
@endsection

@section('table')
    <div class="row">
        <div class="col-12">
            <div class="card">
                {{--                @include('admin.card_header')--}}
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Comments</th>
                            <th>Text</th>
                            <th>Post</th>

                            {{--                            <th>--}}
                            {{--                                <form href="{{"admin.{$data['class_name']}.index"}}"><button style="background:none;border:none;margin:0;padding:0;cursor: pointer"></button>Date Update--}}
                            {{--                                    <input type="hidden" name="date_update" value="order">--}}
                            {{--                                </form>--}}
                            {{--                            </th>--}}
                            <th>Date Update</th>
                            <th>Date Create</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data[$data['class_name']] as $item)
                            <tr>
                                <td>{{count($item->comment_post->post_comment)}}</td>
                                <td>{!!  \Illuminate\Support\Str::limit( $item->comment, 40) !!}</td>
                                <td><a href="{{ route("admin.posts.show", [$item->comment_post->id]) }}">{{ $item->comment_post->title }}</a></td>

                                <td><span class="tag tag-success">{{ $item->updated_at }}</span></td>
                                <td><span class="tag tag-success">{{ $item->created_at }}</span></td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">

                                        <a href="{{ route("admin.posts.show", [$item->comment_post->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <form action="{{ route("admin.personal.comments.destroy", $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"><i class="fas fa-trash text-danger border-0 bg-transparent"  role="button"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    {{--    @include('admin.pagination_and_create')--}}
@endsection



{{--    <p>{{ $data[$data['class_name']] }}</p>--}}
{{--    <hr>--}}
{{--    <p>{{ $data[$data['class_name']]->comment_post }}</p>--}}
{{--    <hr>--}}
{{--    <p>{{ $data[$data['class_name']]->comment_user }}</p>--}}
{{--    <hr>--}}
{{--    <p>{{ $data['posts']->post_comment }}</p>--}}
{{--    <hr>--}}
{{--    <p>{{ $data['users']->user_comment }}</p>--}}

{{--    @foreach($data[$data['class_name']] as $comment)--}}
{{--        <p>{{ $comment->comment }}</p>--}}
{{--        <p>{{ $comment->comment_post->title }}</p>--}}
{{--    @endforeach--}}


