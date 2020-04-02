<?php
declare(strict_types = 1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Customer extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'timezone'];

    public function getTimezoneOffset(): string
    {
        return Carbon::now()->setTimezone($this->timezone)->format('P');
    }
}
