<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('Halo, namaku {name}', function($bot,$name){
    $bot->reply('Hi '.$name.', aku bot ini');
});

$botman->hears('/bacadatabarang', BotManController::class.'@bacadatabarang');
$botman->hears('/tambahbarang', BotManController::class.'@tambahbarang');
$botman->hears('/ceklaporanstok', BotManController::class.'@ceklaporanstok');
$botman->hears('/cetaklaporan', BotManController::class.'@cetaklaporan');
$botman->hears('/catattransaksi', BotManController::class.'@catattransaksi');

$botman->fallback(function($bot){
    $bot->reply('Maaf, perintah tidak ada, coba masukkan perintah lain');
});