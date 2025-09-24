<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\UserListDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\User\StoreUserRequest;
use App\Http\Requests\Users\User\UpdateUserRequest;
use App\Models\User\Role as ModelsRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(UserListDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.user.user-list.index');
    }

    public function create()
    {
        $roles = ModelsRole::all();
        return view('pages.admin.user.user-list.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(10);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('user-list.index')->with('success', 'User ' . $user->name . ' created successfully');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.user.user-list.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = ModelsRole::all();
        $userRole = $user->role;

        return view('pages.admin.user.user-list.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, User $user, $id)
    {

        $request->validate([
            'name' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('user-list.index')->with('success', 'User updated successfully');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'success' => 'Data Berhasil Dihapus ' . $id
        ]);
    }
}
