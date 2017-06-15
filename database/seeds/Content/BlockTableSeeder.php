<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class BlockTableSeeder.
 */
class BlockTableSeeder extends Seeder
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
        $this->truncate(config('blocks_table'));

        $blocks = [
            [
                'page_id'       => 1,
                'title'       => 'About us',
                'preview' => 'PREVIEWWWWWWWWWWWWWWWWWw',
                'body'       => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'image' => '1111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id'       => 1,
                'title'       => 'Contact us',
                'preview' => 'PREVIEWWWWWWWWWWWWWWWWWw',
                'body'       => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'image' => '1111.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table(config('blocks_table'))->insert($blocks);

        $this->enableForeignKeys();
    }
}
