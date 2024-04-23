<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Egg extends Model
{
    use HasFactory;

    public function dateSimple()
    {
        return $this->sorting_date ? Carbon::parse($this->sorting_date)->format('F d, Y') : null;
    }
}
