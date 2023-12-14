<?php

namespace App\Console\Commands;

use App\AI\Chat;
use Illuminate\Console\Command;

use function Laravel\Prompts\info;
use function Laravel\Prompts\spin;
use function Laravel\Prompts\text;

class ChatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start a chat with OpenAI';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $chat = new Chat();
        while ($question =
            text(
                label: 'Twin-gpt',
                placeholder: 'Ask me something...',
                required: true,
                validate: fn (string $value) => match (true) {
                    strlen($value) < 3 => 'The string must be at least 3 characters.',
                    default => null
                }
            )
        ) {
            $response = spin(fn () => $chat->send($question), 'sending request ...');
            info($response);
        }

    }
}
