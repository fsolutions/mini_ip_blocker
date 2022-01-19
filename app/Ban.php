<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table = "gen_ban";

    protected $fillable = ['ip', 'ban_ignore', 'created_at'];
}
