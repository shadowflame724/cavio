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
        $this->truncate('markers');

        for ($i = 1; $i < 6; $i++) {

            $markers = [
                [
                    'collection_id' => $i,
                    'title' => 'Default title',
                    'code' => 11111,
                    'x' => '0.3',
                    'y' => '0.5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'collection_id' => $i,
                    'title' => 'Default title',
                    'code' => 11111,
                    'x' => '0.3',
                    'y' => '0.5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'collection_id' => $i,
                    'title' => 'Default title',
                    'code' => 11111,
                    'x' => '0.3',
                    'y' => '0.5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'collection_id' => $i,
                    'title' => 'Default title',
                    'code' => 11111,
                    'x' => '0.3',
                    'y' => '0.5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'collection_id' => $i,
                    'title' => 'Default title',
                    'code' => 11111,
                    'x' => '0.3',
                    'y' => '0.5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ];
            DB::table('markers')->insert($markers);
        }


        $this->enableForeignKeys();
    }
}
