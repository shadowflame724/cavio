<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class CollectionZonesTableSeeder.
 */
class CollectionZonesTableSeeder extends Seeder
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
        $this->truncate('collection_zones');

        $collectionZones = [
            [
                'zone_id' => '1',
                'collection_id' => '4',
                'title' => 'Entrance1',
                'slug' => 'entrance1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '1',
                'collection_id' => '5',
                'title' => 'Entrance1',
                'slug' => 'entrance1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '1',
                'collection_id' => '6',
                'title' => 'Entrance1',
                'slug' => 'entrance1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '1',
                'collection_id' => '7',
                'title' => 'Entrance1',
                'slug' => 'entrance1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '1',
                'collection_id' => '8',
                'title' => 'Entrance1',
                'slug' => 'entrance1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '1',
                'collection_id' => '9',
                'title' => 'Entrance1',
                'slug' => 'entrance1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '2',
                'collection_id' => '4',
                'title' => 'Living1',
                'slug' => 'living1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '2',
                'collection_id' => '5',
                'title' => 'Living1',
                'slug' => 'living1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '2',
                'collection_id' => '6',
                'title' => 'Living1',
                'slug' => 'living1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '2',
                'collection_id' => '7',
                'title' => 'Living1',
                'slug' => 'living1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '2',
                'collection_id' => '8',
                'title' => 'Living1',
                'slug' => 'living1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '2',
                'collection_id' => '9',
                'title' => 'Living1',
                'slug' => 'living1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '3',
                'collection_id' => '4',
                'title' => 'Dining1',
                'slug' => 'dining1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '3',
                'collection_id' => '5',
                'title' => 'Dining1',
                'slug' => 'dining1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '3',
                'collection_id' => '6',
                'title' => 'Dining1',
                'slug' => 'dining1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '3',
                'collection_id' => '7',
                'title' => 'Dining1',
                'slug' => 'dining1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '3',
                'collection_id' => '8',
                'title' => 'Dining1',
                'slug' => 'dining1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '3',
                'collection_id' => '9',
                'title' => 'Dining1',
                'slug' => 'dining1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '4',
                'collection_id' => '4',
                'title' => 'Bedrooms1',
                'slug' => 'bedrooms1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '4',
                'collection_id' => '5',
                'title' => 'Bedrooms1',
                'slug' => 'bedrooms1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '4',
                'collection_id' => '6',
                'title' => 'Bedrooms1',
                'slug' => 'bedrooms1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '4',
                'collection_id' => '7',
                'title' => 'Bedrooms1',
                'slug' => 'bedrooms1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '4',
                'collection_id' => '8',
                'title' => 'Bedrooms1',
                'slug' => 'bedrooms1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '4',
                'collection_id' => '9',
                'title' => 'Bedrooms1',
                'slug' => 'bedrooms1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '5',
                'collection_id' => '4',
                'title' => 'Studio1',
                'slug' => 'studio1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '5',
                'collection_id' => '5',
                'title' => 'Studio1',
                'slug' => 'studio1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '5',
                'collection_id' => '6',
                'title' => 'Studio1',
                'slug' => 'studio1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '5',
                'collection_id' => '7',
                'title' => 'Studio1',
                'slug' => 'studio1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '5',
                'collection_id' => '8',
                'title' => 'Studio1',
                'slug' => 'studio1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '5',
                'collection_id' => '9',
                'title' => 'Studio1',
                'slug' => 'studio1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '6',
                'collection_id' => '4',
                'title' => 'Kids Bedroom1',
                'slug' => 'kids-bedroom1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '6',
                'collection_id' => '5',
                'title' => 'Kids Bedroom1',
                'slug' => 'kids-bedroom1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '6',
                'collection_id' => '6',
                'title' => 'Kids Bedroom1',
                'slug' => 'kids-bedroom1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '6',
                'collection_id' => '7',
                'title' => 'Kids Bedroom1',
                'slug' => 'kids-bedroom1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '6',
                'collection_id' => '8',
                'title' => 'Kids Bedroom1',
                'slug' => 'kids-bedroom1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'zone_id' => '6',
                'collection_id' => '9',
                'title' => 'Kids Bedroom1',
                'slug' => 'kids-bedroom1',
                'image' => 'zon-col-list-long.jpg',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        DB::table('collection_zones')->insert($collectionZones);

        $this->enableForeignKeys();
    }
}
