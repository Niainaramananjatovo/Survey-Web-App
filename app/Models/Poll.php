<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poll extends Model
{
    use HasFactory;
    protected $table ='poll';
    protected $guarded = [];
    public $timestamps = true;

    public function questions():HasMany {
        return $this->HasMany(Question::class, 'poll_id');
    }
}
