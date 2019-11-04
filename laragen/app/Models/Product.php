<?php
namespace Laragen\App\Models;

use App\Models\Extra;
use App\Models\ProductRealField;
use App\Models\Category;
use App\Models\ProductExtraSauce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'image', 'category_id', 'short_description'
    ];

    
    public function teams()
    {
        return $this->belongsToMany(Extra::class, 'product_team', 'product_id', 'team_id');
    }

    public function real_field()
    {
        return $this->hasMany(ProductRealField::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function extra_sauces()
    {
        return $this->hasMany(ProductExtraSauce::class);
    }

}
