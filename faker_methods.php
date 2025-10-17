<?php

// Common Faker Methods Reference

// Text
$this->faker->word();                    // 'aut'
$this->faker->sentence();                // 'Sit vitae voluptas sint non voluptates.'
$this->faker->paragraph();               // Long paragraph
$this->faker->text(200);                 // Text with max 200 chars

// Names
$this->faker->name();                    // 'Dr. Zane Stroman'
$this->faker->firstName();               // 'Maynard'
$this->faker->lastName();                // 'Zulauf'

// Internet
$this->faker->email();                   // 'tkshlerin@collins.com'
$this->faker->safeEmail();               // 'king.alford@example.org'
$this->faker->url();                     // 'http://www.skilesdonnelly.biz/aut-accusantium'

// Numbers
$this->faker->randomNumber();            // 79907610
$this->faker->numberBetween(1, 100);     // 42
$this->faker->randomFloat(2, 0, 1000);   // 48.90

// Dates
$this->faker->date();                    // '1979-06-09'
$this->faker->dateTime();                // DateTime object
$this->faker->dateTimeBetween('-1 year', 'now');

// Boolean
$this->faker->boolean();                 // true/false
$this->faker->boolean(70);               // 70% chance of true

// Address
$this->faker->address();                 // '8888 Cummings Vista Apt. 101, Susanbury, NY 95473'
$this->faker->city();                    // 'West Judge'
$this->faker->country();                 // 'Falkland Islands (Malvinas)'

// Phone
$this->faker->phoneNumber();             // '201-886-0269 x3767'

// Company
$this->faker->company();                 // 'Bogan-Treutel'
$this->faker->jobTitle();                // 'Cashier'

// Lorem Ipsum
$this->faker->words(3, true);            // 'cum voluptate sit'
$this->faker->sentences(3, true);        // 'Sit vitae voluptas...'