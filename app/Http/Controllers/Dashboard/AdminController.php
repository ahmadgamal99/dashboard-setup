<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Team;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{


    public function index(Request $request)
    {
        $this->authorize('view_admins');

        if ($request->ajax())
        {
            $data = getModelData( model: new Admin(), andsFilters: [['email', '!=', 'support@example.com']] );

            return response()->json($data);
        }

        return view('dashboard.admins.index');
    }

    public function create()
    {

        $this->authorize('create_admins');
        $roles = Role::select('id','name_' . getLocale() )->get();

        return view('dashboard.admins.create',compact('roles'));
    }


    public function show(Admin $admin)
    {

        $this->authorize('show_admins');
        $roles = Role::select('id','name_' . getLocale() )->get();

        return view('dashboard.admins.show',compact('admin','roles'));
    }

    public function edit(Admin $admin)
    {
        $this->authorize('update_admins');

        $roles = Role::select('id','name_' . getLocale() )->get();

        return view('dashboard.admins.edit',compact('admin','roles'));
    }

    public function store(StoreAdminRequest $request)
    {
        $data  = $request->validated();
        $admin = Admin::create($data);

        $rolesAndDefaultOne = array_merge( $request['roles'] , [ "2" ] );

        $admin->roles()->attach( $rolesAndDefaultOne );
        $admin->teams()->attach( $request['teams'] ?? [] );

    }

    public function update(UpdateAdminRequest $request , Admin $admin)
    {
        $data = $request->validated();

        $admin->update($data);

        $rolesAndDefaultOne = array_merge( $request['roles'] , [ "2" ] );

        $admin->roles()->sync( $rolesAndDefaultOne );
    }


    public function destroy(Request $request, Admin $admin)
    {
        $this->authorize('delete_admins');

        if($request->ajax())
        {
            $admin->delete();
        }
    }

    public function updateProfile(Request $request){

        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => ['required','numeric','unique:admins,id,' . auth()->id()],
            'email'    => ['required','string','email','unique:admins,id,' . auth()->id() ],
            'image'    => ['nullable','mimes:jpeg,jpg,png,gif,svg' , 'max:10000'] ,
        ]);

        if ( $request->hasFile('image') )
        {
            deleteImage(auth()->user()->image, 'Admins');
            $data['image'] = uploadFile( $request->file('image') , 'Admins' );
        }

        auth()->user()->update($data);

    }
    public function updatePassword(Request $request){

        $data = $request->validate([
            'password'              => ['required','string','min:6','max:255','confirmed'],
            'password_confirmation' => ['required','same:password'],
        ]);

        auth()->user()->update($data);

    }

}
