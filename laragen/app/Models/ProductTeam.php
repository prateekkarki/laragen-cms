<?php
namespace Laragen\App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductTeam extends Pivot
{
    protected $guarded = ['id'];
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'extra_id'
    ];

    
    public function teams()
    {
        return $this->belongsTo(Extra::class);
    }

}
