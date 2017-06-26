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
                'preview' => '',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.
                ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Expression of style',
                'preview' => '',
                'body' => 'Also in the office area a new concept of space, tailored to your needs, to revive an elegant and refined design that expresses itself in a loving care for details, in a hand manufacturing that exalt the textures, giving you furniture complements with a unique and timeless charm.
                ',
                'image' => 'under-history-right.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'preview' => '',
                'body' => 'The lifelong experience is being reflected in almost every project. At Cavio-Casa, we are welcoming challenges to foster our creativity. People inspire us and we want to inspire them too.<br>
                        <br>Everything we do at Cavio-Casa is guided by our vision to ensure that we all go the extra mile to help our customers reach their audiences. So far, we have achieved to play a dynamic role in shaping the jewelry industry.
                        ',
                'image' => 'under-history-left.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Philosofhy',
                'preview' => '',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.
                ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'preview' => '',
                'body' => 'Everything we do at Cavio-Casa is guided by our vision to ensure that we all go the extra mile to help our customers reach their audiences. So far, we have achieved to play a dynamic role in shaping the jewelry industry.<br>
                        <br>The lifelong experience is being reflected in almost every project. At Cavio-Casa, we are welcoming challenges to foster our creativity. People inspire us and we want to inspire them too.
                        ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'preview' => '',
                'body' => 'We have been renowned for the high quality of our hand-made products, the innovative ideas, the effective co-operation with clients around the world and the ability to tailor our services to each customer’s needs surpassing their expectations.<br>
                        <br>We are always next to you, full of new ideas, determination and love because we believe in what we do.',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'preview' => '',
                'body' => 'The <span class=colored>freedom</span>
                        to to juxtapose<br>
                        different materials, finishes<br>
                        and <span class=colored>stunning</span>
                        visual.',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Mood',
                'preview' => '',
                'body' => 'Special care is devoted to details, the selection of tissues, and the coordination of color nuances. The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time.
                ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => '',
                'preview' => '',
                'body' => '<div class="wrap-images-under-mood clearfix">
                <div class=images-under-mood-left>
                    <div class="wrap-image-und-mood-l-t p-for-l">
                        <a href=# class="wrap-inner-img anim-img-corn-bg">
                            <div class="img-back dark">
                                <svg viewBox="0 0 1395.63 1237.68">
                                    <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                                </svg>
                            </div>
                            <div class="corn-img corner-text" before="— Villa Cannes">
                                <img src=/upload/images/under-mood-l-t.jpg alt="">
                            </div>
                        </a>
                    </div>
                    <div class="wrap-image-und-mood-l-b p-for-l">
                        <a href=# class="wrap-inner-img anim-img-corn-bg">
                            <div class="img-back dark">
                                <svg viewBox="0 0 1395.63 1237.68">
                                    <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                                </svg>
                            </div>
                            <div class="corn-img corner-text" before="— Villa Cannes">
                                <img src=/upload/images/under-mood-l-b.jpg alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class=images-under-mood-right>
                    <div class="wrap-images-und-mood-r-t clearfix">
                        <div class=wrap-image-und-mood-r-t>
                            <a href=# class="wrap-inner-img anim-img-corn-bg">
                                <div class="img-back dark">
                                    <svg viewBox="0 0 1395.63 1237.68">
                                        <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                                    </svg>
                                </div>
                                <div class="corn-img corner-text" before="— Manhattan penthouse">
                                    <img src=/upload/images/under-mood-r-t.jpg alt="">
                                </div>
                            </a>
                        </div>
                        <div class=wrap-image-und-mood-m-t>
                            <a href=# class="wrap-inner-img anim-img-corn-bg">
                                <div class="img-back dark">
                                    <svg viewBox="0 0 1395.63 1237.68">
                                        <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                                    </svg>
                                </div>
                                <div class="corn-img corner-text" before="— Manhattan penthouse">
                                    <img src=/upload/images/under-mood-m-t.jpg alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class=wrap-image-und-mood-r-b>
                        <a href=# class="wrap-inner-img anim-img-corn-bg">
                            <div class="img-back dark">
                                <svg viewBox="0 0 1395.63 1237.68">
                                    <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                                </svg>
                            </div>
                            <div class="corn-img corner-text" before="— Villa Cannes">
                                <img src=/upload/images/under-mood-r-b.jpg alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class=mood-big>
                    <span id=inner-mood-big>mood</span>
                </div>
            </div>
            ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Expression',
                'preview' => '',
                'body' => 'Also in the office area a new concept of space, tailored to your needs, to revive an elegant and refined design that expresses itself in a loving care for details.
                ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Style',
                'preview' => '',
                'body' => 'In a hand manufacturing that exalt the textures, giving you furniture complements with a unique and timeless charm.
                ',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 1,
                'title' => 'Quality',
                'preview' => '',
                'body' => 'Also in the office area a new concept of space, tailored to your needs, to revive an elegant and refined design that expresses itself in a loving care for details.
                ',
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
                'preview' => '',
                'body' => 'Viale Europa, 6/a, 37050<br>San Pietro di Morubio (VR)
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
                'preview' => '',
                'body' => '',
                'image' => 'cont-map.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 2,
                'title' => '',
                'preview' => '',
                'body' => '',
                'image' => 'cont-bottom.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 8,
                'title' => 'Our Philosophy',
                'preview' => '',
                'body' => '<div class=wrap-phil-p><p>Italian furniture showroom CAVIO found its adherents in 38
                                    countries, including Switzerland, France, Sweden, Netherlands, Germany, Australia
                                    and the United States.</div>
                            <div class=wrap-phil-p><p>In Kiev, the Italian furniture CAVIO presented in several
                                    showrooms, conveniently located on the left and right banks.</div>
                            <div class=wrap-phil-p><p>Here, professional consultants will help you to implement a
                                    holistic complete interior - from the kitchen, bedroom, living room and study to the
                                    children\'s room <a href=# class=link-arrow>→</a></div>',
                'image' => 'phil-image.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_id' => 9,
                'title' => 'Privacy Policy',
                'preview' => '',
                'body' => '<p>Our data protection practice adheres to UK law relating to data protection.
                        The following privacy policy applies to your use of LuxDeco website:
                    <p>We respect the privacy of users on LuxDeco. This means that we commit to ensuring that we treat
                        all information provided by you with the highest diligence and integrity including where we
                        utilise the services of partners and third parties. We do not, however, accept responsibility
                        for third parties where this is not stated separately.
                    <p>We collect, store and process personal data solely in accordance with applicable statutory
                        provisions and to the extent necessary to fulfil the contractual relationship between us or to
                        provide the requested services necessary and required. Data about you and/or products that you
                        have put into the shopping cart can be used by us (including our sister company,
                        www.ikandi-interiors.co.uk) solely for our own marketing purposes. Furthermore, as permitted by
                        applicable law, anonymous user profiles may be used for internal market research purposes and to
                        improve our range of products and services. For the purposes of this privacy policy "personal
                        information" means any information that you provide to us and that may be used to identify you
                        (for example, your first and last name, address and fixed and/or mobile phone number). Personal
                        data will be transferred by means of the encoding system SSL, via the Internet. We secure the
                        Website and other systems through appropriate technical and organizational measures against
                        loss, destruction, access, modification and distribution of your data by unauthorised persons in
                        accordance with UK legislation. Despite regular controls a complete protection against all
                        dangers cannot be guaranteed.
                    <p>To improve LuxDeco and our services we use "cookies" (small data packages with configuration
                        information, which, for example, submit information about the display settings or the IP address
                        a user has) and you agree to our use of cookies as set out in this privacy policy. We believe
                        that we do not use any cookies that represent an undue intrusion into your privacy, however you
                        can disable the saving of cookies in your browser settings (for example, in Internet Explorer
                        you can refuse all cookies by clicking "Tools", "Internet Options", "Privacy", and selecting
                        "Block all cookies" using the sliding selector). Please bear in mind that if you disable cookies
                        then you will not be able to place orders on LuxDeco and LuxDeco may not work properly when
                        viewed through your browser.
                    <p>LuxDeco uses technologies provided by Google Analytics (www.google.com) to collect data for
                        optimization purposes. This data is used in order to create user profiles under a pseudonym and
                        cookies are used for this. The collected data can be used by us to present improved and
                        individualised offers and services to a user on LuxDeco. This data will not be disclosed to
                        third parties. You can prevent the installation of cookies as described under section 3.
                        However, we want to emphasize that in this case the functionality of LuxDeco (including the
                        ability to place an order) will be limited.',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


        ];

        DB::table('blocks')->insert($blocks);


        $this->enableForeignKeys();
    }
}
