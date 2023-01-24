<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->fallback(function($bot){
            $bot->reply("Sorry, I don't understand what you saying. I am currently under development. If you have any questions please contact tarekreza15@gmail.com");
        });

        $botman->hears("yes|y|ya|yaa",function($bot){
            $bot->reply("Firstly you must register and then find an upload option for uploading images.");
        });
        $botman->hears("no|n|noo",function($bot){
            $bot->reply("Okay, I'm here if you need any help.");
        });

        // $botman->hears('{message}', function($botman,$message){
        //     if ($message=="hi") {
        //         $this->askName($botman);
        //     }
        //     else{
        //         $botman->reply("write 'hi' for testing");
        //     }
        // });
        $botman->listen();
    }
    // public function askName($botman)
    // {
    //     $botman->ask("hello! what is your name?",function(Answer $answer){
    //         $name = $answer->getText();

    //         $this->say('Nice to meet you '. $name);
    //     });
    // }
}
