<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Messages extends Model
{
    protected $fillable=['messages','users_id'];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
