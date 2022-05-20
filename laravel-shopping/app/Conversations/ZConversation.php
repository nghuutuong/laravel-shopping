<?php

namespace App\Http\Conversations;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ZConversation extends Conversation
{
    protected $firstname;

    protected $email;

    public function askFirstname()
    {
        $this->ask('Hello! What is your firstname?', function(Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();

            $this->say('Nice to meet you '.$this->firstname);
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('One more thing - what is your email?', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();

            $this->say('Great - that is all we need, '.$this->firstname);
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }

    // public function askForDatabase()
    // {
    // $question = Question::create('Do you need a database?')
    //     ->fallback('Unable to create a new database')
    //     ->callbackId('create_database')
    //     ->addButtons([
    //         Button::create('Of course')->value('yes'),
    //         Button::create('Hell no!')->value('no'),
    //     ]);

    // $this->ask($question, function (Answer $answer) {
    //     // Detect if button was clicked:
    //     if ($answer->isInteractiveMessageReply()) {
    //         $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
    //         $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
    //     }
    // });
    // }
}
