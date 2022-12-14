<?php

namespace TelegramBotSdk\Facades;

use Illuminate\Support\Facades\Facade;
use TelegramBotSdk\Services\Telegram\Bot;

class TelegramBotSdkFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Bot::class;
    }
}