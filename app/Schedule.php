<?php
declare(strict_types = 1);

namespace App;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo};

class Schedule extends Model
{
    protected $fillable = ['time'];

    /**
     * Get the message that the schedule.
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }

}
