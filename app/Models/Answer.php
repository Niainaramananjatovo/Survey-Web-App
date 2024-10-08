<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory; 
    protected $table = 'answer';
    public $timestamps = true; 
    protected $guarded = []; 

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
