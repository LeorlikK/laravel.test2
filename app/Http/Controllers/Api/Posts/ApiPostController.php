<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Requests\Api\Post\ApiPostRequest;
use App\Http\Resources\Api\Post\ApiPostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class ApiPostController
{

    public function index()
    {
        $posts = Post::all();
        return ApiPostResource::collection($posts)->resolve();
    }

    public function create(ApiPostRequest $request)
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
            return response()->json($exception->getMessage(), $exception->getCode());
        }
        return ApiPostResource::make($post)->resolve();
    }

    public function read(Post $post)
    {

    }

    public function update(ApiPostRequest $request, Post $patch)
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

        return ApiPostResource::make($patch)->resolve();
    }

    public function delete(Post $post)
    {

    }
}
