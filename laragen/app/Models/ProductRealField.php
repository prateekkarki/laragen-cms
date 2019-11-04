<?php
namespace Laragen\App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductRealField extends Model
{
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'size', 'product_id'
    ];

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
