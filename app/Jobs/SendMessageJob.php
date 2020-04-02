<?php

namespace App\Jobs;

use App\Mail\CustomerMessages;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string           $email;

    protected CustomerMessages $customerMessage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $email, CustomerMessages $customerMessage)
    {
        $this->email           = $email;
        $this->customerMessage = $customerMessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Mail::to($this->email)->send($this->customerMessage);
    }
}
