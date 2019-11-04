<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create_categories']);
        Permission::create(['name' => 'view_categories']);
        Permission::create(['name' => 'edit_categories']);
        Permission::create(['name' => 'delete_categories']);
        Permission::create(['name' => 'create_extras']);
        Permission::create(['name' => 'view_extras']);
        Permission::create(['name' => 'edit_extras']);
        Permission::create(['name' => 'delete_extras']);
        Permission::create(['name' => 'create_products']);
        Permission::create(['name' => 'view_products']);
        Permission::create(['name' => 'edit_products']);
        Permission::create(['name' => 'delete_products']);
        Permission::create(['name' => 'create_product_real_fields']);
        Permission::create(['name' => 'view_product_real_fields']);
        Permission::create(['name' => 'edit_product_real_fields']);
        Permission::create(['name' => 'delete_product_real_fields']);
        Permission::create(['name' => 'create_product_extra_sauces']);
        Permission::create(['name' => 'view_product_extra_sauces']);
        Permission::create(['name' => 'edit_product_extra_sauces']);
        Permission::create(['name' => 'delete_product_extra_sauces']);
        Permission::create(['name' => 'edit_categories_title']);
        Permission::create(['name' => 'edit_extras_title']);
        Permission::create(['name' => 'edit_products_title']);
        Permission::create(['name' => 'edit_products_slug']);
        Permission::create(['name' => 'edit_products_teams']);
        Permission::create(['name' => 'edit_products_image']);
        Permission::create(['name' => 'edit_products_real_field']);
        Permission::create(['name' => 'edit_products_category_id']);
        Permission::create(['name' => 'edit_products_short_description']);
        Permission::create(['name' => 'edit_products_extra_sauces']);
        Permission::create(['name' => 'edit_product_real_fields_filename']);
        Permission::create(['name' => 'edit_product_real_fields_size']);
        Permission::create(['name' => 'edit_product_real_fields_product_id']);
        Permission::create(['name' => 'edit_product_extra_sauces_title']);
        Permission::create(['name' => 'view_categories_title']);
        Permission::create(['name' => 'view_extras_title']);
        Permission::create(['name' => 'view_products_title']);
        Permission::create(['name' => 'view_products_slug']);
        Permission::create(['name' => 'view_products_teams']);
        Permission::create(['name' => 'view_products_image']);
        Permission::create(['name' => 'view_products_real_field']);
        Permission::create(['name' => 'view_products_category_id']);
        Permission::create(['name' => 'view_products_short_description']);
        Permission::create(['name' => 'view_products_extra_sauces']);
        Permission::create(['name' => 'view_product_real_fields_filename']);
        Permission::create(['name' => 'view_product_real_fields_size']);
        Permission::create(['name' => 'view_product_real_fields_product_id']);
        Permission::create(['name' => 'view_product_extra_sauces_title']);
        

        // create roles and assign created permissions

        $role = Role::create(['name' => 'demo-admin']);
        $role->givePermissionTo(['view_categories_title', 'view_extras_title', 'view_products_title', 'view_products_slug', 'view_products_teams', 'view_products_image', 'view_products_real_field', 'view_products_category_id', 'view_products_short_description', 'view_products_extra_sauces', 'view_product_real_fields_filename', 'view_product_real_fields_size', 'view_product_real_fields_product_id', 'view_product_extra_sauces_title']);


        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(['edit_categories_title', 'edit_extras_title', 'edit_products_title', 'edit_products_slug', 'edit_products_teams', 'edit_products_image', 'edit_products_real_field', 'edit_products_category_id', 'edit_products_short_description', 'edit_products_extra_sauces', 'edit_product_real_fields_filename', 'edit_product_real_fields_size', 'edit_product_real_fields_product_id', 'edit_product_extra_sauces_title']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        foreach (['demo-admin', 'admin', 'super-admin'] as $role) {
            $email = $role."@example.com";
            $user = User::where('email', '=', $email)->first();
            if ($user === null) {
                $user = new User();
                $user->password = Hash::make($role);
                $user->email = $email;
                $user->email_verified_at = now();
                $user->remember_token = Str::random(10);
                $user->name = Str::title(str_replace('-', ' ', $role));
                $user->save();
            }
            $user->assignRole($role);
        }
    }
}
