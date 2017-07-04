<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class ZoneTableSeeder.
 */
class ZoneTableSeeder extends Seeder
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
        $this->truncate('zones');

        $zones = [
            [
                'title' => 'Entrances',
                'title_ru' => 'Подъезды',
                'title_it' => 'Ingressi',
                'slug' => 'entrances',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Living',
                'title_ru' => 'Жизнь',
                'title_it' => 'Vita',
                'slug' => 'living',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Dining',
                'title_ru' => 'Обеденный',
                'title_it' => 'Cenare',
                'slug' => 'dining',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Bedrooms',
                'title_ru' => 'Cпальни',
                'title_it' => 'Camere da letto
',
                'slug' => 'bedrooms',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Studio',
                'title_ru' => 'Cтудия',
                'title_it' => 'Studio',
                'slug' => 'studio',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Kids Bedrooms',
                'title_ru' => 'Детские спальни',
                'title_it' => 'Camere per bambini',
                'slug' => 'kids-bedrooms',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]

        ];

        DB::table('zones')->insert($zones);

        $this->enableForeignKeys();
    }
}
