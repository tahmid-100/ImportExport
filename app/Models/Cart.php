<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [   
        'id',  
         'category_name',
    'product_name',
    'serial',
    'model',
    'price',
    'image',
    'unit',
    'user_id'                        
 
       
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}
