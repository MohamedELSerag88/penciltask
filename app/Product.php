<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'hashid',
        'name',
        'code',
        'price',
        'image',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'  => 'string',
        'code'  => 'string',
        'price' => 'string',
        'image' => 'string',
        'description' => 'text'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function setImageAttribute($file){
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('uploads/' , $fileName );
        $this->attributes['image'] = '/uploads//' . $fileName;
    }


}
