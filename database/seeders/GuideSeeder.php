<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Guide;
use App\Models\Review;
use Illuminate\Database\Seeder;

class GuideSeeder extends Seeder
{
    public function run(): void
    {
        $guides = [
            [
                'slug' => 'mob',
                'category' => 'war',
                'tag' => 'hot',
                'title_uk' => 'Неконституційна примусова мобілізація: захист прав 2026',
                'title_en' => 'Illegal Forced Mobilization: Rights Protection 2026',
                'desc_uk' => 'Що робити якщо схопили на вулиці без документів. Підроблена В. Перевірка. 48-годинний протокол звільнення. Habeas corpus.ections.',
                'desc_en' => 'What to do if detained without documents. Forged medical examination. 48-hour release protocol. Habeas corpus. State Bureau of Investigation.',
                'advantages_uk' => "48-годинний протокол звільнення\nHabeas corpus зразок\nСкарга в ГБР\nПідготовка до ЄСПЛ",
                'advantages_en' => "48-hour release protocol\nHabeas corpus template\nSBI complaint\nECHR preparation",
                'features' => '45+ стор. · 9 розділів · 3 шаблони',
                'price_old' => 999,
                'price' => 699,
                'pages' => 45,
                'chapters' => 9,
                'templates' => 3,
                'status' => 'published',
                'sort' => 1,
            ],
            [
                'slug' => 'fop',
                'category' => 'biz',
                'tag' => 'new',
                'title_uk' => 'ФОП під час мобілізації 2026',
                'title_en' => 'FOP (Sole Proprietor) During Mobilization 2026',
                'desc_uk' => 'Призупинення ФОП, звільнення від ЄСВ, захист рахунків, договори і форс-мажор. Відновлення бізнесу після служби.',
                'desc_en' => 'FOP suspension, exemption from social contributions, account protection, contracts and force majeure. Business recovery after service.',
                'advantages_uk' => "Призупинення без штрафів\nЗахист рахунків\nФорс-мажор для контрагентів\nТактика відновлення",
                'advantages_en' => "Penalty-free suspension\nAccount protection\nForce majeure for counterparties\nRecovery tactics",
                'features' => '48+ стор. · 11 розділів · 3 шаблони',
                'price_old' => 999,
                'price' => 699,
                'pages' => 48,
                'chapters' => 11,
                'templates' => 3,
                'status' => 'published',
                'sort' => 2,
            ],
            [
                'slug' => 'raid',
                'category' => 'biz',
                'tag' => 'biz',
                'title_uk' => 'Захист корпоративних прав від рейдерства 2026',
                'title_en' => 'Corporate Rights Protection from Raiding 2026',
                'desc_uk' => '8 схем рейдерства 2026. Реєстраційний захист. 48-годинний протокол при атаці. Антирейдерська комісія. КЕП і статут.',
                'desc_en' => '8 raiding schemes 2026. Registry protection. 48-hour attack protocol. Anti-raiding commission. Electronic signatures and charter.',
                'advantages_uk' => "8 схем на 2026\n48-годинний протокол\nАнтирейдерська комісія\nКЕП + статут",
                'advantages_en' => "8 schemes for 2026\n48-hour protocol\nAnti-raiding commission\nEDS + charter",
                'features' => '45+ стор. · 9 розділів · 3 шаблони',
                'price_old' => 999,
                'price' => 699,
                'pages' => 45,
                'chapters' => 9,
                'templates' => 3,
                'status' => 'published',
                'sort' => 3,
            ],
            [
                'slug' => 'heri',
                'category' => 'family',
                'tag' => 'family',
                'title_uk' => 'Спадщина, поділ майна, розлучення',
                'title_en' => 'Inheritance, Property Division, Divorce',
                'desc_uk' => 'Спадщина після загибелі військового. Поділ спільного майна подружжя. Аліменти. Майно на окупованій території.',
                'desc_en' => 'Inheritance after a soldier\'s death. Division of marital property. Alimony. Property on occupied territory.',
                'advantages_uk' => "Спадщина для військових\nПоділ майна\nАліменти\nОкуповані території",
                'advantages_en' => "Inheritance for military\nProperty division\nAlimony\nOccupied territories",
                'features' => '40+ стор. · 8 розділів · 2 шаблони',
                'price_old' => 999,
                'price' => 699,
                'pages' => 40,
                'chapters' => 8,
                'templates' => 2,
                'status' => 'published',
                'sort' => 4,
            ],
            [
                'slug' => 'border',
                'category' => 'war',
                'tag' => 'travel',
                'title_uk' => 'Виїзд з України і повернення 2026',
                'title_en' => 'Leaving Ukraine and Return 2026',
                'desc_uk' => 'Законні варіанти для чоловіків 18–60. Виїзд з дітьми. Статус ВПО. Перетин КПВВ. Повернення і ТЦК.',
                'desc_en' => 'Legal options for men 18–60. Travel with children. IDP status. Crossing checkpoints. Return and military centers.',
                'advantages_uk' => "Варіанти для 18-60\nВиїзд з дітьми\nВПО + КПВВ\nПовернення без проблем",
                'advantages_en' => "Options for men 18–60\nTravel with children\nIDP + checkpoints\nSmooth return",
                'features' => '40+ стор. · 9 розділів · 2 шаблони',
                'price_old' => 999,
                'price' => 699,
                'pages' => 40,
                'chapters' => 9,
                'templates' => 2,
                'status' => 'published',
                'sort' => 5,
            ],
            [
                'slug' => 'credit',
                'category' => 'finance',
                'tag' => 'finance',
                'title_uk' => 'Захист від боргів і шахрайства',
                'title_en' => 'Protection from Debts and Fraud',
                'desc_uk' => 'Мікрокредити, колектори, банківська реструктуризація. Топ-10 схем шахрайства 2025. 30 кроків захисту.',
                'desc_en' => 'Micro-loans, collectors, bank restructuring. Top 10 fraud schemes 2025. 30 protection steps.',
                'advantages_uk' => "Топ-10 схем шахрайства\nЗахист від колекторів\nРеструктуризація\n30 кроків захисту",
                'advantages_en' => "Top-10 fraud schemes\nCollector protection\nRestructuring\n30 protection steps",
                'features' => '42+ стор. · 9 розділів · 3 шаблони',
                'price_old' => 999,
                'price' => 699,
                'pages' => 42,
                'chapters' => 9,
                'templates' => 3,
                'status' => 'published',
                'sort' => 6,
            ],
            [
                'slug' => 'comp',
                'category' => 'prop',
                'tag' => 'property',
                'title_uk' => 'Компенсація за зруйноване майно',
                'title_en' => 'Compensation for Destroyed Property',
                'desc_uk' => 'єВідновлення, АРМА, ЄСПЛ, Рада Європи. Чеклист 30 кроків. Шаблони заяв і скарг. Міжнародні механізми.',
                'desc_en' => 'eRecovery, ARMA, ECHR, Council of Europe. 30-step checklist. Application and complaint templates. International mechanisms.',
                'advantages_uk' => "єВідновлення крок за кроком\nАРМА/ЄСПЛ\nШаблони заяв\nМіжнародні механізми",
                'advantages_en' => "eRecovery step by step\nARMA/ECHR\nApplication templates\nInternational mechanisms",
                'features' => '35+ стор. · 8 розділів · 2 шаблони',
                'price_old' => 999,
                'price' => 699,
                'pages' => 35,
                'chapters' => 8,
                'templates' => 2,
                'status' => 'published',
                'sort' => 7,
            ],
        ];

        foreach ($guides as $item) {
            Guide::updateOrCreate(['slug' => $item['slug']], $item);
        }

        $cities = City::all();
        if ($cities->isNotEmpty()) {
            foreach (Guide::all() as $guide) {
                $existing = Review::where('guide_id', $guide->id)->count();
                if ($existing === 0) {
                    for ($i = 0; $i < 6; $i++) {
                        Review::create([
                            'author_name' => fake('uk_UA')->name(),
                            'city' => fake('uk_UA')->city(),
                            'rating' => rand(4, 5),
                            'text' => fake('uk_UA')->realText(180),
                            'status' => 'approved',
                            'city_id' => $cities->random()->id,
                            'guide_id' => $guide->id,
                        ]);
                    }
                }
            }
        }
    }
}
