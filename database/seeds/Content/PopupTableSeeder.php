<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class PopupTableSeeder.
 */
class PopupTableSeeder extends Seeder
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
        $this->truncate('popups');

        $popup = [
            [
                'title' => 'Salone del Milano Invintation',
                'title_ru' => 'Приглашение Salone del Milano',
                'title_it' => 'Invito di Salone del Milano',
                'body' => '<p>Lorem ipsum dolor sit amet, an illum soluta pri, pri nonumes luptatum petentium id, no nisl melius officiis qui. Ius malorum mandamus eloquentiam no. Quo in wisi expetenda.<br /><br />Has quem autem copiosae no, modus nostrum principes id nec.</p>',
                'body_ru' => '<p>Lorem ipsum dolor sit amet, an illum soluta pri, pri nonumes luptatum petentium id, no nisl melius officiis qui. Ius malorum mandamus eloquentiam no. Quo in wisi expetenda.<br /><br />Has quem autem copiosae no, modus nostrum principes id nec.</p>',
                'body_it' => '<p>Lorem ipsum dolor sit amet, an illum soluta pri, pri nonumes luptatum petentium id, no nisl melius officiis qui. Ius malorum mandamus eloquentiam no. Quo in wisi expetenda.<br /><br />Has quem autem copiosae no, modus nostrum principes id nec.</p>',
                'link' => 'catalogue',
                'show' => 1,
                'image' => 'ind_poppup.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('popups')->insert($popup);


        $this->enableForeignKeys();
    }
}
