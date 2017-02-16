<?php

namespace App\Models;

use App\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;
    use FilterPaginateOrder;

    protected $fillable = [ 'name'];

    protected $filter = [
        'id', 'name', 'created_at'
    ];

    public static function initialize()
    {
        return [
            'name' => ''
        ];
    }

    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
}
