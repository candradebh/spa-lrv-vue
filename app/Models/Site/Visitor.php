<?php

namespace App\Models\Site;

use App\Models\Site\Chat\SiteChat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Message;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Visitor extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name','email', 'phone'];



    public function messages ()
    {
        return $this->hasMany(Message::class,'visitor_id','id');
    }

}
