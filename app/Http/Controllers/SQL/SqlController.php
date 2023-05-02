<?php

namespace App\Http\Controllers\SQl;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SqlController extends Controller
{
    public function index()
    {
        dd(111);
        $idTest = 1;
        $nameTest = 'users';
            try {
                DB::beginTransaction();
//                $post = DB::select("SELECT * FROM $nameTest where `id` = $idTest");
//                $post = DB::insert("INSERT INTO `posts`(`id`, `category_id`, `title`, `text`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '1', 'sql test TWO', 'sql text', NULL, NULL, NULL, NULL)");
//                $post = DB::update("UPDATE `posts` SET `title` = 'Update Title', `text` = 'Error TWO' WHERE `posts`.`id` = 2;");
//                $post = DB::delete("DELETE FROM `posts` WHERE `posts` . 'id' = 15");
//                $post = DB::select("SELECT `categories`.`name` FROM `posts` INNER JOIN `categories` ON `posts`.`category_id` = `categories` . `id`");
//                $post = DB::select("SELECT `tags`.`name` FROM `posts` INNER JOIN `post_tags` ON `posts`.`id` = `post_tags` . `post_id` INSERT JOIN `tags` ON `tags` . `id` = `post_tags` . `tag_id`");
                DB::commit();
            } catch (\Throwable $exception) {
                DB::rollBack();
                return $exception->getMessage();
            }

        return $post;



    }


//$db_host = "localhost";
//$db_name = "adminpanel";
//$db_username = "root";
//$db_pass = "root";
//try {
//$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_pass);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $exception) {
//    echo "Connection failed: " . $exception->getMessage();
//    die('Error!');
//}

                                        //$msql_connect = mysqli_connect('localhost', 'root', 'root', 'registration');

//$query = mysqli_query($conn, "SELECT * FROM `users`");
//
//$mysqli = mysqli_connect()
//$msql_connect = new mysqli('localhost', 'root', 'root', 'sait'); //'registration'
//if (! $msql_connect){
//    die('Error connect DataBase');
//}
//if ($msql_connect->connect_error) {
//    echo 'No_connect';
//    die('Error connect DataBase');
//} else {
//    echo 'Yes_connect';
//}
//INSERT INTO `users` (`id`, `email`, `password`, `public`) VALUES (NULL, 'leorlik@yandex.ru', '123', '1');
}
