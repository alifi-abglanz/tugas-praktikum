<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


class category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_id',
        'category_name'
    ];

    public function products()
{
    return $this->hasMany(product::class, 'categori_id','category_id');
}

}



