<?php

use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
 * Class ContentTableSeeder.
 */
class ContentTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->call(PageTableSeeder::class);
        $this->call(BlockTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(CollectionTableSeeder::class);
        $this->call(MarkerTableSeeder::class);


        $this->enableForeignKeys();
    }
}
