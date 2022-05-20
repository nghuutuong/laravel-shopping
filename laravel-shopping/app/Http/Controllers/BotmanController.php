<?php

namespace App\Http\Controllers;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Conversations\ExampleConversation;

class BotmanController extends Controller
{

    // public function botman()
    // {
    //     $botman = app('botman');
  
    //     $botman->hears('{message}', function($botman, $message) {
  
    //         if ($message == 'hi') {
    //             $this->askName($botman);
    //         }else{
    //             $botman->reply("write 'hi' for testing...");
    //         }
  
    //     });
  
    //     $botman->listen();
    // }
  
    /**
     * Place your BotMan logic here.
     */
    // public function askName($botman)
    // {
    //     $botman->ask('Hello! What is your Name?', function(Answer $answer) {
  
    //         $name = $answer->getText();
  
    //         $this->say('Nice to meet you '.$name);
    //     });
    // }
    
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }
    public function tinker()
    {
        return view('tinker');
    }
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
}
