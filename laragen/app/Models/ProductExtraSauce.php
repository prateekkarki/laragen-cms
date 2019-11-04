<?php
namespace Laragen\App\Models;


use Illuminate\Database\Eloquent\Model;

class ProductExtraSauce extends Model
{
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    
}
