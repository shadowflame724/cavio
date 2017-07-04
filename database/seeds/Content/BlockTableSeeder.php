<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class BlockTableSeeder.
 */
class BlockTableSeeder extends Seeder
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
        $this->truncate('blocks');

        /*
         * ABOUT US PAGE BLOCKS
         */
        $blocks = [
            [
                'page_id' => 1,
                'title' => 'History',
                'title_ru' => 'История',
                'title_it' => 'Mostra di più',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.
                ',
                'body_ru' => 'Коллекция вдохновлена эпохой Возрождения Вероны, символом классического и высоко оцененного итальянского стиля, романтического и элегантного за один раз. Особое внимание уделяется деталям, выбору тканей и координации цветовых нюансов.',
                'body_it' => 'La collezione è ispirata alla città rinascimentale di Verona, simbolo del classico stile italiano molto apprezzato, romantico ed elegante alla volta. La cura particolare è dedicata ai dettagli, alla selezione dei tessuti e al coordinamento delle sfumature di colore.
                ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Expression of style',
                'title_ru' => 'Выражение стиля',
                'title_it' => 'Espressione dello stile',
                'body_it' => 'Anche nell\'area dell\'ufficio un nuovo concetto di spazio, adattato alle vostre esigenze, riesce a ripristinare un design elegante e raffinato che si esprime in una cura amorosa per i dettagli, in una lavorazione a mano che esalta le texture, dando complementi di mobili con un unico e Fascino senza tempo.
                ',
                'body_ru' => 'Кроме того, в офисной зоне новая концепция пространства, адаптированная к вашим потребностям, оживляет элегантный и изысканный дизайн, который выражается в любящей заботе о деталях, в ручном производстве, которое превозносит текстуры, придавая вам мебельные дополнения с уникальным и Вневременное очарование',
                'body' => 'Also in the office area a new concept of space, tailored to your needs, to revive an elegant and refined design that expresses itself in a loving care for details, in a hand manufacturing that exalt the textures, giving you furniture complements with a unique and timeless charm',
                'image' => 'under-history-right.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body' => 'The lifelong experience is being reflected in almost every project. At Cavio-Casa, we are welcoming challenges to foster our creativity. People inspire us and we want to inspire them too.<br>
                        <br>Everything we do at Cavio-Casa is guided by our vision to ensure that we all go the extra mile to help our customers reach their audiences. So far, we have achieved to play a dynamic role in shaping the jewelry industry.
                        ',
                'body_ru' => 'Жизненный опыт отражается почти во всех проектах. В Cavio-Casa мы приветствуем проблемы, способствующие нашему творчеству. Люди вдохновляют нас, и мы хотим их вдохновить. <br>
                         <br> Все, что мы делаем в Cavio-Casa, руководствуется нашим видением, чтобы все мы прошли лишнюю милю, чтобы помочь нашим клиентам достичь своей аудитории. До сих пор мы достигли динамичной роли в формировании ювелирной промышленности.',
                'body_it' => 'L\'esperienza permanente si riflette in quasi tutti i progetti. A Cavio-Casa, stiamo accogliendo sfide per promuovere la nostra creatività. La gente ci ispira e vogliamo ispirare anche loro<br>
                         <br> Tutto quello che facciamo a Cavio-Casa è guidato dalla nostra visione per assicurarci che tutti noi passiamo il miglio supplementare per aiutare i nostri clienti a raggiungere il loro pubblico. Finora abbiamo raggiunto un ruolo dinamico nella progettazione dell\'industria dei gioielli.',
                'image' => 'under-history-left.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Philosofhy',
                'title_ru' => 'Философия',
                'title_it' => 'Filosofia',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.
                ',
                'body_ru' => '
Коллекция вдохновлена эпохой Возрождения Вероны, символом классического и высоко оцененного итальянского стиля, романтического и элегантного за один раз. Особое внимание уделяется деталям, выбору тканей и координации цветовых нюансов.',
                'body_it' => 'La collezione è ispirata alla città rinascimentale di Verona, simbolo del classico stile italiano molto apprezzato, romantico ed elegante alla volta. La cura particolare è dedicata ai dettagli, alla selezione dei tessuti e al coordinamento delle sfumature di colore.
                ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body_it' => 'Tutto quello che facciamo a Cavio-Casa è guidato dalla nostra visione per assicurare che tutti noi andiamo il miglio supplementare per aiutare i nostri clienti a raggiungere il loro pubblico. Finora abbiamo raggiunto un ruolo dinamico nella progettazione dell\'industria dei gioielli<br>
                         <br> L\'esperienza permanente si riflette in quasi tutti i progetti. A Cavio-Casa, stiamo accogliendo sfide per promuovere la nostra creatività. Le persone ci ispirano e vogliamo ispirare anche loro.',
                'body_ru' => 'Все, что мы делаем в Cavio-Casa, руководствуется нашим видением, чтобы все мы прошли лишнюю милю, чтобы помочь нашим клиентам достичь своей аудитории. До сих пор мы достигли динамичной роли в формировании ювелирной промышленности.<br>

Жизненный опыт отражается почти во всех проектах. В Cavio-Casa мы приветствуем проблемы, способствующие нашему творчеству. Люди вдохновляют нас, и мы хотим вдохновить их тоже.',
                'body' => 'Everything we do at Cavio-Casa is guided by our vision to ensure that we all go the extra mile to help our customers reach their audiences. So far, we have achieved to play a dynamic role in shaping the jewelry industry.<br>

The lifelong experience is being reflected in almost every project. At Cavio-Casa, we are welcoming challenges to foster our creativity. People inspire us and we want to inspire them too.',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body' => 'We have been renowned for the high quality of our hand-made products, the innovative ideas, the effective co-operation with clients around the world and the ability to tailor our services to each customer’s needs surpassing their expectations.<br>
                        <br>We are always next to you, full of new ideas, determination and love because we believe in what we do.',
                'image' => null,
                'body_ru' => 'Мы были известны высоким качеством наших изделий ручной работы, инновационными идеями, эффективным сотрудничеством с клиентами по всему миру и возможностью адаптировать наши услуги к потребностям каждого клиента, превосходящим их ожидания. <br>
                         <br> Мы всегда рядом с вами, полны новых идей, решительности и любви, потому что мы верим в то, что делаем.',
                'body_it' => 'Siamo stati rinomati per l\'alta qualità dei nostri prodotti fatti a mano, le idee innovative, l\'efficace collaborazione con i clienti in tutto il mondo e la capacità di adattare i nostri servizi alle esigenze di ogni cliente che supera le loro aspettative.<br>
                         <br> Siamo sempre accanto a voi, pieno di nuove idee, determinazione e amore perché crediamo in ciò che facciamo.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body_ru' => '<span class=colored>Свобода</span>
                        для сопоставления<br>
                        разных материалов и отделок<br>
                        и <span class=colored>ошеломляющий</span>
                        визуал.',
                'image' => null,
                'body_eu' => 'The <span class=colored>freedom</span>
                        to to juxtapose<br>
                        different materials, finishes<br>
                        and <span class=colored>stunning</span>
                        visual.',
                'body_it' => 'La <span class=colored>libertà</span>
                        Per giungere a destra<br>
                         Materiali diversi, finiture<br>
                        e <span class=colored>stunning</span>
                        visivo.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Mood',
                'title_ru' => 'Настроение',
                'title_it' => 'Umore',
                'body' => 'Special care is devoted to details, the selection of tissues, and the coordination of color nuances. The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time.
                ',
                'body_ru' => 'Особое внимание уделяется деталям, выбору тканей и координации цветовых нюансов. Коллекция вдохновлена эпохой Возрождения Вероны, символом классического и высоко оцененного итальянского стиля, романтического и элегантного за один раз.',
                'body_it' => 'La cura particolare è dedicata ai dettagli, alla selezione dei tessuti e al coordinamento delle sfumature di colore. La collezione è ispirata alla città rinascimentale di Verona, simbolo del classico stile italiano molto apprezzato, romantico ed elegante alla volta.',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body' => '',
                'body_ru' => '',
                'body_it' => '',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Expression',
                'title_ru' => 'Выражение',
                'title_it' => 'Espressione
',
                'body' => 'Also in the office area a new concept of space, tailored to your needs, to revive an elegant and refined design that expresses itself in a loving care for details.
                ',
                'body_ru' => 'Кроме того, в офисе новая концепция пространства, адаптированная к вашим потребностям, оживляет элегантный и изысканный дизайн, который выражает себя в любящей заботе о деталях.',
                'body_it' => 'Anche nell\'area dell\'ufficio un nuovo concetto di spazio, adattato alle vostre esigenze, riesumina un design elegante e raffinato che si esprime in una cura amorosa per i dettagli.
                ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Style',
                'title_ru' => 'Стиль',
                'title_it' => 'Stile',
                'body' => 'In a hand manufacturing that exalt the textures, giving you furniture complements with a unique and timeless charm.
                ',
                'body_ru' => 'В ручном производстве, которые превозносят текстуры, дают вам комплименты мебели с уникальным и неподвластным времени очарованием.',
                'body_it' => 'In una produzione a mano che esalta le texture, dandovi complimenti per mobili con un fascino unico e senza tempo.',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Quality',
                'title_ru' => 'Качество',
                'title_it' => 'Qualità
',
                'body' => 'Also in the office area a new concept of space, tailored to your needs, to revive an elegant and refined design that expresses itself in a loving care for details.
                ',
                'body_ru' => 'Кроме того, в офисе новая концепция пространства, адаптированная к вашим потребностям, оживляет элегантный и изысканный дизайн, который выражает себя в любящей заботе о деталях.',
                'body_it' => 'Anche nell\'area dell\'ufficio un nuovo concetto di spazio, adattato alle vostre esigenze, riesumina un design elegante e raffinato che si esprime in una cura amorosa per i dettagli.',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            /*
             * Contacts PAGE BLOCKS
             */
            [
                'page_id' => 2,
                'title' => 'CAVIO Factory & Showroom',
                'title_ru' => 'CAVIO Фабрики & Посредники',
                'title_it' => 'CAVIO Factory & Showroom',
                'body' => 'Viale Europa, 6/a, 37050<br>San Pietro di Morubio (VR)
                            Italia<br><br>Telefone: <a href="tel:+39 045 71 44 503" class=tel>+39 045 71 44 503</a><br>Fax:
                            <a href="tel:+39 045 71 44 277" class=tel>+39 045 71 44 277</a><br><br><a
                                    href=mailto:info@cavio.it class="colored_link anim-underline">info@cavio.it</a>',
                'body_ru' => 'Viale Europa, 6/a, 37050<br>San Pietro di Morubio (VR)
                            Italia<br><br>Telefone: <a href="tel:+39 045 71 44 503" class=tel>+39 045 71 44 503</a><br>Fax:
                            <a href="tel:+39 045 71 44 277" class=tel>+39 045 71 44 277</a><br><br><a
                                    href=mailto:info@cavio.it class="colored_link anim-underline">info@cavio.it</a>',
                'body_it' => 'Viale Europa, 6/a, 37050<br>San Pietro di Morubio (VR)
                            Italia<br><br>Telefone: <a href="tel:+39 045 71 44 503" class=tel>+39 045 71 44 503</a><br>Fax:
                            <a href="tel:+39 045 71 44 277" class=tel>+39 045 71 44 277</a><br><br><a
                                    href=mailto:info@cavio.it class="colored_link anim-underline">info@cavio.it</a>',
                'image' => 'cont-r.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 2,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body' => '',
                'body_ru' => '',
                'body_it' => '',
                'image' => 'cont-map.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 2,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body' => '',
                'body_ru' => '',
                'body_it' => '',
                'image' => 'cont-bottom.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 8,
                'title' => 'Our philosofy',
                'title_ru' => 'Наша философия',
                'title_it' => 'La nostra filosofia',
                'body' => '<div class=wrap-phil-p><p>Italian furniture showroom CAVIO found its adherents in 38
                                    countries, including Switzerland, France, Sweden, Netherlands, Germany, Australia
                                    and the United States.</div>
                            <div class=wrap-phil-p><p>In Kiev, the Italian furniture CAVIO presented in several
                                    showrooms, conveniently located on the left and right banks.</div>
                            <div class=wrap-phil-p><p>Here, professional consultants will help you to implement a
                                    holistic complete interior - from the kitchen, bedroom, living room and study to the
                                    children\'s room <a href=# class=link-arrow>→</a></div>',
                'body_ru' => '<div class=wrap-phil-p><p>Итальянский мебельный салон CAVIO нашел своих приверженцев в 38
                                     Страны, включая Швейцарию, Францию, Швецию, Нидерланды, Германию, Австралию
                                     И Соединенные Штаты.</div>
                            <div class=wrap-phil-p><p>В Киеве итальянская мебель CAVIO представлена в нескольких
                                     Выставочные залы, удобно расположенные на левом и правом берегах.</div>
                            <div class=wrap-phil-p><p>Здесь профессиональные консультанты помогут вам реализовать
                                     Целостный полный интерьер - от кухни, спальни, гостиной и кабинета до
                                     Детская комната<a href=# class=link-arrow>→</a></div>',
                'body_it' => '<div class = wrap-phil-p> <p> Lo showroom di mobili italiani CAVIO ha trovato i suoi aderenti a 38 anni
                                     Paesi, tra cui Svizzera, Francia, Svezia, Paesi Bassi, Germania, Australia
                                     E gli Stati Uniti. </div>
                             </div> <div class = wrap-phil-p> <p> A Kiev, l\'arredamento italiano CAVIO presentato in diversi
                                     Showroom, situato convenientemente sulla banca sinistra e destra. </div>
                             <div class = wrap-phil-p> <p> Qui, i consulenti professionali ti aiuteranno ad attuare una
                                     Interni completi olistici - dalla cucina, camera da letto, soggiorno e studio al
                                     Camera per bambini <a href=# class=link-arrow> → </a> </div>',
                'image' => 'phil-image.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 9,
                'title' => 'Privacy Policy',
                'title_ru' => 'Политика приватности',
                'title_it' => 'Politica sulla riservatezza
',
                'body' => '',
                'body_ru' => '',
                'body_it' => '',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            /*
             * Showroom page
             */

            [
                'page_id' => 5,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body' => '',
                'body_ru' => '',
                'body_it' => '',
                'image' => 'show_r-slide-2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 5,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body' => '',
                'body_ru' => '',
                'body_it' => '',
                'image' => 'show_r-slide-3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 5,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body' => '',
                'body_ru' => '',
                'body_it' => '',
                'image' => 'show_r-slide-1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 5,
                'title' => '',
                'title_ru' => '',
                'title_it' => '',
                'body' => 'Don’t found showroom<br>
                        near you? <span class=colored>Contact main</span>
                        <br>',
                'body_ru' => 'Не нашли салон рядом<br>
                       с вами? <span class=colored>Обратитесь в главный</span>
                        <br>',
                'body_it' => 'Non ho trovato lo showroom<br>
                        vicino a te? <span class=colored>Contatto principale</span>
                        <br>',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 5,
                'title' => 'Main Showroom',
                'title_ru' => 'Главный магазин',
                'title_it' => 'Showroom principale',
                'body' => 'Viale Europa, 6/a, 37050<br>
                            San Pietro di Morubio (VR) Italia<br>
                            <br>
                            Telefone: <a href=tel:+390457144503 class=tel>+39 045 71 44 503</a>
                            <br>
                            Fax: <a href=tel:+390457144277 class=tel>+39 045 71 44 277</a>
                            <br>
                            <br>
                            <a href=mailto:info@cavio.it class="colored_link anim-underline">info@cavio.it</a>',
                'body_ru' => 'Viale Europa, 6/a, 37050<br>
                            San Pietro di Morubio (VR) Italia<br>
                            <br>
                            Telefone: <a href=tel:+390457144503 class=tel>+39 045 71 44 503</a>
                            <br>
                            Fax: <a href=tel:+390457144277 class=tel>+39 045 71 44 277</a>
                            <br>
                            <br>
                            <a href=mailto:info@cavio.it class="colored_link anim-underline">info@cavio.it</a>',
                'body_it' => 'Viale Europa, 6/a, 37050<br>
                            San Pietro di Morubio (VR) Italia<br>
                            <br>
                            Telefone: <a href=tel:+390457144503 class=tel>+39 045 71 44 503</a>
                            <br>
                            Fax: <a href=tel:+390457144277 class=tel>+39 045 71 44 277</a>
                            <br>
                            <br>
                            <a href=mailto:info@cavio.it class="colored_link anim-underline">info@cavio.it</a>',
                'image' => 'main-showroom.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


        ];

        DB::table('blocks')->insert($blocks);


        $this->enableForeignKeys();
    }
}
