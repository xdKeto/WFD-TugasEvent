<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'id' => 1,
                'organizer_id' => 1,
                'categories_id' => 3,
                'title' => 'Indonesia Innovation Challenge 2024 Powered by Launch Pad',
                'venue' => 'Jatim Expo', 
                'tanggal' => '2024-10-23',
                'start_time' => '09:30:00',
                'description' => 'Description for Indonesia Innovation Challenge 2024',
                'booking_url' => 'https://example.com/booking/indonesia-innovation',
                'tags' => json_encode([
                    ['value' => 'innovation'], 
                    ['value' => 'Indonesia Innovation Challenge']
                ]),
            ],
            [
                'id' => 2,
                'organizer_id' => 2, 
                'categories_id' => 1, 
                'title' => 'Kids Education Expo 2024',
                'venue' => 'The Westin',
                'tanggal' => '2024-10-23',
                'start_time' => '09:30:00',
                'description' => 'Description for Kids Education Expo 2024',
                'booking_url' => 'https://example.com/booking/kids-education',
                'tags' => json_encode([
                    ['value' => 'education'], 
                    ['value' => 'Kids Education Expo']
                ]),
            ],
            [
                'id' => 3,
                'organizer_id' => 3, 
                'categories_id' => 1, 
                'title' => 'Surabaya Great Expo 2024',
                'venue' => 'Grand City Surabaya',
                'tanggal' => '2024-10-23',
                'start_time' => '09:30:00',
                'description' => 'Description for Surabaya Great Expo 2024',
                'booking_url' => 'https://example.com/booking/surabaya-great-expo',
                'tags' => json_encode([
                    ['value' => 'expo'], 
                    ['value' => 'Surabaya Great Expo']
                ]),
            ],
            [
                'id' => 4,
                'organizer_id' => 4, 
                'categories_id' => 2, 
                'title' => 'SMEX - Surabaya Music, Multimedia, and Lighting Expo 2024',
                'venue' => 'Grand City Surabaya', 
                'tanggal' => '2024-10-23',
                'start_time' => '09:30:00',
                'description' => 'Description for SMEX - Surabaya Music, Multimedia, and Lighting Expo',
                'booking_url' => 'https://example.com/booking/smex',
                'tags' => json_encode([
                    ['value' => 'music'], 
                    ['value' => 'SMEX']
                ]),
            ],
            [
                'id' => 5,
                'organizer_id' => 5, 
                'categories_id' => 1, 
                'title' => 'Japan Edu Expo 2024',
                'venue' => 'Hotel Said',
                'tanggal' => '2024-10-23',
                'start_time' => '09:30:00',
                'description' => 'Description for Japan Edu Expo 2024',
                'booking_url' => 'https://example.com/booking/japan-edu-expo',
                'tags' => json_encode([
                    ['value' => 'japan'], 
                    ['value' => 'Japan Edu Expo']
                ]),
            ],
            [
                'id' => 6,
                'organizer_id' => 6,
                'categories_id' => 1, 
                'title' => 'Surabaya Hospital Expo',
                'venue' => 'Grand City Surabaya',
                'tanggal' => '2024-10-23',
                'start_time' => '09:30:00',
                'description' => 'Description for Surabaya Hospital Expo',
                'booking_url' => 'https://example.com/booking/surabaya-hospital-expo',
                'tags' => json_encode([
                    ['value' => 'hospital'], 
                    ['value' => 'Surabaya Hospital Expo']
                ]),
            ],
            
        ]);      
    }
}