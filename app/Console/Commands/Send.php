<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\MessageSent;
use function Laravel\Prompts\text;
use function Laravel\Prompts\select;
use App\Http\Controllers\MessageController;

class Send extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:size';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simulate sending size from arduino';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $message = select(
            label: 'Select size',
            options: [
                'peewee', 
                'pullet', 
                'small',
                'meduim',
                'large',
                'extra_large',
                'jumbo'
            ],
        );

        MessageController::addEgg($message);
        MessageSent::dispatch($message);
    }
}
