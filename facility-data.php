<?php

$facility_categories = [
    'support-elderly' => '高齢者支援',
    'support-disabilities_work' => '障がい者支援（就労支援）',
    'support-disabilities' => '障がい者支援',
];

$support['support-elderly'] = [
    '特別養護老人ホーム' => [
        'description' => '介護が必要な高齢の方に日常生活の介護や健康管理等のサービスを行い、自立に向けた日常生活を営むことができる様に支援しています。',
        'target' => '日常生活で常時介護を必要とし自宅での生活が困難な方が対象です。',
        'image' => '../../wp-content/uploads/2020/07/support-elderly_c01.jpg',
    ],
    '短期入所（ショートステイ）' => [
        'description' => '在宅で介護が必要な方に、短期間入所利用をして日常生活上の世話や機能訓練をして、家族の負担を軽減するサービスです。',
        'target' => '介護をする家族の方の様々な事情や身体的、精神的負担の軽減が必要な事情にある介護が必要な方が対象です。',
        'image' => '../../wp-content/uploads/2020/07/support-elderly_shortstay.jpg',
    ],
    'グループホーム' => [
        'description' => '介護が必要な高齢の方に日常生活の介護や健康管理等のサービスを行い、自立に向けた日常生活を営むことができる様に支援しています。',
        'target' => '日常生活で常時介護を必要とし自宅での生活が困難な方が対象です。',
        'image' => '../../wp-content/uploads/2020/07/support-elderly_grouphome.jpg',
    ],
    'デイサービス' => [
        'description' => '在宅で介護や支援の必要な方が、通所により必要な日常生活の世話や機能訓練を受けて心身機能を維持できる様に支援しています。',
        'target' => '自立から要介護度５の方まで',
        'image' => '../../wp-content/uploads/2020/07/support-elderly_c02.jpg',
    ],
    '住宅型有料老人ホーム' => [
        'description' => '高齢の方が入所し、食事その他の日常生活に必要なサポートを受けて安心した生活が出来る様に配慮しています。',
        'target' => '原則として介護を必要とする方',
        'image' => '../../wp-content/uploads/2020/07/support-elderly_zyutaku.jpg',
    ],
    'ヘルパーセンター（訪問介護）' => [
        'description' => '介護や援助が必要な高齢の方の自宅を訪問して、入浴・排泄・食事などの介護や家事援助をします。',
        'target' => '原則として介護を必要とする方',
        'image' => '../../wp-content/uploads/2020/07/support-elderly_helpercenter.jpg',
    ],
    '看護小規模多機能型' => [
        'description' => '通い・泊まり・訪問看護のサービスを一体に提供するサービス。身体状況など事情に応じ、様々なサービスを組み合わせて利用することが可能。',
        'target' => '要介護度1～要介護度5の方',
        'image' => '../../wp-content/uploads/2020/07/support-elderly_st.jpg',
    ],
];

$support['support-disabilities'] = [
    '施設入所支援' => [
        'description' => '生活介護または自立訓練もしくは就労支援の対象者に対し、日中活動と合わせて夜間などにおける入浴・排泄または食事の介護などの提供を目的として、障害者支援施設において必要な介護・支援などを実施します。',
        'image' => '../../wp-content/uploads/2020/06/support-disabilities_c01.jpg',
    ],
    '生活介護' => [
        'description' => '主に日中に障害者支援施設で、食事・入浴・排泄などの介護、日常生活上の支援、軽作業などの生産活動や創作的活動の機会の提供をし、身体能力、日常生活能力の維持、向上を目的として必要な介護などを実施します。',
        'image' => '../../wp-content/uploads/2020/07/support-disabilities_c02.jpg',
    ],
    '短期入所（ショートステイ）' => [
        'description' => '障がい者の生活する居宅で、介護を行う家族などの病気やその他の理由により、障害者支援施設等で短期間の入所を必要とする障がい者、障がい児に対し、入浴、排泄または食事などの介護や日常生活上の支援を提供します。',
        'image' => '../../wp-content/uploads/2020/07/support-disabilities_c03.jpg',
    ],
    '就労支援' => [
        'description' => '利用対象者に対し、生産活動やその他の活動の機会を通じて、就労に必要な知識や能力の向上のために必要な訓練等を行うサービスです。',
        'image' => '../../wp-content/uploads/2020/06/support-disabilities_c04.jpg',
    ],
    'グループホーム' => [
        'description' => '生活介護や就労支援等の日中活動を利用している方や、就労をしている知的障がい者や精神障がい者が主として夜間において、共同生活を営む住居で行う支援です。',
        'image' => '../../wp-content/uploads/2020/07/support-disabilities_c05.jpg',
    ],
    '児童発達支援' => [
        'description' => '障がいを持つ児童が日常生活における基本的動作や知識技能を習得し、集団生活に適応できるよう適切で効果的な指導や訓練などのサービスです。',
        'image' => '../../wp-content/uploads/2020/06/support-disabilities_c06.jpg',
    ],
    '相談支援' => [
        'description' => '総合的な相談、サービスの利用援助、計画的なプログラムに基づく支援を必要とする場合のサービス利用計画の作成などの相談支援、また支給決定を受けた利用者で施設入所支援を除く一定以上の種類のサービスを組み合わせて利用することが必要な方や、入院・入所から地域生活へ移行する方へ、計画的なプログラムの作成を行うサービスです。<br>
        <small>※平成28年4月1日より、弘前市内の拓光園相談支援事業所、山郷館相談支援事業所、指定相談支援事業所ビリーブが統合し、『七峰会総合福祉相談支援センター ビリーブ』として新たなスタートを切りました。</small>',
        'image' => '../../wp-content/uploads/2020/06/support-disabilities_c07.jpg',
    ],
    '福祉ホーム' => [
        'description' => '事業者と利用者が賃貸契約を結び、低額な料金で、居室その他の設備を利用できるサービスです。        ',
        'image' => '../../wp-content/uploads/2020/06/support-disabilities_c08.jpg',
    ],
];

