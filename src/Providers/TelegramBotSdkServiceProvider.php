<?php

//namespace Wraptbot\TelegramBotSdk\Providers;
namespace TelegramBotSdk\Providers;

use Illuminate\Support\ServiceProvider;
use TelegramBotSdk\Services\Telegram\Bot;

class TelegramBotSdkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Bot::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
