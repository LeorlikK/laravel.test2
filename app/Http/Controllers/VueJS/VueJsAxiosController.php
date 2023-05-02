<?php

namespace App\Http\Controllers\VueJS;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostSearchFilter;
use App\Http\Requests\Admin\Post\PostSearchRequest;
use App\Http\Requests\VUE\VueReqquest;
use App\Http\Requests\VUE\VueUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class VueJsAxiosController extends Controller
{
    public function index()
    {
        $posts = Post::limit(5)->get();

        return $posts;
    }
    public function store(VueReqquest $vueReqquest)
    {
        return $vueReqquest->validated();
    }

    public function show()
    {
        $posts = Post::limit(5)->get();

        return $posts;
    }

    public function edit(Post $vue_j)
    {
        dd($vue_j);
        return view('welcome');
    }

    public function update(VueUpdateRequest $vueUpdateRequest, Post $vue_js_axio) #Post
    {
        try {
            $vueUpdateRequest = $vueUpdateRequest->validated();
            $vue_js_axio->update($vueUpdateRequest);
        } catch (\Exception $exception) {
            return  $exception->getMessage();
        }

        return $vue_js_axio;
    }

    public function destroy(Post $vue_js_axio)
    {
        $vue_js_axio->tag()->detach();
//        $vue_js_axio->delete();
//        return response(['Delete']);
    }
//    const CLASS_NAME = "posts";
//
//    function index(PostSearchRequest $request): object
//    {
//        $request = array_filter($request->validated());
//
//        try {
//            $data = [
//                'class_name' => self::CLASS_NAME,
//                'request' => $request,
//                self::CLASS_NAME => PostSearchFilter::post_filter(Post::query(), $request)->paginate(10)
//            ];
//        } catch (\Exception $exception){
//            return abort('500');
//        }
//
//        return view('', compact('data'));
//    }
//
//    function create(VueReqquest $vueReqquest): array
//    {
//        dd($vueReqquest);
//        try {
//            $data = [
//                'class_name' => self::CLASS_NAME,
//                'categories' => Category::all(),
//                'tags' => Tag::all(),
//            ];
//        } catch (\Exception $exception) {
//            return abort('500');
//        }
//
//        return $data;
//    }
//
//    function store(PostRequest $request, $return): object
//    {
//        $request = $request->validated();
//        if (isset($request['tags_id'])){
//            $tags_id = $request['tags_id'];
//            unset($request['tags_id']);
//        }
//
//        try {
//            if (isset($request['image'])) $request['image'] = Storage::disk('public')->put('/images', $request['image']);
//            $post = Post::firstOrCreate($request);
//            if (isset($tags_id)){
//                $post->tag()->attach($tags_id);
//            }
//        } catch (\Exception $exception){
//            abort('404');
//        }
//        return redirect()->route($return, [$post->id]);
//    }
//
//    function show(Post $item, $page, $return): object
//    {
//        try {
//            $data = [
//                'class_name' => self::CLASS_NAME,
//                self::CLASS_NAME => Post::find($item->id)
//            ];
//        } catch (\Exception $exception){
//            return abort('404');
//        }
//        return view($return, compact('data', 'page'));
//    }
//
//    function edit(Post $item, $page, $return): object
//    {
//        try {
//            $data = [
//                'class_name' => self::CLASS_NAME,
//                self::CLASS_NAME => Post::find($item->id),
//                CategoryService::CLASS_NAME => Category::all(),
//                TagService::CLASS_NAME => Tag::all()
//            ];
//        } catch (\Exception $exception){
//            return abort('404');
//        }
//        return view($return, compact('data',  'page'));
//    }
//
//    function update(PostRequest $request, Post $patch, $return):object
//    {
//        $request = $request->validated();
//
//        if (isset($request['image'])) {
//            if ($patch->image != null){
//                Storage::disk('public')->delete('/images', $patch->image);
//            }
//            $request['image'] = Storage::disk('public')->put('/images', $request['image']);
//        }
//
//        if (isset($request['tags_id'])) {
//            $tags_id = $request['tags_id'];
//            unset($request['tags_id']);
//        }
////        if (isset($request['image'])) $request['image'] = Storage::disk('public')->put('/images' , $request['image']);
//        try {
//            $patch->update($request);
//            if (isset($tags_id)){
//                $patch->tag()->sync($tags_id);
//            } else {
//                $array = [];
//                $patch->tag()->sync($array);
//            }
//        } catch (\Exception $exception){
//            return abort('404');
//        }
//        return redirect()->route($return);
//    }
//
//    function destroy(Post $delete): object
//    {
//        try {
//            if (isset($delete->tag[0])) $delete->tag()->sync([]);
//            if ($delete->image != null) Storage::disk('public')->delete('/images', $delete->image);
//            $delete->delete();
//        } catch (\Exception $exception){
//            return abort('404');
//        }
//        return redirect()->route('admin.posts.index');
//    }
}