$facility_data['sunapple'] = [
    'name' => 'サンアップルホーム<wbr>グループ',
    'subname' => '特別養護老人ホーム サンアップルホーム',
    'image' => site_url('/wp-content/uploads/2020/06/f_sunapplehome.jpg'),
    'description' => '人間の尊厳保持・回復を目指し「おむつゼロ・水分・常食・歩行」を｢知識をもち、しっかりした理論で実践｣し、高品質なサポートを行っています。',
    'address' => '青森県弘前市大字高杉字尾上山350番地',
    'area' => '青森県弘前市大字高杉',
    'maplink' => 'https://goo.gl/maps/uxynFcu7cqyu1Jc49',
    'tel' => '0172-97-2111',
    'fax' => '0172-97-2112',
    'homepage' => 'http://www.sunapplehome.jp/',
    'category' => 'support-elderly',
    'tags' => [
        '特別養護老人ホーム',
        '短期入所（ショートステイ）',
        'グループホーム',
        'デイサービス',
        '住宅型有料老人ホーム',
        'ヘルパーセンター（訪問介護）',
        '看護小規模多機能型',
    ],
];

$facility_data['takushinkan'] = [
    'name' => '拓心館グループ ',
    'subname' => '障がい者総合支援センター拓心館',
    'image' => site_url('/wp-content/uploads/2020/06/f_takushinkan.jpg'),
    'description' => '障がいのある子どもたちの健やかな成長に寄与し、長じては障がいがある人たちの「就労と社会自立」「地域生活の継続」「豊かな生活の支援」を三本柱として活動しています。',
    'address' => '青森県弘前市大字熊嶋字亀田184番地1',
    'area' => '青森県弘前市大字熊嶋',
    'maplink' => 'https://goo.gl/maps/wUV5gEnLixMPxFhE6',
    'tel' => '0172-82-4520',
    'fax' => '0172-82-5544',
    'homepage' => 'http://www.takushinkan.jp/',
    'category' => 'support-disabilities_work',
    'tags' => [
        '相談支援',
		'就労支援',
        '自立訓練（生活訓練・宿泊型）',
        '共同生活援助・介護',
        '児童発達支援',
        '就労継続支援B型',
        '放課後等デイサービス',
    ],
];

$facility_data['takkouen'] = [
    'name' => '拓光園グループ',
    'subname' => '障害者支援施設 拓光園',
    'image' => site_url('/wp-content/uploads/2020/07/f_takkouen.jpg'),
    'description' => '障がいのある方たちが様々な福祉サービス（支援・援助）を受けられるよう施設入所をはじめ、日中一時支援事業、短期入所事業、相談支援事業等多岐にわたり支援しています。',
    'address' => '青森県弘前市大字百沢字東岩木山2628番地',
    'area' => '青森県弘前市大字百沢',
    'maplink' => 'https://goo.gl/maps/6BCgxq3Nmyk5rC6m6',
    'tel' => '0172-96-2331',
    'fax' => '0172-96-2332',
    'homepage' => 'http://www.takkouen.jp/',
    'category' => 'support-disabilities',
    'tags' => [
        '施設入所支援',
        '生活介護',
        '放課後等デイサービス事業',
        'グループホーム',
        '日中一時支援',
    ],
];

