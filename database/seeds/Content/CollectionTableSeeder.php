<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class CollectionTableSeeder.
 */
class CollectionTableSeeder extends Seeder
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
        $this->truncate('collections');

        $collections = [
            [
                'title' => 'Villa Cannes',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'image' => 'banner-main-1.jpg',
                'banner' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Penthouse',
                'description' => 'Furnishings art déco flavor. Cavio is the Italian furniture brand that offers its customers a wide selection of home furnishings that allow beautify any environment, with taste and functionality. ',
                'image' => 'banner-main-2.jpg',
                'banner' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Villa Cannes',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'image' => 'banner-main-3.jpg',
                'banner' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Verona',
                'description' => '',
                'image' => 'verona-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Manhattan',
                'description' => '',
                'image' => 'manhattan-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Cannes',
                'description' => '',
                'image' => 'cannes-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Verona',
                'description' => '',
                'image' => 'verona-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Manhattan',
                'description' => '',
                'image' => 'manhattan-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Cannes',
                'description' => '',
                'image' => 'cannes-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('collections')->insert($collections);

        $this->enableForeignKeys();
    }
}
