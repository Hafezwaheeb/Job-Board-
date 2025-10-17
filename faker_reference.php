<?php

// FAKER METHODS REFERENCE FOR FACTORIES

// ============================================
// TEXT GENERATION
// ============================================
$this->faker->word();                    // 'aut'
$this->faker->words(3, true);            // 'cum voluptate sit'
$this->faker->sentence();                // 'Sit vitae voluptas sint non voluptates.'
$this->faker->sentences(3, true);        // Multiple sentences as string
$this->faker->paragraph();               // Full paragraph
$this->faker->paragraphs(3, true);       // 3 paragraphs as string
$this->faker->text(200);                 // Text with max 200 characters

// ============================================
// PERSONAL DATA
// ============================================
$this->faker->name();                    // 'Dr. Zane Stroman'
$this->faker->firstName();               // 'Maynard'
$this->faker->lastName();                // 'Zulauf'
$this->faker->title();                   // 'Ms.' or 'Mr.'

// ============================================
// INTERNET & EMAIL
// ============================================
$this->faker->email();                   // 'tkshlerin@collins.com'
$this->faker->safeEmail();               // 'king.alford@example.org'
$this->faker->freeEmail();               // 'jdoe@gmail.com'
$this->faker->companyEmail();            // 'john@company.com'
$this->faker->url();                     // 'http://www.example.com'
$this->faker->slug();                    // 'aut-repudiandae-sit'

// ============================================
// NUMBERS
// ============================================
$this->faker->randomNumber();            // 79907610
$this->faker->numberBetween(1, 100);     // 42
$this->faker->randomFloat(2, 0, 1000);   // 48.90
$this->faker->randomDigit();             // 7
$this->faker->randomDigitNotNull();      // 5

// ============================================
// DATES & TIME
// ============================================
$this->faker->date();                    // '1979-06-09'
$this->faker->time();                    // '20:49:42'
$this->faker->dateTime();                // DateTime object
$this->faker->dateTimeBetween('-1 year', 'now');
$this->faker->dateTimeThisMonth();
$this->faker->dateTimeThisYear();

// ============================================
// BOOLEAN & CHOICES
// ============================================
$this->faker->boolean();                 // true or false (50/50)
$this->faker->boolean(70);               // 70% chance of true
$this->faker->randomElement(['a', 'b', 'c']); // Random from array
$this->faker->randomElements(['a', 'b', 'c'], 2); // 2 random elements

// ============================================
// ADDRESSES
// ============================================
$this->faker->address();                 // Full address
$this->faker->city();                    // 'West Judge'
$this->faker->country();                 // 'United States'
$this->faker->postcode();                // '17916'
$this->faker->streetAddress();           // '439 Karley Loaf Suite 897'

// ============================================
// PHONE & COMPANY
// ============================================
$this->faker->phoneNumber();             // '201-886-0269 x3767'
$this->faker->company();                 // 'Bogan-Treutel'
$this->faker->jobTitle();                // 'Cashier'

// ============================================
// USEFUL FOR BLOG/POST CONTENT
// ============================================
$this->faker->catchPhrase();             // 'Monitored regional contingency'
$this->faker->bs();                      // 'harness real-time e-markets'
$this->faker->realText(200);             // Real-looking text
$this->faker->uuid();                    // UUID string

// ============================================
// IMAGES (URLs)
// ============================================
$this->faker->imageUrl(640, 480);        // 'https://via.placeholder.com/640x480'
$this->faker->imageUrl(640, 480, 'cats'); // Image with category