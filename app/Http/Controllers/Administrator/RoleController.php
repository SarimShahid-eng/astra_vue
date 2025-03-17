<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(Gate::allows('view', 'User'), 403, view('admin.errors.permission'));
        $roles = Role::orderBy("name", "asc")->get();
        return view("admin.role.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('insert', 'User'), 403, view('admin.errors.permission'));

        return view("admin.role.role");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->role_id != null) {
            $role = Role::find($request->role_id);
            $role->update($data);
            $msg = 'Role Updated';
        } else {
            $role = Role::create($data);
            $this->add_permission($role->id);
            $msg = 'Role Inserted';
        }
        return response()->json([
            'success' => $msg,
            'redirect' => route('role.index')
        ]);
    }
    function add_permission($id)
    {
        abort_unless(Gate::allows('insert', 'User'), 403, view('admin.errors.permission'));

        $tab_names = [0 => 'User', 1 => 'Customer', 2 => 'Product', 3 => 'Cash Register', 4 => 'Purchase Book', 5 => 'Sale Book',6 =>'Account Payable Receivable', 7 => 'Voucher ', 8 => 'Reports'];
        foreach ($tab_names as $tab_name) {
            $permission = Permission::create([
                'menu_name' => $tab_name,
                'role_id' => $id
            ]);
        }
    }
    public function edit($id)
    {
        abort_unless(Gate::allows('update', 'User'), 403, view('admin.errors.permission'));

        $role = Role::find($id);
        return view("admin.role.role", compact("role"));

    }
    function permission($id)
    {
        $permissions = Permission::where("role_id", $id)->get();
        return view("admin.role.permission", compact("permissions"));
    }
    function permission_change(Request $request)
    {
        Permission::where('id', $request->p_id)->update([
            $request->column => $request->status
        ]);
        return response()->json([
            'success' => 'Permission Changed'
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $role = Role::find($id);
        $user = User::where('role', $id)->first();
        if ($user) {
            $msg = "Fisrt Remove Role From User";
            return response()->json([
                'info' => $msg,
            ]);
        } else {
            Permission::where("role_id", $id)->delete();
            $role->delete();
            $msg = "Role Deleted";
        }
        return response()->json([
            'success' => $msg,
            'redirect' => route('role.index')
        ]);
        // $role->delete();

    }
}
