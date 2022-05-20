<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{
    /**
     * First question
     */
    protected $firstName;

    public function askFirstName()
    {
        $this->ask('Hi, what is your name ?',function($answer){
            $firstName = $answer->getText();
            $this->say('Nice to meet you'.$firstName);
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askFirstName();
    }
}
