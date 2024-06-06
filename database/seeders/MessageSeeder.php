<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $nbMessages = (int) $this->command->ask("How many of messages you want to generate ?", 10);

        Message::factory($nbMessages)->create();
    }
}
