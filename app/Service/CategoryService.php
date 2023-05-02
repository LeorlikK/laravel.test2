<?php
namespace App\Service;

use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;


class CategoryService
{
    const CLASS_NAME = 'categories';
    function all($return): object
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                self::CLASS_NAME => Category::paginate(10),
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
                self::CLASS_NAME => Category::all(),
            ];
        } catch (\Exception $exception) {
            return abort('500');
        }
        return view($return, compact('data'));
    }

    function create_post(CategoryRequest $request, $return): object
    {
        $request = $request->validated();
        try {
            Category::firstOrCreate($request);
        } catch (\Exception $exception){
            return abort('500');
        }
        return redirect()->route($return);
    }

    function read(Category $item, $page, $return): object
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                self::CLASS_NAME => Category::find($item->id)
            ];
        } catch (\Exception $exception){
            return abort('500');
        }
        return view($return, compact('data', 'page'));
    }

    function update_get(Category $item, $page, $return): object
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                self::CLASS_NAME => Category::find($item->id)
            ];
        } catch (\Exception $exception){
            return abort('500');
        }
        return view($return, compact('data',  'page'));
    }

    function update_post(CategoryRequest $request, Category $patch, $return):object
    {
        $request = $request->validated();

        try {
            $patch->update([
                'name'=>$request['name'],
            ]);
        } catch (\Exception $exception){
            return abort('500');
        }
        return redirect()->route($return);
    }

    function delete(Category $delete): object
    {
        try {
            $delete->delete();
        } catch (\Exception $exception){
            return abort('500');
        }
        return redirect()->route('admin.categories.index');
    }
}
