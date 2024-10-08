<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;
    protected $table = 'question';
    protected $guarded = [];
    public $timestamps = true; 

    public function poll():BelongsTo {
        return $this->belongsTo(Poll::class);
    } 
}
