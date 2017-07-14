<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class FinishTissueTableSeeder.
 */
class FinishTissueTableSeeder extends Seeder
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
        $this->truncate('finish_tissues');

        $finishes = [
            [
                'title' => 'Tessuti 2014',
                'type' => 'finish',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Verona',
                'type' => 'finish',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Neutri',
                'type' => 'finish',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Oro',
                'type' => 'finish',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Marrone',
                'type' => 'finish',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Viola',
                'type' => 'finish',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Entrances',
                'type' => 'tissue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Living',
                'type' => 'tissue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Dining',
                'type' => 'tissue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Studio',
                'type' => 'tissue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Some tissue',
                'type' => 'tissue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Some tissue 2',
                'type' => 'tissue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('finish_tissues')->insert($finishes);

        /*
         * Child
         */


        for ($i = 1; $i < 7; $i++) {
            $finishes = [
                [
                    'parent_id' => $i,
                    'title' => 'TS437A',
                    'type' => 'finish',
                    'image' => 'fit_tis_1.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'parent_id' => $i,
                    'title' => 'TS437A',
                    'type' => 'finish',

                    'image' => 'fit_tis_1.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'parent_id' => $i,
                    'title' => 'TS437A',
                    'type' => 'finish',

                    'image' => 'fit_tis_1.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'parent_id' => $i,
                    'title' => 'TS437A',
                    'type' => 'finish',

                    'image' => 'fit_tis_1.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'parent_id' => $i,
                    'title' => 'TS437A',
                    'type' => 'finish',

                    'image' => 'fit_tis_1.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ];
            DB::table('finish_tissues')->insert($finishes);
        }

        $this->enableForeignKeys();
    }
}
