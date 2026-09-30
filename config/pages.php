<?php

/*
|--------------------------------------------------------------------------
| Page Content Types
|--------------------------------------------------------------------------
|
| Central definition of the content types used across the site.
| Each type drives the dashboard page form (which fields are shown),
| the file validation rules and the default ordering applied when
| listing pages in the dashboard.
|
| "validation" mirrors the legacy number_validation mapping from
| app/Models/Page.php:1 (programme=1, caritas=2, direction=3, news=4,
| votations=5, events=6).
|
*/

return [

    /*
    | The content types available to an admin when creating a page.
    | Keys are stable slugs stored nowhere in the DB; the mapping to
    | sections is done through section titles.
    */
    'types' => [
        'generic' => [
            'label' => 'Générique',
            'description' => 'Page standard (programme, participer, médias, etc.)',
            'icon' => 'fa-file-alt',
            'sections' => ['programme', 'participer', 'medias'],
            'order_by' => 'sort_order',
            'order_direction' => 'asc',
            'validation' => 1,
            'fields' => [
                'title', 'subtitle', 'category', 'url', 'number', 'year',
                'icon', 'image', 'image_responsive', 'content', 'content_sec',
                'link', 'pdf', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'program' => [
            'label' => 'Programme',
            'description' => 'Page du programme politique (le programme politique du Christ-Roi)',
            'icon' => 'fa-list-check',
            'sections' => ['programme'],
            'order_by' => 'sort_order',
            'order_direction' => 'asc',
            'validation' => 1,
            'fields' => [
                'title', 'subtitle', 'category', 'url', 'number', 'year',
                'icon', 'image', 'image_responsive', 'content', 'content_sec',
                'link', 'pdf', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'caritas' => [
            'label' => 'Participer / Caritas',
            'description' => 'Page de la section participer (Caritas)',
            'icon' => 'fa-hands-helping',
            'sections' => ['participer'],
            'order_by' => 'sort_order',
            'order_direction' => 'asc',
            'validation' => 2,
            'fields' => [
                'title', 'subtitle', 'url', 'icon', 'image', 'image_responsive',
                'content', 'content_sec', 'link', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'director' => [
            'label' => 'Direction',
            'description' => 'Page du comité directeur',
            'icon' => 'fa-user-tie',
            'sections' => ['direction'],
            'order_by' => 'sort_order',
            'order_direction' => 'asc',
            'validation' => 3,
            'fields' => [
                'title', 'subtitle', 'category', 'url', 'number', 'image',
                'content', 'content_sec', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'news' => [
            'label' => 'Actualité',
            'description' => 'Article de la section actualités',
            'icon' => 'fa-newspaper',
            'sections' => ['news'],
            'order_by' => 'created_at',
            'order_direction' => 'desc',
            'validation' => 4,
            'fields' => [
                'title', 'subtitle', 'category', 'url', 'image', 'content',
                'content_sec', 'link', 'pdf', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'votation' => [
            'label' => 'Votation / Initiative',
            'description' => 'Votation ou initiative populaire (démocratie directe)',
            'icon' => 'fa-square-poll-vertical',
            'sections' => ['democratie'],
            'order_by' => 'sort_order',
            'order_direction' => 'asc',
            'validation' => 5,
            'fields' => [
                'title', 'subtitle', 'category', 'url', 'number', 'year',
                'icon', 'image', 'image_responsive', 'content', 'content_sec',
                'link', 'pdf', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'event' => [
            'label' => 'Événement',
            'description' => 'Conférence ou événement de l’agenda',
            'icon' => 'fa-calendar-days',
            'sections' => ['events'],
            'order_by' => 'created_at',
            'order_direction' => 'desc',
            'validation' => 6,
            'fields' => [
                'title', 'subtitle', 'category', 'url', 'number', 'year',
                'icon', 'image', 'image_responsive', 'events_image', 'content',
                'content_sec', 'link', 'pdf', 'upload_video', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'bulletin' => [
            'label' => 'Bulletin',
            'description' => 'Numéro du bulletin des Amis de Saint François de Sales',
            'icon' => 'fa-book-open',
            'sections' => ['le-bulletin'],
            'order_by' => 'number',
            'order_direction' => 'desc',
            'validation' => null,
            'fields' => [
                'title', 'subtitle', 'number', 'period', 'year', 'content',
                'pdf', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'rom_kurier' => [
            'label' => 'Rom-Kurier',
            'description' => 'Numéro du Der Rom-Kurier',
            'icon' => 'fa-newspaper',
            'sections' => ['der-rom-kurier'],
            'order_by' => 'number',
            'order_direction' => 'desc',
            'validation' => null,
            'fields' => [
                'title', 'subtitle', 'number', 'period', 'year', 'content',
                'pdf', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'catechism' => [
            'label' => 'Catéchisme',
            'description' => 'Leçon de catéchisme du Refuge des Pécheurs',
            'icon' => 'fa-hands-praying',
            'sections' => ['rdp/cours-de-catechisme/accueil'],
            'order_by' => 'sort_order',
            'order_direction' => 'asc',
            'validation' => null,
            'fields' => [
                'title', 'subtitle', 'category', 'url', 'content', 'content_sec',
                'link', 'pdf', 'is_active', 'sort_order', 'created_at',
            ],
        ],
        'diocesan' => [
            'label' => 'Groupe diocésain',
            'description' => 'Groupe diocésain (vaterland / groupes diocésains)',
            'icon' => 'fa-church',
            'sections' => ['vaterland'],
            'order_by' => 'sort_order',
            'order_direction' => 'asc',
            'validation' => null,
            'fields' => [
                'title', 'subtitle', 'category', 'url', 'content', 'content_sec',
                'link', 'pdf', 'is_active', 'sort_order', 'created_at',
            ],
        ],
    ],

    /*
    | Default content type used when a section does not match any
    | defined type.
    */
    'default_type' => 'generic',

    /*
    | Mapping of the legacy "number_validation" values to their image
    | dimension constraints. Used by the page FormRequests.
    */
    'image_rules' => [
        1 => [ // programme
            'icon' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=60,max_height=60'],
            'image' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:min_width=1500,max_height=650'],
            'image_responsive' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=500,max_height=200'],
        ],
        2 => [ // participer / caritas
            'icon' => ['mimes:png,jpeg,jpg', 'max:2048', 'dimensions:max_width=400,max_height=380'],
            'image' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=650,max_height=900'],
            'image_responsive' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=300,max_height=400'],
        ],
        3 => [ // director
            'image' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=230,max_height=250'],
        ],
        4 => [ // news
            'image' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=600,max_height=600'],
        ],
        5 => [ // initiatives / referendums
            'icon' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=550,max_height=250'],
            'image' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=1200,max_height=570'],
            'image_responsive' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=500,max_height=480'],
        ],
        6 => [ // events
            'icon' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=700,max_height=350'],
            'image' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=800,max_height=1150'],
            'image_responsive' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=400,max_height=600'],
            'events_image' => ['mimes:jpeg,jpg,png', 'max:2048', 'dimensions:max_width=5000,max_height=5000'],
        ],
    ],

    /*
    | Generic file rules applied to every page type.
    */
    'file_rules' => [
        'pdf' => ['mimes:pdf', 'max:10240'],
        'upload_video' => ['mimes:mp4,mov,ogg,webm', 'max:102400'],
    ],

    /*
    | The months available for the "period" multi-select (bulletins).
    */
    'months' => [
        'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
        'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre',
    ],

];
