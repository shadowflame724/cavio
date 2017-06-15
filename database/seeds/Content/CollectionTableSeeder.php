<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class CollectionTableSeeder.
 */
class CollectionTableSeeder extends Seeder
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
        $this->truncate(config('collections_table'));

        $collections = [
            [
                'title'       => 'About us',
                'description'       => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'image' => '1111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'       => 'Contact us',
                'description'       => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'image' => '1111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table(config('collections_table'))->insert($collections);

        $this->enableForeignKeys();
    }
}
