<?php

namespace App\Models\Site\Chat;

use App\Models\Site\Visitor;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SiteMessage extends Model
{
    protected $fillable = ['visitor_id','user_id','message'];
    protected $table = "site_messages";

    public function visitor ()
    {
        return $this->belongsTo(Visitor::class,'visitor_id');
    }
    public function user ()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
