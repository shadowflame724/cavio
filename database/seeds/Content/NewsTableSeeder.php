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
                'title' => 'Правильный свет или гармоничное освещение в интерьере',
                'preview' => 'Проводя эксперименты со светом, можно создать любое настроение в
                                    помещении, будь то праздничное мероприятие или романтическое уединение.',
                'description' => '',
                'type' => 'news',
                'body' => '...',
                'image' => 'news1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'CAVIO Official Promo',
                'preview' => '',
                'type' => 'news',
                'description' => '',
                'body' => '...',
                'image' => 'news2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Правильный свет или гармоничное освещение в интерьере',
                'preview' => 'Проводя эксперименты со светом, можно создать любое настроение в
                                    помещении, будь то праздничное мероприятие или романтическое уединение.',
                'description' => '',
                'type' => 'news',
                'body' => '...',
                'image' => 'news1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'CAVIO Official Promo',
                'preview' => '',
                'type' => 'news',
                'description' => '',
                'body' => '...',
                'image' => 'news2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Правильный свет или гармоничное освещение в интерьере',
                'preview' => 'Проводя эксперименты со светом, можно создать любое настроение в
                                    помещении, будь то праздничное мероприятие или романтическое уединение.',
                'description' => '',
                'type' => 'news',
                'body' => '...',
                'image' => 'news1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'CAVIO Official Promo',
                'preview' => '',
                'type' => 'news',
                'description' => '',
                'body' => '...',
                'image' => 'news2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Правильный свет или гармоничное освещение в интерьере',
                'preview' => 'Проводя эксперименты со светом, можно создать любое настроение в
                                    помещении, будь то праздничное мероприятие или романтическое уединение.',
                'description' => '',
                'type' => 'news',
                'body' => '...',
                'image' => 'news1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'CAVIO Official Promo',
                'preview' => '',
                'type' => 'news',
                'description' => '',
                'body' => '...',
                'image' => 'news2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Правильный свет или гармоничное освещение в интерьере',
                'preview' => 'Проводя эксперименты со светом, можно создать любое настроение в
                                    помещении, будь то праздничное мероприятие или романтическое уединение.',
                'description' => '',
                'type' => 'news',
                'body' => '...',
                'image' => 'news1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'CAVIO Official Promo',
                'preview' => '',
                'type' => 'news',
                'description' => '',
                'body' => '...',
                'image' => 'news2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Правильный свет или гармоничное освещение в интерьере',
                'preview' => 'Проводя эксперименты со светом, можно создать любое настроение в
                                    помещении, будь то праздничное мероприятие или романтическое уединение.',
                'description' => '',
                'type' => 'news',
                'body' => '...',
                'image' => 'news1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'CAVIO Official Promo',
                'preview' => '',
                'type' => 'news',
                'description' => '',
                'body' => '...',
                'image' => 'news2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('news')->insert($news);

        $this->enableForeignKeys();
    }
}
