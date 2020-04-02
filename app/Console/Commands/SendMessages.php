<?php
declare(strict_types = 1);

namespace App\Console\Commands;

use App\Services\SendMessagesService;
use Illuminate\Console\Command;

class SendMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:send {time}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending emails to clients at a specified time according to the client\'s time zone';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        SendMessagesService::send($this->argument('time'));
    }

}
