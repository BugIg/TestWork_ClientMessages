<?php
declare(strict_types = 1);

namespace App\Services;

use App\Customer;
use App\Jobs\SendMessageJob;
use App\Mail\CustomerMessages;
use App\Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class SendMessagesService
{
    /**
     * @param string $time
     * @return void
     */

    public static function send(string $time): void
    {
        $messages = Message::whereHas(
            'schedules',
            static function (Builder $query) use ($time) {
                $query->where('time', '=', $time);
            }
        )->get();

        if ($messages->isNotEmpty()) {
            $messages->each(
                static function ($message) {
                    Customer::chunk(
                        1000,
                        static function ($customers) use ($message) {
                            foreach ($customers as $customer) {
                                $diffOffsetInMinutes = self::calculationTimeDifference($customer->timezone);

                                SendMessageJob::dispatch($customer->email, new CustomerMessages($customer, $message))
                                    ->delay(now()->addMinutes($diffOffsetInMinutes));
                            }
                        }
                    );
                }
            );
        }
    }

    /**
     * @param string $customerTimezone
     * @return int
     */
    public static function calculationTimeDifference(string $customerTimezone): int
    {
        $serverTime    = Carbon::now();
        $customerTime  = Carbon::now($customerTimezone)->format('Y-m-d H:i');
        $customerDate  = Carbon::createFromFormat('Y-m-d H:i', $customerTime);
        $diff          = $serverTime->diff($customerDate);
        $diffInMinutes = $serverTime->diffInMinutes($customerDate);

        return $diff->invert ? $diffInMinutes : 1440 - $diffInMinutes;
    }
}
