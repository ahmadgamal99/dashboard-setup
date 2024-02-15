<?php

namespace Database\Seeders;


use App\Models\Ability;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories  = Role::$modules;

        $actions =
        [
            'view',
            'show',
            'create',
            'update',
            'delete',
        ];


        // indices of unused actions from the above array
        $exceptions = [
            'settings'            => [ 'unused_actions' => [ 1,2,4 ]       , 'extra_actions' => [] ], // 1,2,4 are the indices of unused action from $actions array
            'recycle_bin'         => [ 'unused_actions' => [ 1,2,3 ]       , 'extra_actions' => ['restore'] ],
        ];


        foreach ($categories as $category)
        {
            $usedActions = array_merge( $actions , $exceptions[ $category]['extra_actions'] ?? [] );

            foreach ( $exceptions[$category]['unused_actions'] ?? [] as $index ) // remove the unused actions
                unset( $usedActions[$index]);


            foreach ( array_values($usedActions) as $action)
            {
                Ability::create([
                    'name'     => $action . '_' . str_replace(' ','_',$category),
                    'category' => $category,
                    'action'   => $action,
                ]);
            }
        }


        $superAdminRole = Role::create([
            'name_ar' => 'مدير تنفيذي',
            'name_en' => 'super admin',
        ]);


        $adminRole  = Role::create([
            'name_ar'    => 'صلاحيات إفتراضية',
            'name_en'    => 'default roles',
        ]);

        Role::create([
            'name_ar'    => 'العمليات',
            'name_en'    => 'Operation',
        ]);

        Role::create([
            'name_ar'    => 'السلامة',
            'name_en'    => 'Safety',
        ]);

        Role::create([
            'name_ar'    => 'Fleet',
            'name_en'    => 'Fleet',
        ]);

        Role::create([
            'name_ar'    => 'المالية',
            'name_en'    => 'Finance',
        ]);


        $superAdminAbilitiesIds = Ability::pluck('id');
        $adminAbilitiesIds   = Ability::whereIn('category',[ 'admins' , 'roles' , 'settings' ] )->whereIn('action' , ['view'])->get();

        $superAdminRole->abilities()->attach( $superAdminAbilitiesIds );
        $adminRole->abilities()->attach( $adminAbilitiesIds );

        Admin::first()->assignRole($superAdminRole);
        Admin::first()->assignRole($adminRole);


    }
}
