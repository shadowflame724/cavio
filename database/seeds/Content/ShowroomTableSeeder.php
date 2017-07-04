<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class ShowroomTableSeeder.
 */
class ShowroomTableSeeder extends Seeder
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
        $this->truncate('showrooms');

        $showrooms = [
            [
                'country' => 'ITALY',
                'city' => 'Some city',
                'name' => 'CAVIO Authorised dealer',
                'address' => 'ABN 37956063382',
                'phone' => '+61 404 835 170',
                'phone2' => '',
                'fax' => '',
                'email' => 'sales@cavio.com.ua',
                'lat' => '41.86956082699456',
                'lng' => '12.50244140625',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'FINLAND',
                'city' => 'Some city',

                'name' => 'Exclusiveforhome',
                'address' => 'Vaalimaa Pyöräkankantie 1, 49930,',
                'phone' => '+358 40 7161111',
                'phone2' => '',
                'fax' => '',
                'email' => 'elena@exclusiveforhome.com',
                'lat' => '60.13056361691419',
                'lng' => '25.0048828125',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'ISRAEL',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Tel Aviv',
                'phone' => '+97 239 050 577',
                'phone2' => '',
                'fax' => '+97 239 050 577',
                'email' => '',
                'lat' => '31.615965936476076',
                'lng' => '35.15625',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'USA',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Viale Europa, 6/a, 37050
San Pietro di Morubio (VR) Italia',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '39.095962936305476',
                'lng' => '-94.4384765625',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'RUSSIA',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Viale Europa, 6/a, 37050
San Pietro di Morubio (VR) Italia',
                'phone' => '+ 7 861 200 90 09',
                'phone2' => '+ 7 861 200 90 09',
                'fax' => '',
                'email' => '',
                'lat' => '55.825973254619015',
                'lng' => '37.529296875',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'LATVIA',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Viale Europa, 6/a, 37050
San Pietro di Morubio (VR) Italia',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '56.944974180851595',
                'lng' => '24.08203125',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'UKRAINE',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Kiev',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '49.66762782262194',
                'lng' => '30.673828125',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'UKRAINE',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Odessa',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '49.66762782262194',
                'lng' => '30.673828125',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'UKRAINE',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Zmerynka',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '49.66762782262194',
                'lng' => '30.673828125',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'MOLDOVA',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Viale Europa, 6/a, 37050
San Pietro di Morubio (VR) Italia',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '46.98025235521884',
                'lng' => '28.740234375',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'AZERBAIJAN',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Viale Europa, 6/a, 37050
San Pietro di Morubio (VR) Italia',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '42.423456517938305',
                'lng' => '61.69921875',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'ROMANIA',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Viale Europa, 6/a, 37050
San Pietro di Morubio (VR) Italia',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '45.644768217751924',
                'lng' => '24.609375',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'KYRGYZSTAN',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Viale Europa, 6/a, 37050
San Pietro di Morubio (VR) Italia',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '41.31082388091817',
                'lng' => '74.1796875',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country' => 'KAZAKHSTAN',
                'city' => 'Some city',

                'name' => 'CAVIO Showroom, Dan Design Center',
                'address' => 'Viale Europa, 6/a, 37050
San Pietro di Morubio (VR) Italia',
                'phone' => '',
                'phone2' => '',
                'fax' => '',
                'email' => '',
                'lat' => '39.36827914916013',
                'lng' => '58.88671875',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


        ];

        DB::table('showrooms')->insert($showrooms);


        $this->enableForeignKeys();
    }
}
