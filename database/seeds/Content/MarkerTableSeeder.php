<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class MarkerTableSeeder.
 */
class MarkerTableSeeder extends Seeder
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
        $this->truncate(config('markers_table'));

        $markers = [
            [
                'collection_id'       => 1,
                'title'       => 'About us',
                'code'       => 11111,
                'x'       => '0.3',
                'y'       => '0.5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'collection_id'       => 1,
                'title'       => 'About us',
                'code'       => 11111,
                'x'       => '0.3',
                'y'       => '0.5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table(config('markers_table'))->insert($markers);

        $this->enableForeignKeys();
    }
}
