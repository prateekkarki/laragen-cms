<?php

use App\User;
use App\Models\Category;
use App\Models\Extra;
use App\Models\Product;
use App\Models\ProductTeam;
use App\Models\ProductRealField;
use App\Models\ProductExtraSauce;
use Illuminate\Database\Seeder;

class LaragenSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        factory(User::class, 25)->create();
        factory(Category::class, 25)->create();
        factory(Extra::class, 25)->create();
        factory(Product::class, 25)->create();
        factory(ProductTeam::class, 50)->create();
        factory(ProductRealField::class, 25)->create();
        factory(ProductExtraSauce::class, 25)->create();
        // End factories
		$this->call(RolesAndPermissionsSeeder::class);
    }
}
