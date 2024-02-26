<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => ':attribute boş geçilemez.',
    'email' => 'Geçerli bir e-posta adresi girin.',
    'unique' => 'Bu e-posta adresi başka bir kullanıcı tarafından kullanılıyor.',
    'max' => [
        'numeric' => ':attribute en fazla :max karakterden oluşabilir.',
        'file' => ':attribute en fazla :max karakterden oluşabilir.',
        'string' => ':attribute en fazla :max karakterden oluşabilir.',
        'array' => ':attribute en fazla :max karakterden oluşabilir.',
    ],
    'min' => [
        'numeric' => ':attribute en az :min karakterden oluşabilir.',
        'file' => ':attribute en az :min karakterden oluşabilir.',
        'string' => ':attribute en az :min karakterden oluşabilir.',
        'array' => ':attribute en az :min karakterden oluşabilir.',
    ],
    'same' => 'Şifre ve şifre onay aynı olmalıdır.',
    'accepted' => ':attribute okuyup kabul etmelisiniz.',
    'password' => [
        'mixed' => ':attribute de en az bir tane küçük harf ve en az bir tane büyük harf bulunmalıdır.',
        'numbers' => ':attribute de en az bir tane rakam bulunmalıdır.',
    ],
    'mimetypes' => 'Yüklediğiniz dosya uzantısı .ico olmalıdır.',
    'mimes' => 'Yüklediğiniz dosya uzantısı :values olmalıdır.',
    'url' => ':attribute bağlantısı bir :values olmalıdır.',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'contract' => 'Üyelik sözleşmesini, gizlilik politikasını ve aydınlatma metnini',
        'firstName' => 'Ad',
        'lastName' => 'Soyad',
        'email' => 'E-posta adresi',
        'password' => 'Şifre',
        'passwordConfirm' => 'Şifre onay',
        'oldPassword' => 'Mevcut şifre',
        'newPassword' => 'Yeni şifre',
        'newPasswordConfirm' => 'Yeni şifre onay',
        'phoneNumber' => 'Telefon numarası',
        'faxNumber' => 'Fax numarası',
        'kep' => 'Kep adresi',
        'address' => 'Adres',
        'birthday' => 'Doğum tarihi',
        'categoryTitle' => 'Kategori adı',
        'categoryKeywords' => 'Kategori anahtar kelimeleri',
        'categoryDescription' => 'Kategori açıklaması',
        'categoryOrder' => 'Kategori sırası',
        'siteSlogan' => 'Site slogan',
        'siteTitle' => 'Site başlığı',
        'homepage' => 'Anasayfa url',
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'twitter' => 'Twitter',
        'pinterest' => 'Pinterest',
        'linkedin' => 'Linkedin',
        'youtube' => 'Youtube',
        'taxNumber' => 'Vergi numarası',
        'commercialRegisterNumber' => 'Ticaret sicil numarası',
        'mersisNumber' => 'Mersis numarası',
        'responsiblePerson' => 'Sorumlu kişi',
        'midWeek' => 'Hafta içi çalışma saatleri',
        'saturday' => 'Cumartesi günü çalışma saatleri',
        'sunday' => 'Pazar günü çalışma saatleri',
    ],
];
