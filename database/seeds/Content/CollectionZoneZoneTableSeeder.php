<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class CollectionZoneZoneTableSeeder.
 */
class CollectionZoneZoneTableSeeder extends Seeder
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
        $this->truncate('collection_zone_zone');

        for ($i = 1; $i < 7; $i++) {
            $collectionZones = [
                [
                    'collection_zone_id' => $i,
                    'zone_id' => '1',
                ],
                [
                    'collection_zone_id' => $i + 6,
                    'zone_id' => '2',
                ],
                [
                    'collection_zone_id' => $i + 12,
                    'zone_id' => '3',
                ],
                [
                    'collection_zone_id' => $i + 18,
                    'zone_id' => '4',
                ],
                [
                    'collection_zone_id' => $i + 24,
                    'zone_id' => '5',
                ],
                [
                    'collection_zone_id' => $i + 30,
                    'zone_id' => '6',
                ]
            ];

            DB::table('collection_zone_zone')->insert($collectionZones);
        }

        $this->enableForeignKeys();
    }
}
