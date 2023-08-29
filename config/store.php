<?php
    // Seeder Apartments Data
    return [
        'apartments' => [
            [
                'name' => 'Panoramic Dome',
                'description' => 'Imagine waking up to the breathtaking sight of mountain peaks, surrounded by the winter enchantment of Aspen. This cozy chalet offers you a luxurious retreat in the heart of the Alps',
                'room_number' => 4,
                'bed_number' => 3,
                'bathroom_number' => 1,
                'square_meters' => 140,
                'latitude' => 39.1911,
                'longitude' => -106.8175,
                'address' => '30 Alpine View Road, Aspen',
                'visible' => true
            ],
            [
                'name' => 'Beautiful Apartment',
                'description' => 'Immerse yourself in the Parisian ambiance from this chic apartment. With a panoramic view of the City of Lights, become a part of the elegance that Paris offers',
                'room_number' => 5,
                'bed_number' => 3,
                'bathroom_number' => 2,
                'square_meters' => 100,
                'latitude' => 48.8566,
                'longitude' => 2.3522,
                'address' => '23 Glassview Avenue, Paris',
                'visible' => false
            ],
            [
                'name' => 'Nature House',
                'description' => 'Embrace the serene elegance of Lake Tahoe at this residence overlooking its pristine waters. From sunrise to sunset, find tranquility and inspiration in this lakeside sanctuary',
                'room_number' => 8,
                'bed_number' => 5,
                'bathroom_number' => 3,
                'square_meters' => 300,
                'latitude' => 39.0968,
                'longitude' => -120.0324,
                'address' => '28 Greenbreeze Lane, Lake Tahoe',
                'visible' => true
            ],
            [
                'name' => 'Beautiful Wooden House',
                'description' => 'Embark on an alpine adventure from this Chamonix haven. Surrounded by lush meadows and towering peaks, find comfort and elegance in this gateway to mountain exploration',
                'room_number' => 10,
                'bed_number' => 5,
                'bathroom_number' => 4,
                'square_meters' => 225,
                'latitude' => 45.9237,
                'longitude' => 6.8694,
                'address' => '33 Alpine Meadow Road, Chamonix',
                'visible' => true
            ],
            [
                'name' => 'Amazing Nature Villa',
                'description' => 'Perched high in the Swiss Alps, this residence offers unparalleled views and an evergreen embrace. Discover a world where relaxation meets adventure in the lap of alpine luxury',
                'room_number' => 9,
                'bed_number' => 7,
                'bathroom_number' => 3,
                'square_meters' => 400,
                'latitude' => 46.8182,
                'longitude' => 8.2275,
                'address' => '15 Evergreen Heights, Swiss Alps',
                'visible' => true
            ],
            [
                'name' => 'Mountain Cottage',
                'description' => 'Lose yourself in the rugged beauty of Big Sur from this rustic retreat. Experience the allure of coastal living with a touch of luxury in this coastal woodland escape',
                'room_number' => 5,
                'bed_number' => 2,
                'bathroom_number' => 1,
                'square_meters' => 120,
                'latitude' => 36.2704,
                'longitude' => -121.8074,
                'address' => '14 Rustic Trails Lane, Big Sur',
                'visible' => true
            ],
            [
                'name' => 'Serenity Pines Chalet',
                'description' => 'Indulge in the serenity of Tyrol from this hillside abode. Breathe in the crisp mountain air and bask in the luxurious comfort that seamlessly blends with the surrounding nature',
                'room_number' => 7,
                'bed_number' => 5,
                'bathroom_number' => 3,
                'square_meters' => 130,
                'latitude' => 47.2531,
                'longitude' => 11.6017,
                'address' => '25 Hillside Serenity Lane, Tyrol',
                'visible' => true
            ],
            [
                'name' => 'Evergreen Haven Lodge',
                'description' => 'Admire the canals of Amsterdam from this modern-designed apartment. Dive into Dutch culture and the unique atmosphere of the city of canals',
                'room_number' => 4,
                'bed_number' => 2,
                'bathroom_number' => 1,
                'square_meters' => 100,
                'latitude' => 52.3676,
                'longitude' => 4.9041,
                'address' => '5 Cityscape Place, Amsterdam',
                'visible' => true
            ],
            [
                'name' => 'Ocean Vista Oasis',
                'description' => 'Experience the magic of Catalonia from this sea-view apartment. Uncover the architectural and cultural wonders of Barcelona',
                'room_number' => 10,
                'bed_number' => 5,
                'bathroom_number' => 3,
                'square_meters' => 400,
                'latitude' => 41.3851,
                'longitude' => 2.1734,
                'address' => '8 Harborview Lane, Barcelona',
                'visible' => true
            ],
            [
                'name' => 'Metropolitan Loft Haven',
                'description' => 'Live in style with breathtaking Manhattan skyline. This apartment offers you luxury with a view of NYC from skyscrapers',
                'room_number' => 4,
                'bed_number' => 1,
                'bathroom_number' => 1,
                'square_meters' => 100,
                'latitude' => 40.7128,
                'longitude' => -74.0060,
                'address' => '7 Skyline Terrace, New York City',
                'visible' => true
            ],
            [
                'name' => 'Glassy Urban Retreat',
                'description' => 'Live the dolce vita in Milan from this apartment with views of ancient monuments. Be enchanted by the history and timeless charm of the Fashion Capital',
                'room_number' => 4,
                'bed_number' => 1,
                'bathroom_number' => 1,
                'square_meters' => 90,
                'latitude' => 45.4642,
                'longitude' => 9.1900,
                'address' => '34 Urban Heights Road, Milan',
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
        ],
        'tomtomApi' => [
            'apiUrl' => 'https://api.tomtom.com/search/2/geocode/'
        ]
    ];
?>
