<?php

    use Illuminate\Database\Seeder;

    class ProductsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

            $data = [
                [
                    'id' => '1',
                    'category_id' => '9',
                    'brand_id' => '1',
                    'title' => 'Casio MRP-700-1 AVEFKXF - Касио МРП 700',
                    'alias' => 'casio-mrp-700-1avef',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 300,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '1.png',
                    'hit' => '1',
                ],
                [
                    'id' => '2',
                    'category_id' => '8',
                    'brand_id' => '1',
                    'title' => 'Casio MQ-24-7 BUL KXF - Касио МК',
                    'alias' => 'casio-mq-24-7bul',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 200,
                    'old_price' => 200,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '2.png',
                    'hit' => '1',
                ],
                [
                    'id' => '3',
                    'category_id' => '8',
                    'brand_id' => '1',
                    'title' => 'Casio GA-1000-1 AER KXF - Касио ДЖА АЕ К',
                    'alias' => 'casio-ga-1000-1aer',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 400,
                    'old_price' => 100,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '3.png',
                    'hit' => '1',
                ],
                [
                    'id' => '4',
                    'category_id' => '3',
                    'brand_id' => '2',
                    'title' => 'Citizen JP1010-00E KXF - Ситизен Дж П К ИКС Ф',
                    'alias' => 'citizen-jp1010-00e',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 350,
                    'old_price' => 200,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '4.png',
                    'hit' => '1',
                ],


                [
                    'id' => '5',
                    'category_id' => '5',
                    'brand_id' => '2',
                    'title' => 'Citizen BJ2111-08E KXF - Ситизен БДж211 ФБ',
                    'alias' => 'citizen-bj2111-08e',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 320,
                    'old_price' => 220,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '5.png',
                    'hit' => '1',
                ],
                [
                    'id' => '6',
                    'category_id' => '5',
                    'brand_id' => '2',
                    'title' => 'Citizen AT0696-59E KX - Ситизен АТС ФВ',
                    'alias' => 'citizen-at0696-59e',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '6.png',
                    'hit' => '1',
                ],


                [
                    'id' => '7',
                    'category_id' => '10',
                    'brand_id' => '3',
                    'title' => 'Q&Q Water Resistance VFQ - Кью Кью Вотер Резинтент ФВ',
                    'alias' => 'q-and-q-q956j302y',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 320,
                    'old_price' => 220,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '7.png',
                    'hit' => '1',
                ],
                [
                    'id' => '8',
                    'category_id' => '10',
                    'brand_id' => '4',
                    'title' => 'Royal London 41040-01VQ - Ройял Лондон Часы 410 ВКью',
                    'alias' => 'royal-london-41040-01',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '8.png',
                    'hit' => '1',
                ],
                [
                    'id' => '9',
                    'category_id' => '9',
                    'brand_id' => '4',
                    'title' => 'Royal London 20034-02 VQ - Ройял Лондон Часы 900',
                    'alias' => 'royal-london-20034-02',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 320,
                    'old_price' => 220,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '9.png',
                    'hit' => '1',
                ],
                [
                    'id' => '10',
                    'category_id' => '8',
                    'brand_id' => '4',
                    'title' => 'Royal London 41156-02 KVQ - - Ройял Лондон Часы ФВ 8',
                    'alias' => 'royal-london-41156-02',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '10.png',
                    'hit' => '1',
                ],


                [
                    'id' => '11',
                    'category_id' => '2',
                    'brand_id' => '2',
                    'title' => 'Swimming Watch VQ-01 - Часы для плавание в бассейне',
                    'alias' => 'chasy-1',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '11.png',
                    'hit' => '0',
                ],
                [
                    'id' => '12',
                    'category_id' => '2',
                    'brand_id' => '2',
                    'title' => 'Running Watch VQ-9 - Беговые часы на андроиде',
                    'alias' => 'chasy-2',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '12.png',
                    'hit' => '0',
                ],

                [
                    'id' => '13',
                    'category_id' => '15',
                    'brand_id' => '2',
                    'title' => 'Android Watch BQ-1 - Андроид часы БКЬю',
                    'alias' => 'chasy-3',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '13.png',
                    'hit' => '0',
                ],

                [
                    'id' => '14',
                    'category_id' => '13',
                    'brand_id' => '2',
                    'title' => 'Sport Watch BQ-009 - Часы спортивные Ультра',
                    'alias' => 'chasy-4',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '14.png',
                    'hit' => '0',
                ],

                [
                    'id' => '15',
                    'category_id' => '16',
                    'brand_id' => '2',
                    'title' => 'Apple Watch B Sport - Эпл Часы 4',
                    'alias' => 'chasy-5',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '15.png',
                    'hit' => '0',
                ],

                [
                    'id' => '16',
                    'category_id' => '12',
                    'brand_id' => '2',
                    'title' => 'Rolex Gold B For Water - Ролекс Голд Б для Плавания',
                    'alias' => 'chasy-6',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '16.png',
                    'hit' => '0',
                ],

                [
                    'id' => '17',
                    'category_id' => '11',
                    'brand_id' => '2',
                    'title' => 'Sumsung Gear Pro F-sport - Самсунг Геар Про Ф Спорт',
                    'alias' => 'chasy-7',
                    'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>',
                    'price' => 370,
                    'old_price' => 250,
                    'status' => '1',
                    'keywords' => 'watch',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                    'img' => '17.png',
                    'hit' => '0',
                ],

            ];

            DB::table('products')->insert($data);
        }
    }
