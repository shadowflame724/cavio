<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryTableSeeder.
 */
class CategoryTableSeeder extends Seeder
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
        $this->truncate('categories');

        $categories = [
            [
                'parent_id' => null,
                'lft' => 1,
                'rgt' => 14,
                'depth' => 0,
                'name' => 'STORAGE & CABINETS',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => null,
                'lft' => 15,
                'rgt' => 26,
                'depth' => 0,
                'name' => 'TABLES & CONSOLES',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => null,
                'lft' => 27,
                'rgt' => 38,
                'depth' => 0,
                'name' => 'BEDS, SOFAS & SITTINGS',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => null,
                'lft' => 39,
                'rgt' => 50,
                'depth' => 0,
                'name' => 'ACCESSORIES',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 1,
                'lft' => 2,
                'rgt' => 3,
                'depth' => 1,
                'name' => 'Cabinets',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 1,
                'lft' => 4,
                'rgt' => 5,
                'depth' => 1,
                'name' => 'Wardrobes',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 1,
                'lft' => 6,
                'rgt' => 7,
                'depth' => 1,
                'name' => 'Sideboards',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 1,
                'lft' => 8,
                'rgt' => 9,
                'depth' => 1,
                'name' => 'TV-stands',
                'image' => 'M164,109.8l-2.6,6l-1,4.5v16.3h0.7l2.9,6.7h-0.6c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4H155
	c-1.3,0-2.4-1.1-2.4-2.4v-2c-0.5-0.7-0.7-1.5-0.9-2.3H47.3c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1
	c-1.3,0-2.4-1.1-2.4-2.4v-2c-0.5-0.7-0.7-1.5-0.9-2.3H35l2.9-6.7h0.7v-16.3l-1-4.5l-2.6-6h50.2v-3.8H50.9V50h97.3v56.1h-34.3v3.8
	H164z M154.4,144.7l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.6
	C153.8,143.8,154,144.3,154.4,144.7z M37.7,143.3c0.1,0.5,0.3,0.9,0.6,1.3l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4H44
	c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3H37.7z M38,141.3H161l-1.1-2.7h-41.1H80.3H39.2L38,141.3z M80.3,119.2
	h38.4h40l0.6-2.7H39.7l0.6,2.7H80.3z M40.5,121.2v15.4h39.8v-15.4H40.5z M116.7,127.9v-6.7H82.3v6.7H116.7z M82.3,129.9v6.7h34.4
	v-6.7H82.3z M118.7,121.2v15.4h39.8v-15.4H118.7z M146.2,104.1V52H52.9v52.1h32.3h28.6H146.2z M87.2,106.1v3.8h24.6v-3.8H87.2z
	 M85.2,111.8H38l1.1,2.7h120.7l1.1-2.7h-47.1H85.2z M54.9,54h89.3v48.1H54.9V54z M56.9,100.1h85.3V56H56.9V100.1z M137.7,131.8
	c-1.6,0-2.8-1.3-2.8-2.8c0-1.6,1.3-2.8,2.8-2.8c1.6,0,2.8,1.3,2.8,2.8C140.5,130.5,139.2,131.8,137.7,131.8z M137.7,128.1
	c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8c0.5,0,0.8-0.4,0.8-0.8C138.5,128.5,138.1,128.1,137.7,128.1z M61.1,131.8
	c-1.6,0-2.8-1.3-2.8-2.8c0-1.6,1.3-2.8,2.8-2.8c1.6,0,2.8,1.3,2.8,2.8C63.9,130.5,62.6,131.8,61.1,131.8z M61.1,128.1
	c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8c0.5,0,0.8-0.4,0.8-0.8C61.9,128.5,61.5,128.1,61.1,128.1z',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 1,
                'lft' => 10,
                'rgt' => 11,
                'depth' => 1,
                'name' => 'Commodes & Bedisdes',
                'image' => 'M154.4,57.3v77.6l1,4.4l2.6,5.9h-0.6c-0.1,0.8-0.4,1.6-0.9,2.2v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2
	c-0.5-0.7-0.8-1.5-0.9-2.2H54.4c-0.1,0.8-0.4,1.6-0.9,2.2v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2
	c-0.5-0.7-0.8-1.5-0.9-2.2H42l2.6-5.9l1-4.4V57.3l-1-4.4L42,46.9h116l-2.6,5.9L154.4,57.3z M148.3,146.6l0.2,0.3v2.6
	c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.7C147.8,145.8,148,146.2,148.3,146.6z
	 M45.3,146.6l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4H51c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.7
	C44.8,145.8,45,146.2,45.3,146.6z M45,143.3h109.9l-1.1-2.7H46.2L45,143.3z M152.6,56.2l0.6-2.7H46.8l0.6,2.7H152.6z M47.5,58.2V134
	h104.9V58.2H47.5z M152.6,136H47.3l-0.6,2.7h106.4L152.6,136z M45,48.9l1.1,2.7h107.6l1.1-2.7H45z M55.4,110.6h89.2v17.8H55.4V110.6
	z M57.4,126.4h85.2v-13.8H57.4V126.4z M123.6,122.9c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4
	C127.1,121.4,125.5,122.9,123.6,122.9z M123.6,118.1c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5
	C125.1,118.7,124.4,118.1,123.6,118.1z M76.4,122.9c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4
	C79.8,121.4,78.3,122.9,76.4,122.9z M76.4,118.1c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5
	C77.8,118.7,77.2,118.1,76.4,118.1z M55.4,87.2h89.2V105H55.4V87.2z M57.4,103h85.2V89.2H57.4V103z M123.6,99.6
	c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4C127.1,98,125.5,99.6,123.6,99.6z M123.6,94.7
	c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5C125.1,95.3,124.4,94.7,123.6,94.7z M76.4,99.6
	c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4C79.8,98,78.3,99.6,76.4,99.6z M76.4,94.7
	c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5C77.8,95.3,77.2,94.7,76.4,94.7z M55.4,64.2h89.2v17.8H55.4
	V64.2z M57.4,79.9h85.2V66.2H57.4V79.9z M123.6,76.5c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4
	C127.1,74.9,125.5,76.5,123.6,76.5z M123.6,71.6c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5
	C125.1,72.2,124.4,71.6,123.6,71.6z M76.4,76.5c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4
	C79.8,74.9,78.3,76.5,76.4,76.5z M76.4,71.6c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5
	C77.8,72.2,77.2,71.6,76.4,71.6z',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 1,
                'lft' => 12,
                'rgt' => 13,
                'depth' => 1,
                'name' => ' Drink Cabinets',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 2,
                'lft' => 16,
                'rgt' => 17,
                'depth' => 1,
                'name' => 'Dining Tables',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 2,
                'lft' => 18,
                'rgt' => 19,
                'depth' => 1,
                'name' => 'Consoles',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 2,
                'lft' => 20,
                'rgt' => 21,
                'depth' => 1,
                'name' => 'Coffee Tables',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 2,
                'lft' => 22,
                'rgt' => 23,
                'depth' => 1,
                'name' => 'Toiletes',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 2,
                'lft' => 24,
                'rgt' => 25,
                'depth' => 1,
                'name' => 'Writing Desks',
                'image' => 'M30,64.9v7.7h6v11.8h2.4c-0.4,0.6-0.6,1.4-0.6,2.2c0,1.3,0.6,2.4,1.5,3.2c-0.9,0.8-1.5,1.9-1.5,3.2
	c0,1.1,0.5,2.2,1.2,2.9c-0.4,0.3-0.8,0.6-1.2,1c-1,1.1-1.4,2.5-1.3,4l2.2,19.5c0.1,0.9,0.5,1.6,1.1,2.2c-0.9,0.8-1.5,1.9-1.5,3.2
	c0,0,0.1,3.6,0.6,5v1.2c0,1.1,0.9,1.9,1.9,1.9h3.3c1.1,0,1.9-0.9,1.9-1.9v-1.2c0.5-1.4,0.6-5,0.6-5c0-1.4-0.7-2.6-1.7-3.3
	c0.5-0.6,0.9-1.3,1-2.1l2.2-19.5c0.2-1.4-0.3-2.9-1.3-4c-0.3-0.3-0.6-0.6-1-0.9c0.8-0.8,1.3-1.8,1.3-3c0-1.3-0.6-2.4-1.5-3.2
	c0.9-0.8,1.5-1.9,1.5-3.2c0-0.8-0.2-1.5-0.6-2.2h2.1v-3.6h102.5v3.6h2.4c-0.4,0.6-0.6,1.4-0.6,2.2c0,1.3,0.6,2.4,1.5,3.2
	c-0.9,0.8-1.5,1.9-1.5,3.2c0,1.1,0.5,2.2,1.2,2.9c-0.4,0.3-0.8,0.6-1.2,1c-1,1.1-1.4,2.5-1.3,4l2.2,19.5c0.1,0.9,0.5,1.6,1.1,2.2
	c-0.9,0.8-1.5,1.9-1.5,3.2c0,0,0.1,3.6,0.6,5v1.2c0,1.1,0.9,1.9,1.9,1.9h3.3c1.1,0,1.9-0.9,1.9-1.9v-1.2c0.5-1.4,0.6-5,0.6-5
	c0-1.4-0.7-2.6-1.7-3.3c0.5-0.6,0.9-1.3,1-2.1l2.2-19.5c0.2-1.4-0.3-2.9-1.3-4c-0.3-0.3-0.6-0.6-1-0.9c0.8-0.8,1.3-1.8,1.3-3
	c0-1.3-0.6-2.4-1.5-3.2c0.9-0.8,1.5-1.9,1.5-3.2c0-0.8-0.2-1.5-0.6-2.2h2.1V72.7h6v-7.7H30z M44.3,130l-0.2,0.3v1.7h-3.1v-1.4l0-0.3
	l-0.2-0.3c0-0.1-0.1-0.3-0.1-0.5c0.6,0.3,1.2,0.4,1.8,0.4c0.7,0,1.3-0.2,1.9-0.5C44.3,129.7,44.3,129.9,44.3,130z M42.5,128
	c-1.2,0-2.2-1-2.2-2.2c0-1.2,1-2.2,2.2-2.2s2.2,1,2.2,2.2C44.7,127,43.7,128,42.5,128z M46.2,100.7L44,120.2
	c-0.1,0.8-0.8,1.5-1.6,1.5s-1.6-0.6-1.6-1.5l-2.2-19.5c-0.1-0.9,0.2-1.8,0.8-2.4c0.6-0.7,1.4-1,2.3-1h0.3h1.1h0.1
	c0.9,0,1.7,0.4,2.3,1C46.1,98.9,46.3,99.8,46.2,100.7z M41.9,90.9h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-1.1
	c-1.2,0-2.2-1-2.2-2.2C39.8,91.8,40.7,90.9,41.9,90.9z M39.8,86.7c0-1.2,1-2.2,2.2-2.2h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2
	h-1.1C40.7,88.9,39.8,87.9,39.8,86.7z M46.8,80.9v1.6h-3.7h-1.1H38v-9.8h8.8V80.9z M151.3,78.9H48.8v-6.2h102.5V78.9z M159.5,130
	l-0.2,0.3v1.7h-3.1v-1.4l0-0.3l-0.2-0.3c0-0.1-0.1-0.3-0.1-0.5c0.6,0.3,1.2,0.4,1.8,0.4c0.7,0,1.3-0.2,1.9-0.5
	C159.6,129.7,159.5,129.9,159.5,130z M157.8,128c-1.2,0-2.2-1-2.2-2.2c0-1.2,1-2.2,2.2-2.2s2.2,1,2.2,2.2
	C159.9,127,159,128,157.8,128z M161.5,100.7l-2.2,19.5c-0.1,0.8-0.8,1.5-1.6,1.5s-1.6-0.6-1.6-1.5l-2.2-19.5
	c-0.1-0.9,0.2-1.8,0.8-2.4c0.6-0.7,1.4-1,2.3-1h0.3h1.1h0.1c0.9,0,1.7,0.4,2.3,1C161.3,98.9,161.6,99.8,161.5,100.7z M157.2,90.9
	h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-1.1c-1.2,0-2.2-1-2.2-2.2C155,91.8,156,90.9,157.2,90.9z M155,86.7
	c0-1.2,1-2.2,2.2-2.2h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-1.1C156,88.9,155,87.9,155,86.7z M162,82.5h-3.7h-1.1h-3.9v-1.6
	v-8.2h8.8V82.5z M168,70.7h-4h-10.8h-2H48.8h-2H36h-4v-3.7h136V70.7z',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 3,
                'lft' => 28,
                'rgt' => 29,
                'depth' => 1,
                'name' => 'Beds',
                'image' => 'M166.5,61.7h-3.7c-1.3,0-2.4,1.1-2.4,2.5v0.7c-8-3.1-47.1-17.9-52.2-17.9c-2.1,0-3.6,0.5-4.6,1.5
	c-1.4,1.4-1.4,3.5-1.4,5.3l0,0.7c0,1.9-1.8,2-2.2,2c-0.2,0-2.2-0.1-2.2-2l0-0.7c0-1.8,0-3.9-1.4-5.3c-1-1-2.5-1.5-4.6-1.5
	c-5.1,0-44.3,14.9-52.2,17.9v-0.7c0-1.4-1.1-2.5-2.4-2.5h-3.7c-1.3,0-2.4,1.1-2.4,2.5v85.3c0,1.4,1.1,2.5,2.4,2.5h3.7
	c0.5,0,1-0.2,1.4-0.5c0.4,0.3,0.9,0.5,1.4,0.5h120c0.5,0,1-0.2,1.4-0.5c0.4,0.3,0.9,0.5,1.4,0.5h3.7c1.4,0,2.4-1.1,2.4-2.5V64.2
	C169,62.8,167.9,61.7,166.5,61.7z M37.6,120.8v8v2v18.7c0,0.3-0.2,0.5-0.5,0.5h-3.7c-0.3,0-0.5-0.2-0.5-0.5V75.5h4.6V120.8z
	 M37.6,73.5H33v-9.4c0-0.3,0.2-0.5,0.5-0.5h3.7c0.3,0,0.5,0.2,0.5,0.5V73.5z M160.4,149.4L160.4,149.4c0,0.3-0.2,0.5-0.4,0.5H40
	c-0.2,0-0.4-0.2-0.4-0.4v0v-18.6h120.8V149.4z M160.4,128.7H39.6v-8c0-2.6,2.1-4.8,4.7-4.8h111.4c2.6,0,4.7,2.1,4.7,4.8V128.7z
	 M59.2,113.5V97.9c0-0.3,0.2-0.5,0.5-0.5h33.6c0.2,0,0.5,0.2,0.5,0.5v15.6c0,0.3-0.2,0.5-0.5,0.5H59.7
	C59.4,113.9,59.2,113.7,59.2,113.5z M106.3,113.5V97.9c0-0.3,0.2-0.5,0.5-0.5h33.6c0.2,0,0.5,0.2,0.5,0.5v15.6
	c0,0.3-0.2,0.5-0.5,0.5h-33.6C106.5,113.9,106.3,113.7,106.3,113.5z M160.4,115.9c-1.2-1.2-2.9-2-4.7-2h-13c0-0.2,0.1-0.3,0.1-0.5
	V97.9c0-1.4-1.1-2.5-2.4-2.5h-33.6c-1.3,0-2.4,1.1-2.4,2.5v15.6c0,0.2,0,0.3,0.1,0.5h-8.7c0-0.2,0.1-0.3,0.1-0.5V97.9
	c0-1.4-1.1-2.5-2.4-2.5H59.7c-1.3,0-2.4,1.1-2.4,2.5v15.6c0,0.2,0,0.3,0.1,0.5h-13c-1.8,0-3.5,0.8-4.7,2V75.5h120.8V115.9z
	 M160.4,73.5H39.6v-3.9c20.6-7.9,49.1-17.8,52.2-17.9c0.6,0,0.9,0.1,1.1,0.1c0,0.3,0.1,1,0,1.8l0,0.7c0,4.5,3.6,6.9,7,6.9
	c3.4,0,7-2.4,7-6.9l0-0.7c0-0.9,0-1.5,0-1.8c0.2,0,0.5-0.1,1.1-0.1c3.2,0.1,31.7,10,52.3,17.9V73.5z M160.4,67.5
	c-18.9-7.2-48.4-17.7-52.2-17.8c-0.9,0-2.1,0.1-2.6,0.7c-0.5,0.5-0.6,1.4-0.5,3.3l0,0.7c0,3.2-2.6,4.9-5,4.9c-2.4,0-5-1.7-5-4.8
	l0-0.7c0-1.9,0-2.8-0.5-3.3c-0.5-0.5-1.7-0.7-2.6-0.7c0,0,0,0,0,0C88,49.8,58.4,60.3,39.6,67.5V67c13.7-5.3,48-18.1,52.2-18.1
	c1.5,0,2.6,0.3,3.2,0.9c0.8,0.8,0.8,2.3,0.8,3.9l0,0.7c0,2.9,2.5,4,4.2,4c1.7,0,4.2-1.1,4.2-4l0-0.7c0-1.6,0-3.1,0.8-3.9
	c0.6-0.6,1.7-0.9,3.2-0.9c4.3,0,38.6,12.8,52.2,18.1V67.5z M167,149.4c0,0.3-0.2,0.5-0.5,0.5h-3.7c-0.3,0-0.5-0.2-0.5-0.5v-18.7v-2
	v-8V75.5h4.6V149.4z M167,73.5h-4.6v-9.4c0-0.3,0.2-0.5,0.5-0.5h3.7c0.3,0,0.5,0.2,0.5,0.5V73.5z',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 3,
                'lft' => 30,
                'rgt' => 31,
                'depth' => 1,
                'name' => 'Benches & Poufs',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 3,
                'lft' => 32,
                'rgt' => 33,
                'depth' => 1,
                'name' => 'Sofas & Armchairs',
                'image' => 'M145.9,103.9v37.5h-0.1c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2
	c-0.5-0.7-0.7-1.5-0.9-2.3H63.8c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2
	c-0.5-0.7-0.7-1.5-0.9-2.3H52v-37.6h0.3C45.3,102.2,40,95.9,40,88.3c0-8.7,7.1-15.7,15.7-15.7c1.8,0,3.5,0.3,5.1,0.9
	C61.4,61.5,71.4,52,83.4,52h32c12.1,0,22,9.5,22.6,21.5c1.6-0.6,3.4-0.9,5.2-0.9c8.7,0,15.7,7.1,15.7,15.7
	C159,96.1,153.3,102.6,145.9,103.9z M136.7,142.7l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4V143l0.2-0.3
	c0.3-0.4,0.5-0.9,0.6-1.3h-7.6C136.2,141.8,136.4,142.3,136.7,142.7z M54.8,142.7L55,143v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1
	c0.2,0,0.4-0.2,0.4-0.4V143l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.6C54.3,141.8,54.5,142.3,54.8,142.7z M54,139.4h89.9v-35.3
	c-0.2,0-0.4,0-0.6,0c-5.9,0-11-3.3-13.7-8.1v27H69.5V96c-2.7,4.8-7.8,8.1-13.7,8.1c-0.6,0-1.2,0-1.7-0.1V139.4z M127.5,121v-11.9
	c-0.5-0.5-4.1-3.2-28-3.2s-27.6,2.7-28,3.2V121H127.5z M55.7,74.6c-7.6,0-13.7,6.2-13.7,13.7c0,7.6,6.2,13.7,13.7,13.7
	c7.6,0,13.7-6.2,13.7-13.7C69.5,80.8,63.3,74.6,55.7,74.6z M115.4,54h-32C72.2,54,63,63.1,62.8,74.3c5.1,2.6,8.7,7.9,8.7,14v18.5
	c3.1-1.5,10.6-2.9,28-2.9s24.9,1.4,28,2.9V88.3c0-6.1,3.5-11.4,8.5-14C135.9,63.1,126.7,54,115.4,54z M143.3,74.6
	c-7.6,0-13.7,6.2-13.7,13.7c0,7.6,6.2,13.7,13.7,13.7c7.6,0,13.7-6.2,13.7-13.7C157,80.8,150.8,74.6,143.3,74.6z M143.3,94.8
	c-3.6,0-6.5-2.9-6.5-6.5c0-3.6,2.9-6.5,6.5-6.5c3.6,0,6.5,2.9,6.5,6.5C149.8,91.9,146.9,94.8,143.3,94.8z M143.3,83.8
	c-2.5,0-4.5,2-4.5,4.5c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5C147.8,85.9,145.8,83.8,143.3,83.8z M115.5,94.5l-2-2l-2,2l-1.4-1.4
	l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2L115.5,94.5z M115.5,74.3l-2-2l-2,2l-1.4-1.4l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2
	L115.5,74.3z M87.4,94.5l-2-2l-2,2l-1.4-1.4l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2L87.4,94.5z M87.4,74.3l-2-2l-2,2l-1.4-1.4
	l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2L87.4,74.3z M55.7,94.8c-3.6,0-6.5-2.9-6.5-6.5c0-3.6,2.9-6.5,6.5-6.5
	c3.6,0,6.5,2.9,6.5,6.5C62.2,91.9,59.3,94.8,55.7,94.8z M55.7,83.8c-2.5,0-4.5,2-4.5,4.5c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5
	C60.2,85.9,58.2,83.8,55.7,83.8z',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 3,
                'lft' => 34,
                'rgt' => 35,
                'depth' => 1,
                'name' => 'Chairs',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 3,
                'lft' => 36,
                'rgt' => 37,
                'depth' => 1,
                'name' => 'Work Chairs',
                'image' => 'M133.9,163c-2.8,0-5.1-2.3-5.1-5.1c0-1.3,0.5-2.4,1.2-3.3c-0.7-0.1-1.5-0.2-2.2-0.4l-24.3-5.9v6.2h-0.1
	c0.8,0.9,1.3,2.1,1.3,3.3c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1c0-1.3,0.5-2.4,1.3-3.3h-0.1v-6.2l-24.3,5.9
	c-0.7,0.2-1.5,0.3-2.2,0.4c0.8,0.9,1.2,2,1.2,3.3c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1c0-1.4,0.6-2.6,1.4-3.5v-0.6
	c0-3.7,2.5-6.9,6.1-7.8l25.5-6.5V124h2.4v-5.6H75l-0.2-0.5l-6-6.5c-1.5-1.6-2.3-3.7-2.3-5.9v-15c-1.4-1.2-2.4-2.9-2.4-4.9
	c0-3.3,2.6-6.1,5.9-6.3l4.7-5.7V55.1c0-10.5,8.6-19.1,19.2-19.1H105c10.6,0,19.2,8.6,19.2,19.1v18.3l4.8,5.7c3.3,0.3,5.9,3,5.9,6.3
	c0,2-0.9,3.8-2.4,4.9v15c0,2.2-0.8,4.3-2.3,5.9l-6.1,6.5l-0.2,0.5h-20.5v5.6h2.4v15.6l25.5,6.5c3.6,0.9,6.1,4.1,6.1,7.8v0.6
	c0.9,0.9,1.4,2.2,1.4,3.5C139,160.7,136.7,163,133.9,163z M68.5,105.4c0,1.7,0.6,3.3,1.8,4.5l3,3.2l-0.2-0.5
	c-0.2-0.5-0.2-0.9-0.2-1.4l-1.3-5.2c-0.2-0.9-0.3-1.8-0.3-2.7V91.8c-0.2,0-0.5,0-0.7,0c-0.7,0-1.4-0.1-2-0.3V105.4z M74.7,76.6
	l-2.3,2.8c0.9,0.3,1.7,0.7,2.3,1.3V76.6z M74.7,84.4c-0.5-1.9-2.2-3.3-4.2-3.3c-2.4,0-4.4,2-4.4,4.4c0,2.4,2,4.4,4.4,4.4
	c2,0,3.7-1.4,4.2-3.3V84.4z M74.7,90.2c-0.4,0.4-0.9,0.7-1.5,1v12.3c0,0.3,0,0.6,0.1,0.9l1.4-3.6V90.2z M128.7,110
	c1.2-1.2,1.8-2.9,1.8-4.5V91.5c-0.6,0.2-1.3,0.3-2,0.3c-0.3,0-0.5,0-0.7,0v11.7c0,0.9-0.1,1.8-0.3,2.7l-1.4,5.3
	c0,0.4-0.1,0.9-0.2,1.3l-0.2,0.5L128.7,110z M124.2,100.8l1.5,3.6c0-0.3,0.1-0.6,0.1-0.9V91.2c-0.6-0.3-1.1-0.6-1.5-1V100.8z
	 M124.2,86.5c0.5,1.9,2.2,3.4,4.3,3.4c2.4,0,4.4-2,4.4-4.4c0-2.4-2-4.4-4.4-4.4c-2.1,0-3.8,1.4-4.3,3.4V86.5z M124.2,80.7
	c0.7-0.6,1.5-1.1,2.4-1.4l-2.4-2.9V80.7z M99.5,161c1.7,0,3.1-1.4,3.1-3.1c0-1.7-1.4-3.1-3.1-3.1c-1.7,0-3.1,1.4-3.1,3.1
	C96.4,159.6,97.8,161,99.5,161z M101.4,153.2v-11.9h-3.9v11.9c0.6-0.2,1.3-0.4,1.9-0.4C100.2,152.8,100.8,153,101.4,153.2z
	 M62,157.9c0,1.7,1.4,3.1,3.1,3.1c1.7,0,3.1-1.4,3.1-3.1c0-1.7-1.4-3.1-3.1-3.1C63.4,154.8,62,156.2,62,157.9z M68,147.9
	c-2.4,0.6-4.1,2.5-4.5,4.9h2.6c1.5,0,3.1-0.2,4.6-0.5l24.8-6v-5h-1.3L68,147.9z M122.2,86.7c-0.1-0.4-0.1-0.8-0.1-1.3
	c0-0.4,0-0.8,0.1-1.3V55.1c0-9.4-7.7-17.1-17.2-17.1H93.9c-9.5,0-17.2,7.7-17.2,17.1v29c0.1,0.4,0.2,0.9,0.2,1.4
	c0,0.5-0.1,0.9-0.2,1.4V100h45.5V86.7z M124,105.5l-1.4-3.5H76.4l-1.4,3.5c-0.2,0.5-0.1,0.9,0.1,1.3c0.3,0.4,0.7,0.6,1.2,0.6h46.3
	c0.5,0,0.9-0.2,1.2-0.6C124.1,106.4,124.1,105.9,124,105.5z M122.5,116.3l1.4-4.2c0.2-0.7,0.1-1.5-0.3-2c-0.2-0.2-0.5-0.6-1.1-0.6
	H76.4c-0.5,0-0.9,0.4-1.1,0.6c-0.4,0.6-0.5,1.3-0.3,2l1.4,4.2h19.1h7.9H122.5z M97.5,118.3v5.6h3.9v-5.6H97.5z M103.9,126h-0.4h-7.9
	h-0.4v13.4h0.4h7.9h0.4V126z M130.9,147.9l-26.2-6.6h-1.3v5l24.8,6c1.5,0.4,3,0.5,4.6,0.5h2.6C135.1,150.5,133.3,148.5,130.9,147.9z
	 M133.9,154.8c-1.7,0-3.1,1.4-3.1,3.1c0,1.7,1.4,3.1,3.1,3.1s3.1-1.4,3.1-3.1C137,156.2,135.6,154.8,133.9,154.8z M87.4,49.1
	c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C85,50.2,86.1,49.1,87.4,49.1z M87.4,51.9
	c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C87,51.7,87.2,51.9,87.4,51.9z M87.4,59.1
	c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S86.1,59.1,87.4,59.1z M87.4,61.9c0.2,0,0.4-0.2,0.4-0.4
	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C87,61.7,87.2,61.9,87.4,61.9z M87.4,69.1c1.3,0,2.4,1.1,2.4,2.4
	c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C85,70.2,86.1,69.1,87.4,69.1z M87.4,71.9c0.2,0,0.4-0.2,0.4-0.4
	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C87,71.7,87.2,71.9,87.4,71.9z M87.4,79.1c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4
	c-1.3,0-2.4-1.1-2.4-2.4S86.1,79.1,87.4,79.1z M87.4,81.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
	C87,81.7,87.2,81.9,87.4,81.9z M87.4,89.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4
	C85,90.1,86.1,89.1,87.4,89.1z M87.4,91.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
	C87,91.7,87.2,91.9,87.4,91.9z M99.5,49.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4
	C97.1,50.2,98.2,49.1,99.5,49.1z M99.5,51.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
	C99.1,51.7,99.3,51.9,99.5,51.9z M99.5,59.1c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S98.2,59.1,99.5,59.1z
	 M99.5,61.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,61.7,99.3,61.9,99.5,61.9z M99.5,69.1
	c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C97.1,70.2,98.2,69.1,99.5,69.1z M99.5,71.9
	c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,71.7,99.3,71.9,99.5,71.9z M99.5,79.1
	c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S98.2,79.1,99.5,79.1z M99.5,81.9c0.2,0,0.4-0.2,0.4-0.4
	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,81.7,99.3,81.9,99.5,81.9z M99.5,89.1c1.3,0,2.4,1.1,2.4,2.4
	c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C97.1,90.1,98.2,89.1,99.5,89.1z M99.5,91.9c0.2,0,0.4-0.2,0.4-0.4
	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,91.7,99.3,91.9,99.5,91.9z M111.5,49.1c1.3,0,2.4,1.1,2.4,2.4
	c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C109.1,50.2,110.2,49.1,111.5,49.1z M111.5,51.9c0.2,0,0.4-0.2,0.4-0.4
	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C111.1,51.7,111.3,51.9,111.5,51.9z M111.5,59.1c1.3,0,2.4,1.1,2.4,2.4
	s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S110.2,59.1,111.5,59.1z M111.5,61.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4
	c-0.2,0-0.4,0.2-0.4,0.4C111.1,61.7,111.3,61.9,111.5,61.9z M111.5,69.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4
	c-1.3,0-2.4-1.1-2.4-2.4C109.1,70.2,110.2,69.1,111.5,69.1z M111.5,71.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4
	c-0.2,0-0.4,0.2-0.4,0.4C111.1,71.7,111.3,71.9,111.5,71.9z M111.5,79.1c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4
	c-1.3,0-2.4-1.1-2.4-2.4S110.2,79.1,111.5,79.1z M111.5,81.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
	C111.1,81.7,111.3,81.9,111.5,81.9z M111.5,89.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4
	C109.1,90.1,110.2,89.1,111.5,89.1z M111.5,91.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
	C111.1,91.7,111.3,91.9,111.5,91.9z',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 4,
                'lft' => 40,
                'rgt' => 41,
                'depth' => 1,
                'name' => 'Mirrors',
                'image' => 'M122.4,154H77.6L46,122.3V77.6l31.6-31.6h44.7L154,77.6v44.7L122.4,154z M152,78.4l-30.5-30.5H78.4L48,78.4
	v43.1L78.4,152h43.1l30.5-30.5V78.4z M79.1,150.5l-29.6-29.6V79l29.6-29.6h41.8L150.5,79v41.8l-29.6,29.6H79.1z M148.5,79.9
	l-28.4-28.4H79.9L51.5,79.9V120l28.4,28.4h40.2l28.4-28.4V79.9z M83.8,139.1l-23-23V83.7l23-23h32.5l23,23v32.5l-23,23H83.8z
	 M137.2,84.5l-21.8-21.8H84.6L62.8,84.5v30.8l21.8,21.8h30.8l21.8-21.8V84.5z M85.3,135.4l-20.8-20.8V85.2l20.8-20.8h29.4l20.8,20.8
	v29.4l-20.8,20.8H85.3z M133.5,86.1l-19.6-19.6H86.1L66.5,86.1v27.8l19.6,19.6h27.8l19.6-19.6V86.1z',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 4,
                'lft' => 42,
                'rgt' => 43,
                'depth' => 1,
                'name' => 'Lighting',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 4,
                'lft' => 44,
                'rgt' => 45,
                'depth' => 1,
                'name' => 'Art & Frames Tables',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 4,
                'lft' => 46,
                'rgt' => 47,
                'depth' => 1,
                'name' => 'Textiles',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 4,
                'lft' => 48,
                'rgt' => 49,
                'depth' => 1,
                'name' => 'Carpets',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]

        ];

        DB::table('categories')->insert($categories);

        $this->enableForeignKeys();
    }
}
