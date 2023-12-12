<?php

namespace App\AI;

use Illuminate\Support\Facades\Http;

class Chat
{
    private array $messages = [];

    public function __construct(string $systemMessage = "A general purpose assistant")
    {
        $this->setMessage(
            role: "system",
            message: $systemMessage
        );
    }

    protected function setMessage(string $role, string $message): void
    {
        $this->messages[] = [
            "role" => $role,
            "content" => $message
        ];
    }


    public function getMessages(): array
    {
        return $this->messages;
    }

    public function send(string $message): ?string
    {
        $this->setMessage(
            role: "user",
            message: $message
        );

        $response = Http::withToken(config('services.openai.secret'))
            ->post(config('services.openai.url'),
                [
                    "model" => "gpt-3.5-turbo",
                    "messages" => $this->getMessages()
                ])->json('choices.0.message.content');

        if ($response) {
            $this->setMessage(
                role: "assistant",
                message: $response
            );
        }

        return $response;
    }

    public function reply(string $message): ?string
    {
        return $this->send($message);
    }


}
