<?php
    // Seeder Apartments Data
    return [
        'apartments' => [
            [
                'name' => 'La tana',
                'room_number' => 4,
                'bed_number' => 3,
                'bathroom_number' => 1,
                'square_meters' => 100,
                'latitude' => 41.967623490519905,
                'longitude' => 12.743934821499842,
                'address' => 'Via Roma',
                'image' => 'apartment1',
                'visible' => true
            ],
            [
                'name' => 'Il ponte azzurro',
                'room_number' => 5,
                'bed_number' => 3,
                'bathroom_number' => 2,
                'square_meters' => 200,
                'latitude' => 41.959310774356474,
                'longitude' => 12.750801276147907,
                'address' => 'Viale della Repubblica',
                'image' => 'apartment2',
                'visible' => false
            ],
            [
                'name' => 'Il sole sorgente',
                'room_number' => 8,
                'bed_number' => 5,
                'bathroom_number' => 3,
                'square_meters' => 300,
                'latitude' => 41.97096902436032,
                'longitude' => 12.784646101153111,
                'address' => 'Via Venezia',
                'image' => 'apartment3',
                'visible' => true
            ],
            [
                'name' => 'Villa Luxury',
                'room_number' => 10,
                'bed_number' => 5,
                'bathroom_number' => 3,
                'square_meters' => 400,
                'latitude' => 41.57423442581285,
                'longitude' => 12.51246734975687,
                'address' => 'Via delle bandiere',
                'image' => 'apartment4',
                'visible' => true
            ]
        ],
        'services' => [
            'Wifi',
            'Kitchen',
            'Washing machine',
            'Dryer',
            'Air conditioning',
            'Heating',
            'Dedicated workspace',
            'TV',
            'Hair dryer',
            'Iron',
            'Features',
            'Pool',
            'Hot tub',
            'Free parking',
            'EV charger',
            'Cot',
            'Gym',
            'BBQ grill',
            'Breakfast',
            'Smoking allowed',
            'Indoor fireplace',
            'Beachfront',
            'Waterfront',
            'Safety',
            'Smoke alarm',
            'Carbon monoxide alarm'
        ],
        'sponsorships' => [
            [
                'name' => 'Basic',
                'price' => 2.99,
                'hours' => 24,
            ],
            [
                'name' => 'Standard',
                'price' => 5.99,
                'hours' => 72,
            ],
            [
                'name' => 'Premium',
                'price' => 9.99,
                'hours' => 144,
            ],
        ],
        'messages' => [
            "bruno@gmail.com" => "Hello, my name is bruno contact me please" ,
            "fabri@gmail.com" => "Hi, is the apartment available for the first week of august?",
            "sonia@gmail.com" => "Good morning, is there a bus stop near your apartment?",
            "wilmer@gmail.com" => "Hi, does your apartment host dogs?"
        ]
    ];
?>
