<?php

namespace App\AI;

use OpenAI\Laravel\Facades\OpenAI;

class Chat
{
    private array $messages = [];

    public function __construct(string $systemMessage = 'A general purpose assistant')
    {
        $this->setMessage(
            role: 'system',
            message: $systemMessage
        );
    }

    protected function setMessage(string $role, string $message): void
    {
        $this->messages[] = [
            'role' => $role,
            'content' => $message,
        ];
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function send(string $message, bool $speech = false): ?string
    {
        $this->setMessage(
            role: 'user',
            message: $message
        );

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $this->getMessages(),
        ])->choices[0]->message->content;

        if ($response) {
            $this->setMessage(
                role: 'assistant',
                message: $response
            );
        }

        return $speech ? $this->speech($response) : $response;
    }

    public function speech(string $message)
    {
        echo $message;

        return OpenAI::audio()->speech([
            'model' => 'tts-1',
            'input' => $message,
            'voice' => 'alloy',
            'response_format' => 'mp3',
            'speed' => 1,
        ]);
    }

    public function reply(string $message): ?string
    {
        return $this->send($message);
    }
}
