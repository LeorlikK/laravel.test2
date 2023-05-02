<?php
namespace App\Service;

use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Http\Requests\Admin\Tag\TagRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use Throwable;

class TagService
{
    const CLASS_NAME = "tags";

    function db(callable $rec)
    {
        try {
            DB::beginTransaction();
            $data = $rec();
            DB::commit();
        } catch (\Throwable $exception){
            DB::rollBack();
            return $exception->getMessage();

        }
        return $data;
    }

    function all($return): object
    {
        $data = $this->db(function (): array{
            $data = [
                'class_name' => self::CLASS_NAME,
                self::CLASS_NAME => Tag::paginate(2)
            ];
            return $data;
        });

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

    function create_post(TagRequest $request, $return): object
    {
        $request = $request->validated();
        try {
            Tag::firstOrCreate($request);
        } catch (\Exception $exception){
            return abort('500');
        }
        return redirect()->route($return);
    }

    function read(Tag $item, $page, $return): object
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                self::CLASS_NAME => Tag::find($item->id),
            ];
        } catch (\Exception $exception){
            return abort('500');
        }
        return view($return, compact('data', 'page'));
    }

    function update_get(Tag $item, $page, $return): object
    {
        try {
            $data = [
                'class_name' => self::CLASS_NAME,
                self::CLASS_NAME => Tag::find($item->id)
            ];
        } catch (\Exception $exception){
            return abort('500');
        }
        return view($return, compact('data',  'page'));
    }

    function update_post(TagRequest $request, Tag $patch, $return)
    {
        $request = $request->validated();

        try {
            $patch->update([
                'name'=>$request['name'],
            ]);
            Post::where('id', '=', 50)->get();
        } catch (\Exception $exception){
            return abort('500');
        }
        return redirect()->route($return);
    }

    function delete(Tag $delete): object
    {
        try {
            $delete->delete();
        } catch (\Exception $exception){
            return abort('500');
        }
        return redirect()->route('admin.tags.index');
    }
}
