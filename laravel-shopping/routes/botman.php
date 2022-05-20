<?php
use App\Http\Controllers\BotmanController;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Cache\LaravelCache;
use App\Http\Conversations\ZConversation;

$config = [
    // Your driver-specific configuration
    // "telegram" => [
    //    "token" => "TOKEN"
    // ]
];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

// Create an instance
$botman = BotManFactory::create($config, new LaravelCache());
$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('gọi tôi là {name}', function ($bot, $name) {
    $bot->reply('Vâng, chào bạn: '.$name);
});
$botman->hears('gọi tôi {name} là người {adjective}', function ($bot, $name, $adjective) {
    $bot->reply('Xin chào '.$name.'. Bạn thật sự '.$adjective);
});
$botman->hears('tôi muốn ([0-9]+)', function ($bot, $number) {
    $bot->reply('Số của bạn là số: '.$number);
});
$botman->hears('I want ([0-9]+) portions of (Cheese|Cake)', function ($bot, $amount, $dish) {
    $bot->reply('You will get '.$amount.' portions of '.$dish.' served shortly.');
});
$botman->fallback(function($bot) {
    $bot->reply('Xin lỗi tôi không hiểu bạn đang nói gì !');
});
$botman->hears('gọi tôi {name}',function($bot, $name){
    $bot->userStorage()->save([
        'name' => $name
    ]);   
    $bot->reply('Chào '.$name);
});
$botman->hears('tên tôi là ?',function($bot){
    $name = $bot->userStorage()->get('name'); 
    $bot->reply('Tên bạn là ' .$name);
});
$botman->hears('information',function($bot){
    $user = $bot->getUser();
    $bot->reply('ID: '.$user->getId());
    $bot->reply('Firstname: '.$user->getFirstName());
    $bot->reply('Lastname: '.$user->getLastName());
    $bot->reply('Username: '.$user->getUserName());
    $bot->reply('Info: '.print_r($user->getInfo(), true));
});
$botman->hears('Start conversation', BotmanController::class.'startConversation');
$botman->hears('a',function($bot){
    $bot->startConversation(new ZConversation);
});