<?php

use Illuminate\Database\Seeder;

use App\Permission;

use App\User;

use App\Models\Backend\Module;

use App\Models\Backend\Category;

use App\Models\Backend\Post;

use App\Models\Backend\PostImage;

use App\Role;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        factory(User::class, 1)->create();

        factory(Module::class, 10)->create()->each(function ($module) {
            for ($i = 0; $i < rand(3, 8); $i++) {
                $module->permissions()->save(factory(Permission::class)->make());
            }
        });
//        factory(Permission::class, 20)->create();

        factory(Role::class, 5)->create()->each(function ($role) {

            $permissions = Permission::orderBy(DB::raw('RAND()'))->take(rand(5, Permission::all()->count()))->get();

            $role->syncPermissions($permissions);
        });

        factory(User::class, 5)->create()->each(function ($user) {
            $role = Role::all();
            $user->syncRoles($role->shuffle()->take(1));
        });


        factory(Category::class, 15)->create();

        factory(Post::class, 50)->create()->each(function ($post) {
            for ($i = 0; $i < rand(5, 10); $i++) {
                $post->postImages()->save(factory(PostImage::class)->make());
            }

            for ($i = 0; $i < rand(1, 3); $i++) {
                $post->categories()->attach(Category::all()->random());
            }
        });

    }
}
