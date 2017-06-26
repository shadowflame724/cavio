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
                    'title' => 'Writing desks',
                    'code' => '#DG310',
                    'x' => '14',
                    'y' => '60',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'collection_id' => $i,
                    'title' => 'Writing desks',
                    'code' => '#DG310',
                    'x' => '36',
                    'y' => '48',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'collection_id' => $i,
                    'title' => 'Writing desks',
                    'code' => '#DG310',
                    'x' => '45',
                    'y' => '20.5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'collection_id' => $i,
                    'title' => 'Writing desks',
                    'code' => '#DG310',
                    'x' => '63.2',
                    'y' => '51',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'collection_id' => $i,
                    'title' => 'Writing desks',
                    'code' => '#DG310',
                    'x' => '77',
                    'y' => '62',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ];
            DB::table('markers')->insert($markers);
        }


        $this->enableForeignKeys();
    }
}
