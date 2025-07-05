<?php

namespace Database\Seeders;
use App\Models\User;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $user = User::factory()->create([
          'name'=> 'nakul pandey',
          'email' => 'priyanshupandey5599@gmail.com '
        
        ]);

        Listing::factory(6)->create([
        'user_id' => $user->id]);












            // Listing::create([
            //     'title' => 'laravel senior devloper',
            //     'tags' => 'laravrl, javascript',
            //     'company' => 'Acme Crop',
            //     'location' => 'boston, MA ',
            //     'email' => 'email@email.com',
            //     'website' => 'https:/www.acme.com',
            //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.' 
            // ]);

            //     Listing::create([
            //     'title' => 'software senior devloper',
            //     'tags' => 'react, javascript',
            //     'company' => 'Ask Crop',
            //     'location' => 'Miyami, NA ',
            //     'email' => 'email2@email.com',
            //     'website' => 'https:/www.ask.com',
            //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.' 
            //     ]);

    }
}
