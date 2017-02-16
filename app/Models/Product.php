<?php

namespace App\Models;

use App\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;
    use FilterPaginateOrder;

    protected $fillable = ['category_id', 'name', 'description'];

    protected $filter = [
        'id', 'category_id', 'name', 'description'
    ];

    public static function initialize()
    {
        return [
            'category_id'=>'Select',
            'name' => '',
            'description' => ''
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

}
