<?php
namespace App\Service;

use App\Models\User;

class UserService
{
    function all($return): object
    {
        try {
            DB::beginTransaction();
            $data = Post::paginate(2);
            DB::commit();
        } catch (PDOException $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return view($return, compact('data'));
    }

    function create_get($return): object
    {
        return 11111;
    }

    function create_post($return): object
    {
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (PDOException $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return 11111;
    }

    function read($return): object
    {
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (PDOException $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return 11111;
    }

    function update_get($return): object
    {
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (PDOException $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return 11111;
    }

    function update_post($return): object
    {
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (PDOException $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return 11111;
    }

    function delete($return): object
    {
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (PDOException $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return 11111;
    }
}
