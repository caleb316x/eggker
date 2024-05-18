<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\MessageSent;
use function Laravel\Prompts\text;

class Send extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send message sample';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $message = text(label: "Enter Message",required: true);
        MessageSent::dispatch($message);
    }
}
