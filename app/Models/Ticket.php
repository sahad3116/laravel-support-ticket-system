<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $fillable = [
        'name', 'email', 'subject', 'message', 'type', 'status','note'
    ];
}
