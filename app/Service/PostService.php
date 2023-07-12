<?php
namespace App\Service;

use App\Http\Filters\PostSearchFilter;
use App\Http\Requests\Admin\Post\PostRequest;
use App\Http\Requests\Admin\Post\PostSearchRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostService
{
    const CLASS_NAME = "posts";

    function all(PostSearchRequest $request, $return): object
    {
        $request = array_filter($request->validated());

        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                'request' => $request,
                self::CLASS_NAME => PostSearchFilter::post_filter(Post::query(), $request)->paginate(10)
            ];
        } catch (\Exception $exception){
            return abort('500');
        }

        return view($return, compact('data'));
    }

    function create_get($return): object
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                CategoryService::CLASS_NAME => Category::all(),
                TagService::CLASS_NAME => Tag::all(),
            ];
        } catch (\Exception $exception) {
            return abort('500');
        }
        return view($return, compact('data'));
    }

    function create_post(PostRequest $request, $return): object
    {
        $request = $request->validated();
        if (isset($request['tags_id'])){
            $tags_id = $request['tags_id'];
            unset($request['tags_id']);
        }

        try {
            if (isset($request['image'])) $request['image'] = Storage::disk('public')->put('/images', $request['image']);
            $post = Post::firstOrCreate($request);
            if (isset($tags_id)){
                $post->tag()->attach($tags_id);
            }
        } catch (\Exception $exception){
            abort('404');
        }
        return redirect()->route($return, [$post->id]);
    }

    function read(Post $item, $page, $return): object
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                self::CLASS_NAME => Post::find($item->id)
            ];
        } catch (\Exception $exception){
            return abort('404');
        }
        return view($return, compact('data', 'page'));
    }

    function update_get(Post $item, $page, $return): object
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                self::CLASS_NAME => Post::find($item->id),
                CategoryService::CLASS_NAME => Category::all(),
                TagService::CLASS_NAME => Tag::all()
            ];
        } catch (\Exception $exception){
            return abort('404');
        }
        return view($return, compact('data',  'page'));
    }

    function update_post(PostRequest $request, Post $patch, $return):object
    {
        $request = $request->validated();

        if (isset($request['image'])) {
            if ($patch->image != null){
                Storage::disk('public')->delete('/images', $patch->image);
            }
            $request['image'] = Storage::disk('public')->put('/images', $request['image']);
        }

        if (isset($request['tags_id'])) {
            $tags_id = $request['tags_id'];
            unset($request['tags_id']);
        }
//        if (isset($request['image'])) $request['image'] = Storage::disk('public')->put('/images' , $request['image']);
        try {
            $patch->update($request);
            if (isset($tags_id)){
                $patch->tag()->sync($tags_id);
            } else {
                $array = [];
                $patch->tag()->sync($array);
            }
        } catch (\Exception $exception){
            return abort('404');
        }
        return redirect()->route($return);
    }

    function delete(Post $delete): object
    {
        try {
            if (isset($delete->tag[0])) $delete->tag()->sync([]);
            if ($delete->image != null) Storage::disk('public')->delete('/images', $delete->image);
            $delete->delete();
        } catch (\Exception $exception){
            return abort('404');
        }
        return redirect()->route('admin.posts.index');
    }
}
