<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
        	'from_id' => 1,
        	'to_id' => 2,
        	'content' => 'Hola cómo estás?'
        ]);

        Message::create([
        	'from_id' => 2,
        	'to_id' => 1,
        	'content' => 'Bien, gracias..! Y tú?'
        ]);


        Message::create([
            'from_id' => 1,
            'to_id' => 3,
            'content' => 'Hola cómo estás, usuario 3?'
        ]);

        Message::create([
            'from_id' => 3,
            'to_id' => 1,
            'content' => 'Bien, gracias..! Y tú, usuario 1?'
        ]);
    }
}
