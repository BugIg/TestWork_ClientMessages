<?php
declare(strict_types = 1);

namespace App\Mail;

use App\Customer;
use App\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerMessages extends Mailable
{
    use Queueable, SerializesModels;

    protected Customer $customer;

    protected Message $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, Message $message)
    {
        $this->customer = $customer;
        $this->message  = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.customer_messages')
            ->subject($this->message->title)
            ->from('default@company.com', 'Default Company')
            ->with(
                [
                    'customer' => $this->customer,
                    'message'  => $this->message,
                ]
            );
    }
}
