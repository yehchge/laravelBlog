<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Member::factory()->create([
            'login' => 'demo',
            'password' => MD5('demo'),
            'role' => 'owner',
            'login_session' => ''
        ]);

        Member::factory()
    	    ->count(10)
    	    ->create();
    }
}
