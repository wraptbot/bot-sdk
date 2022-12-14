<?php

namespace TelegramBotSdk\Services\Telegram;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Bot
{
    protected string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function setWebhook(array $options)
    {
        return Http::post("https://api.telegram.org/bot$this->token/setWebhook",$options);
    }
    public function deleteWebhook()
    {
        return Http::delete("https://api.telegram.org/bot$this->token/deleteWebhook");
    }
    public function getWebhookInfo()
    {
        return Http::get("https://api.telegram.org/bot$this->token/getWebhookInfo");
    }
    public function setMyCommands(array $options)
    {
        return Http::post("https://api.telegram.org/bot$this->token/setMyCommands",$options);
    }
    public function isCallback(Request $request)
    {
        return $request->has('callback_query');
    }
    public function getChatId(Request $request)
    {
        if ( $this->isCallback($request) )
        {
            return $request->get('callback_query')['message']['chat']['id'];
        }
        if ( $request->has('message') )
        {
            return $request->get('message')['chat']['id'];
        }
    }
    public function sendMessage(array $options)
    {
        $response = Http::post("https://api.telegram.org/bot$this->token/sendMessage", $options);

        Log::debug($response);

        return $response;
    }
    public function editMessageText(array $options)
    {
        $response = Http::post("https://api.telegram.org/bot$this->token/sendMessageText", $options);

        Log::debug($response);

        return $response;
    }
    public function editMessageReplyMarkup(array $options)
    {
        $response = Http::post("https://api.telegram.org/bot$this->token/sendMessageReplyMarkup", $options);

        Log::debug($response);

        return $response;
    }
    public function deleteMessage(string $chat_id, string $message_id)
    {
        $options = array(
            'chat_id' => $chat_id,
            'message_id' => $message_id
        );
        $response = Http::post("https://api.telegram.org/bot$this->token/sendMessageReplyMarkup", $options);

        Log::debug($response);

        return $response;
    }
    public function pinChatMessage(string $chat_id, string $message_id)
    {
        $options = array(
            'chat_id' => $chat_id,
            'message_id' => $message_id
        );
        $response = Http::post("https://api.telegram.org/bot$this->token/pinChatMessage", $options);

        Log::debug($response);

        return $response;
    }
    public function unpinChatMessage(string $chat_id, string $message_id)
    {
        $options = array(
            'chat_id' => $chat_id,
            'message_id' => $message_id
        );
        $response = Http::post("https://api.telegram.org/bot$this->token/unpinChatMessage", $options);

        Log::debug($response);

        return $response;
    }
    public function unpinAllChatMessage(string $chat_id)
    {
        $options = array(
            'chat_id' => $chat_id
        );
        $response = Http::post("https://api.telegram.org/bot$this->token/unpinAllChatMessage", $options);

        Log::debug($response);

        return $response;
    }
    public function isChatJoinRequest(Request $request)
    {
        return $request->has('chat_join_request');
    }
    public function approveChatJoinRequest(string $chat_id, string $user_id)
    {
        $options = array(
            'chat_id' => $chat_id,
            'user_id' => $user_id
        );
        $response = Http::post("https://api.telegram.org/bot$this->token/approveChatJoinRequest", $options);

        Log::debug($response);

        return $response;
    }
    public function declineChatJoinRequest(string $chat_id, string $user_id)
    {
        $options = array(
            'chat_id' => $chat_id,
            'user_id' => $user_id
        );
        $response = Http::post("https://api.telegram.org/bot$this->token/declineChatJoinRequest", $options);

        Log::debug($response);

        return $response;
    }
}
