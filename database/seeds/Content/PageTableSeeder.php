<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class PageTableSeeder.
 */
class PageTableSeeder extends Seeder
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
        $this->truncate('pages');

        $pages = [
            [
                'pageKey' => 'about',
                'title' => 'About us',
                'description' => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pageKey' => 'contacts',
                'title' => 'Contact us',
                'description' => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pageKey' => 'faq',
                'title' => 'Questions',
                'description' => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pageKey' => 'news',
                'title' => 'News',
                'description' => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pageKey' => 'showrooms',
                'title' => 'Showrooms',
                'description' => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pageKey' => 'payments',
                'title' => 'Payments and delivery',
                'description' => '<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('pages')->insert($pages);

        $this->enableForeignKeys();
    }
}
