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
        $this->call(FaqTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ZoneTableSeeder::class);
        $this->call(CollectionZonesTableSeeder::class);
        $this->call(ShowroomTableSeeder::class);
        $this->call(PopupTableSeeder::class);
        $this->call(FinishTissueTableSeeder::class);


        $this->enableForeignKeys();
    }
}
