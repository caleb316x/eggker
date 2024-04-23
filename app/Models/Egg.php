<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Egg extends Model
{
    use HasFactory;

    protected $fillable = [
        'peewee_count',
        'pullet_count',
        'small_count',
        'medium_count',
        'large_count',
        'extra_large_count',
        'jumbo_count',
        'crack_count',
        'sorting_date',
    ];

    public function dateSimple()
    {
        return $this->sorting_date ? Carbon::parse($this->sorting_date)->format('F d, Y') : null;
    }
}