$facility_data['sangoukan-hirosaki'] = [
    'name' => '山郷館弘前グループ',
    'subname' => '障害者支援施設 山郷館',
    'image' => site_url('/wp-content/uploads/2020/07/f_sangoukanh.jpg'),
    'description' => '施設・在宅、介護、就労、住まい、相談など『だれでも・どこでも・いつでも』受けられることを目標に信頼されるサービス・トータル支援を行なっています。',
    'address' => '青森県弘前市大字百沢字東岩木山2628番地',
    'area' => '青森県弘前市大字百沢',
    'maplink' => 'https://goo.gl/maps/NJaWPk2Cv513AUHi7',
    'tel' => '0172-97-2211',
    'fax' => '0172-97-2213',
    'homepage' => 'http://www.sangoukan.jp/',
    'category' => 'support-disabilities',
    'tags' => [
        '施設入所支援',
        '生活介護',
        '短期入所（ショートステイ）',
        '移動支援事業（日中活動サービス送迎）',
        '日中一時支援',
    ],
];

$facility_data['kyokkouen'] = [
    'name' => '旭光園グループ',
    'subname' => '障害者支援施設 旭光園',
    'image' => site_url('/wp-content/uploads/2020/06/f_kyokkouen.jpg'),
    'description' => '平川市を中心にご利用される方の「働く」・「暮らす」を大事に、施設入所支援、就労継続支援、生活介護福祉ホーム等を展開しています。',
    'address' => '青森県平川市猿賀明堂255番地',
    'area' => '青森県平川市猿賀明堂',
    'maplink' => 'https://goo.gl/maps/HA2GzhXFX9q3rqMS9',
    'tel' => '0172-57-5155',
    'fax' => '0172-57-5155',
    'homepage' => 'http://www.kyokkouen.jp/',
    'category' => 'support-disabilities_work',
    'tags' => [
        '就労継続支援B型',
        '生活介護',
		'就労支援',
        '施設入所支援',
        '障害者短期入所事業',
        '福祉ホーム',
    ],
];

$facility_data['sangoukan-kuroishi'] = [
    'name' => '山郷館黒石グループ',
    'subname' => '障害者支援施設 山郷館くろいし',
    'image' => site_url('/wp-content/uploads/2020/09/f_sangoukank202009.jpg'),
    'description' => '黒石市を中心に入居者のみなさまの生活支援はもちろん、地域社会の一員として、共に生きていけるよう介護・福祉に関する様々な支援を行っています。',
    'address' => '青森県黒石市八甲64番地1',
    'area' => '青森県黒石市八甲',
    'maplink' => 'https://goo.gl/maps/jMKCP4uJvMyaSWP9A',
    'tel' => '0172-53-3070',
    'fax' => '0172-53-6191',
    'homepage' => 'http://www.sangoukan-kuroishi.jp/',
    'category' => 'support-disabilities',
    'tags' => [
        '施設入所支援',
		'就労支援',
        '生活介護',
        '短期入所（ショートステイ）',
        '就労継続支援B型',
        'グループホーム',
        '日中一時支援',
    ],
];

$facility_data['aobamomiji-aoba'] = [
    'name' => '青葉もみじグループ<wbr>（青葉寮）',
    'subname' => '障害者支援施設 青葉寮',
    'image' => site_url('/wp-content/uploads/2020/08/f_momijiaoba.jpg'),
    'description' => '弘南鉄道平賀駅から車で約10分の唐竹にあり、4つの事業を展開しています。りんご畑に囲まれ自然豊かな環境です。',
    'address' => '青森県平川市唐竹高田45番地',
    'area' => '青森県平川市唐竹高田',
    'maplink' => 'https://goo.gl/maps/r5PzoPA3GNsPrDyk9',
    'tel' => '0172-44-8231',
    'fax' => '0172-44-8232',
    'homepage' => 'https://www.aobamomiji.jp/',
    'category' => 'support-disabilities',
    'tags' => [
        '施設入所支援',
        '生活介護',
        '短期入所（空床型）',
        '日中一時支援事業',
    ],
];

$facility_data['aobamomiji-gakuen'] = [
    'name' => '青葉もみじグループ<wbr>（もみじ学園）',
    'subname' => '障害児入所施設 もみじ学園',
    'image' => site_url('/wp-content/uploads/2020/06/f_momijigakuen.jpg'),
    'description' => '弘南鉄道黒石駅から車で約20分の南中野にあり、5つの事業を展開しています。風光明媚な中野もみじ山を一望できます。',
    'address' => '青森県黒石市南中野上平5番地3',
    'area' => '青森県黒石市南中野',
    'maplink' => 'https://goo.gl/maps/kcMDZYMRZBjAg1Qh7',
    'tel' => '0172-54-8228',
    'fax' => '0172-54-8233',
    'homepage' => 'https://www.aobamomiji.jp/',
    'category' => 'support-disabilities',
    'tags' => [
        '福祉型障害児入所施設',
        '施設入所支援',
        '生活介護',
        '短期入所（空床型）',
        '日中一時支援事業',
    ],
];

// $facility_data[''] = [
//     'name' => ' ',
//     'subname' => '',
//     'image' => site_url(''),
//     'address' => '',
//     'maplink' => '',
//     'tel' => '',
//     'fax' => '',
//     'homepage' => '',
//     'category' => '',
//     'tags' => [
//         '',
//     ],
// ];