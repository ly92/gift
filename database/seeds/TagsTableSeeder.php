<?php
/**
 * Created by PhpStorm.
 * User: ly
 * Date: 2019/1/14
 * Time: 16:50
 */


use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    public function run(){
        Tag::truncate();
        factory(Tag::class, 5)->create();
    }
}