<?php
declare(strict_types = 1);

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Message

* @property-read Collection $schedules
 */

class Message extends Model
{
    protected $fillable = ['subject', 'message'];

    /**
     * Get the schedules for the message.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
