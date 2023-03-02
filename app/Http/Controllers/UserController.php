<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateUserRequest;
use DB;
use Hash;
use RoleAndPermissionSeeder;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::select('id', 'email', 'name')->get();

        return view('users.list')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
    
        try {
            DB::beginTransaction();
            // Logic For Save User Data
    
            $create_user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('traslados2023')
            ]);
    
            if(!$create_user){
                DB::rollBack();
    
                return back()->with('error', 'Something went wrong while saving user data');
            }
            $expiresAt = now()->addDay();

            $create_user->sendWelcomeNotification($expiresAt);

            if ($request->admin == 'yes') {
                $create_user->assignRole('Admin');
                $create_user->givePermissionTo([
                    'listar-tramite',
                    'alta-tramite',
                    'auditar-tramite',
                    'eliminar-tramite',
                    'imprimir-tramite',
                    'admin-users'
                ]);
            } else {
                $create_user->assignRole('Editor');
                $create_user->givePermissionTo([
                    'listar-tramite',
                    'imprimir-tramite'
                ]);
            }


            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Stored Successfully.');
    
    
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View 
     */
    public function show(Request $request, $id_user)
    {
        $user = User::find($id_user);
        $rol = preg_replace("/[^a-zA-Z0-9]+/", "", $user->getRoleNames());

        return view('users.update')
        ->with('user', $user)
        ->with('rol', $rol);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = User::find($request->id_user);
            $user->syncRoles([]);
            $user->syncPermissions();
            // Logic For Save User Data

            if ($request->admin == 'yes') {

                $user->assignRole('Admin');

                $user->givePermissionTo([
                    'listar-tramite',
                    'alta-tramite',
                    'auditar-tramite',
                    'eliminar-tramite',
                    'imprimir-tramite',
                    'admin-users'
                ]);
            } else {

                $user->assignRole('Editor');

                $user->givePermissionTo([
                    'listar-tramite',
                    'imprimir-tramite'
                ]);
            }


            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Stored Successfully.');
    
    
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
