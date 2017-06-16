<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class NewsTableSeeder.
 */
class NewsTableSeeder extends Seeder
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
        $this->truncate('news');

        $news = [
            [
                'title' => 'Default news',
                'preview' => 'PREVIEWWWWWWWWWWWWWWWWWw',
                'description' => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'type' => 'news',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'image' => '1111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Default news',
                'preview' => 'PREVIEWWWWWWWWWWWWWWWWWw',
                'type' => 'news',
                'description' => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'image' => '1111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('news')->insert($news);

        $this->enableForeignKeys();
    }
}
