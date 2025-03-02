<?php

return [
    'index' => [
        'title' => 'Kategoriler',
        'button' => [
            'add' => 'Yeni Ana Kategori Ekle',
            'sub_cat_add' => 'Yeni Alt Kategori Ekle',
        ],
        'table' => [
            'title' => 'Kategoriler',
            'th' => [
                'image' => 'Görsel',
                'title' => 'Kategori',
                'sub_category_count' => [
                    'name' => 'Alt Kategori Sayısı',
                    'title' => [
                        'no_sub_cat' => 'Anasayfada görünebilmesi için alt kategori eklenmeli.',
                        'sub_cat' => 'Anasayfada görüntüleniyor.',
                    ],
                ],
                'created_by' => 'Oluşturan',
                'created_at' => 'Oluşturulma Tarihi',
                'actions' => [
                    'view' => 'Sitede Gör',
                    'update' => 'Güncelle',
                    'delete' => 'Sil',
                ],
            ],
            'td' => [
                'sub_category_count' => ':sub_cat_count Alt Kategori',
            ],
            'empty' => 'Kayıtlarımızda listeleyecek kategori yok. Lütfen yeni kategori ekleyiniz!',
        ],
    ],
    'create' => [
        'title' => 'Kategori Ekle',
        'form' => [
            'title' => [
                'label' => 'Kategori Adı',
                'placeholder' => 'Kategori için başlık...',
            ],
            'description_tr' => [
                'label' => 'Kategori Açıklama (TR)',
                'placeholder' => 'Kategori için Türkçe açıklama gir...',
            ],
            'description_en' => [
                'label' => 'Kategori Açıklama (EN)',
                'placeholder' => 'Kategori için İngilizce açıklama gir...',
            ],
            'image' => 'Kategori Görseli',
            'parent_id' => [
                'label' => 'Ana Kategori',
                'placeholder' => 'Seçiniz...',
            ],
        ],
        'button' => [
            'save' => 'Kategoriyi Kaydet',
        ],
        'success' => 'Kategori Başarıyla Eklendi.',
    ],
    'edit' => [
        'title' => ':category Düzenle',
        'form' => [
            'title' => [
                'label' => 'Ana Kategori Adı',
                'placeholder' => 'Ana Kategori için başlık...',
            ],
            'description_tr' => [
                'label' => 'Ana Kategori Açıklama (TR)',
                'placeholder' => 'Ana Kategori için Türkçe açıklama gir...',
            ],
            'description_en' => [
                'label' => 'Ana Kategori Açıklama (EN)',
                'placeholder' => 'Ana Kategori için İngilizce açıklama gir...',
            ],
            'image' => 'Ana Kategori Görseli',
        ],
        'button' => [
            'save' => 'Ana Kategoriyi Kaydet',
        ],
        'success' => 'Ana Kategori Başarıyla Güncellendi.',
    ],
    'destroy' => [
        'success' => 'Ana Kategori ve alt kategorileri başarıyla silindi.',
        'fail' => 'Ana kategor silinirken bir sorun oluştu. Lütfen tekrar deneyiniz!',
    ],
];
