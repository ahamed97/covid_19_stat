<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HelpGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'user_id',
        'link'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
