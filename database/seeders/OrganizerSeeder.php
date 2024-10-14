<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organizer')->insert([
            [
                'id' => 1,
                'name' => 'Southern Sydney University',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac velit vehicula, semper leo vitae, ultricies nulla.',
                'fb_link' => 'https://facebook.com/southernsydneyuni',
                'twt_link' => 'https://x.com/southernsydneyuni',
                'web_link' => 'https://southernsydneyuni.com',
            ],
            [
                'id' => 2,
                'name' => 'PT OSI',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper sapien ut magna dictum, nec posuere justo euismod.',
                'fb_link' => 'https://facebook.com/ptosi',
                'twt_link' => 'https://x.com/ptosi',
                'web' => 'https://ptosi.com',
            ],
            [
                'id' => 3,
                'name' => 'OBKG',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean facilisis diam nec nisi malesuada varius.',
                'fb_link' => 'https://facebook.com/obkg',
                'twt_link' => 'https://x.com/obkg',
                'web' => 'https://obkg.com',
            ],
            [
                'id' => 4,
                'name' => 'MSW Global',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget erat id turpis scelerisque viverra.',
                'fb_link' => 'https://facebook.com/mswglobal',
                'twt_link' => 'https://x.com/mswglobal',
                'web' => 'https://mswglobal.com',
            ],
            [
                'id' => 5,
                'name' => 'HWG',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. In hac habitasse platea dictumst.',
                'fb_link' => 'https://facebook.com/hwg',
                'twt_link' => 'https://x.com/hwg',
                'web' => 'https://hwg.com',
            ],
            [
                'id' => 6,
                'name' => 'Debindo',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id odio ut lectus vehicula cursus a vel magna.',
                'fb_link' => 'https://facebook.com/debindo',
                'twt_link' => 'https://x.com/debindo',
                'web' => 'https://debindo.com',
            ]
            
        ]);
        
        
    }
}