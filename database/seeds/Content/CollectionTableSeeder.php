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
                'title_ru' => 'Вилла Каннес',
                'title_it' => 'Cannes',

                'slug' => 'villa-cannes',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'description_ru' => 'Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',
                'description' => 'Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical',
                'image' => 'banner-main-1.jpg',
                'banner' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Penthouse',
                'title_ru' => 'Пентхаус',
                'title_it' => 'Cannes',

                'slug' => 'penthouse',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'description_ru' => 'Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',
                'description' => 'Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical',                'image' => 'banner-main-2.jpg',
                'banner' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Verona',
                'title_ru' => 'Верона',
                'title_it' => 'Cannes',

                'slug' => 'verona',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'description_ru' => 'Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',
                'description' => 'Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical',                'image' => 'banner-main-3.jpg',
                'banner' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Verona',
                'title_ru' => 'Верона',
                'title_it' => 'Cannes',

                'slug' => 'verona',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'description_ru' => 'Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',
                'description' => 'Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical',                'image' => 'verona-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Manhattan',
                'title_ru' => 'Манхэтен',
                'title_it' => 'Cannes',

                'slug' => 'manhattan',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'description_ru' => 'Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',
                'description' => 'Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical',                'image' => 'manhattan-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Cannes',
                'title_ru' => 'Канес',
                'title_it' => 'Cannes',

                'slug' => 'cannes',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'description_ru' => 'Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',
                'description' => 'Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical',                'image' => 'cannes-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Verona',
                'title_ru' => 'Верона',
                'title_it' => 'Cannes',

                'slug' => 'verona',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'description_ru' => 'Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',
                'description' => 'Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical',                'image' => 'verona-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Manhattan',
                'title_ru' => 'Манхетен',
                'title_it' => 'Cannes',

                'slug' => 'manhattan',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'description_ru' => 'Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',
                'description' => 'Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical',                'image' => 'manhattan-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Cannes',
                'title_ru' => 'Канес',
                'title_it' => 'Cannes',

                'slug' => 'cannes',
                'description' => 'Abitare la tua casa. In tutte le forme e le linee architettoniche della tradizione ispirata alla cultura classica, in tutte le declinazioni della natura che ci circonda esiste qualcosa di magico',
                'description_ru' => 'Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',
                'description' => 'Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical',                'image' => 'cannes-collection.jpg',
                'banner' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('collections')->insert($collections);

        $this->enableForeignKeys();
    }
}
