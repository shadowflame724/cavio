<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class FaqTableSeeder.
 */
class FaqTableSeeder extends Seeder
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
        $this->truncate('f_a_q_s');

        $faqs = [
            [
                'question' => 'What type of furniture does Resource Furniture sell?',
                'question_ru' => 'Какую мебель продает мебель для мебели?',
                'question_it' => 'Qual è il tipo di mobili che i mobili di risorse vendono?
',
                'answer' => 'We have a dedicated customer service team committed to
                                    making sure that you are happy. (with your furniture, that is) Please email <a
                                            href="mailto:customerservice@cavio.it" class="colored_link anim-underline">customerservice@cavio
                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>',
                'answer_it' => 'Abbiamo un team dedicato di assistenza clienti impegnato',
                'answer_ru' => 'У нас есть специализированная команда обслуживания клиентов, приверженная',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'I am already a customer, and I have a question or need
                                some assistance with my product. Who should I contact?',
                'question_ru' => 'Какую мебель продает мебель для мебели?',
                'question_it' => 'Qual è il tipo di mobili che i mobili di risorse vendono?
',
                'answer' => 'We have a dedicated customer service team committed to
                                    making sure that you are happy. (with your furniture, that is) Please email <a
                                            href="mailto:customerservice@cavio.it" class="colored_link anim-underline">customerservice@cavio
                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>',
                'answer_it' => 'Abbiamo un team dedicato di assistenza clienti impegnato',
                'answer_ru' => 'У нас есть специализированная команда обслуживания клиентов, приверженная',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'Can Resource Furniture ship to any location?',
                'question_ru' => 'Какую мебель продает мебель для мебели?',
                'question_it' => 'Qual è il tipo di mobili che i mobili di risorse vendono?
',
                'answer' => 'We have a dedicated customer service team committed to
                                    making sure that you are happy. (with your furniture, that is) Please email <a
                                            href="mailto:customerservice@cavio.it" class="colored_link anim-underline">customerservice@cavio
                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>',
                'answer_it' => 'Abbiamo un team dedicato di assistenza clienti impegnato',
                'answer_ru' => 'У нас есть специализированная команда обслуживания клиентов, приверженная',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'What type of furniture does Resource Furniture sell?',
                'question_ru' => 'Какую мебель продает мебель для мебели?',
                'question_it' => 'Qual è il tipo di mobili che i mobili di risorse vendono?
',
                'answer' => 'We have a dedicated customer service team committed to
                                    making sure that you are happy. (with your furniture, that is) Please email <a
                                            href="mailto:customerservice@cavio.it" class="colored_link anim-underline">customerservice@cavio
                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>',
                'answer_it' => 'Abbiamo un team dedicato di assistenza clienti impegnato',
                'answer_ru' => 'У нас есть специализированная команда обслуживания клиентов, приверженная',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'What type of furniture does Resource Furniture sell?',
                'question_ru' => 'Какую мебель продает мебель для мебели?',
                'question_it' => 'Qual è il tipo di mobili che i mobili di risorse vendono?
',
                'answer' => 'We have a dedicated customer service team committed to
                                    making sure that you are happy. (with your furniture, that is) Please email <a
                                            href="mailto:customerservice@cavio.it" class="colored_link anim-underline">customerservice@cavio
                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>',
                'answer_it' => 'Abbiamo un team dedicato di assistenza clienti impegnato',
                'answer_ru' => 'У нас есть специализированная команда обслуживания клиентов, приверженная',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'What type of furniture does Resource Furniture sell?',
                'question_ru' => 'Какую мебель продает мебель для мебели?',
                'question_it' => 'Qual è il tipo di mobili che i mobili di risorse vendono?
',
                'answer' => 'We have a dedicated customer service team committed to
                                    making sure that you are happy. (with your furniture, that is) Please email <a
                                            href="mailto:customerservice@cavio.it" class="colored_link anim-underline">customerservice@cavio
                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>',
                'answer_it' => 'Abbiamo un team dedicato di assistenza clienti impegnato',
                'answer_ru' => 'У нас есть специализированная команда обслуживания клиентов, приверженная',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'What type of furniture does Resource Furniture sell?',
                'question_ru' => 'Какую мебель продает мебель для мебели?',
                'question_it' => 'Qual è il tipo di mobili che i mobili di risorse vendono?
',
                'answer' => 'We have a dedicated customer service team committed to
                                    making sure that you are happy. (with your furniture, that is) Please email <a
                                            href="mailto:customerservice@cavio.it" class="colored_link anim-underline">customerservice@cavio
                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>',
                'answer_it' => 'Abbiamo un team dedicato di assistenza clienti impegnato',
                'answer_ru' => 'У нас есть специализированная команда обслуживания клиентов, приверженная',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('f_a_q_s')->insert($faqs);


        $this->enableForeignKeys();
    }
}
