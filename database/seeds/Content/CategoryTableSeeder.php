<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryTableSeeder.
 */
class CategoryTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('categories_table'));

        $categories = [
            [
                'parent_id'       => 0,
                'lft'       => 1,
                'rgt'       => 2,
                'depth'       => 1,
                'name'       => 'root_name',
                'image'       => '111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'       => 0,
                'lft'       => 1,
                'rgt'       => 2,
                'depth'       => 1,
                'name'       => 'root_name',
                'image'       => '111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'       => 1,
                'lft'       => 1,
                'rgt'       => 2,
                'depth'       => 1,
                'name'       => 'root_name',
                'image'       => '111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'       => 1,
                'lft'       => 1,
                'rgt'       => 2,
                'depth'       => 1,
                'name'       => 'root_name',
                'image'       => '111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table(config('categories_table'))->insert($categories);

        $this->enableForeignKeys();
    }
}
