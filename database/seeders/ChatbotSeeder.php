<?php

namespace Database\Seeders;

use App\Models\Chatbot;
use Illuminate\Database\Seeder;

class ChatbotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chatbots = [
            [
                'pertanyaan' => 'EHR Helpdesk'
            ],
            [
                'pertanyaan' => 'Keluhan'
            ],
            [
                'pertanyaan' => 'Website'
            ]
        ];

        Chatbot::insert($chatbots);
    }
}
