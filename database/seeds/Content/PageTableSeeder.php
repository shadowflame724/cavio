<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class PageTableSeeder.
 */
class PageTableSeeder extends Seeder
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
        $this->truncate('pages');

        $pages = [
            [
                'slug' => 'about',
                'title' => 'About us',
                'description' => ' ',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'contacts',
                'title' => 'Contact us',
                'description' => ' ',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'faq',
                'title' => 'Questions',
                'description' => ' ',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'news',
                'title' => 'News',
                'description' => ' ',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'showrooms',
                'title' => 'Showrooms',
                'description' => ' ',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'payments',
                'title' => 'Payments and delivery',
                'description' => ' ',
                'body' => 'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'collections',
                'title' => 'Zone/collections',
                'description' => ' ',
                'body' => ' ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'index',
                'title' => 'CAVIO CASA',
                'description' => ' ',
                'body' => ' ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'privacy-policy',
                'title' => 'Privacy policy',
                'description' => ' ',
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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'stash',
                'title' => 'Stash',
                'description' => ' ',
                'body' => ' ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'catalogue',
                'title' => 'Catalogue',
                'description' => ' ',
                'body' => ' ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'zones',
                'title' => 'Zones',
                'description' => ' ',
                'body' => ' ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'finish-tissue',
                'title' => 'Finish Tissue',
                'description' => ' ',
                'body' => ' ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('pages')->insert($pages);

        $this->enableForeignKeys();
    }
}
