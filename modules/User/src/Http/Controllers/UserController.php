<?php

namespace Modules\User\src\Http\Controllers;

use Modules\User\src\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Http\Requests\UserRequest;
use Modules\User\src\Repositories\UserRepository;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->find(3);
        $pageTitle = "User List";
        return view('user::lists', compact('pageTitle'));
    }

    public function detail($id)
    {
        return view('user::detail', compact('id'));
    }

    public function create()
    {
        return view('user::add');
    }

    public function store(UserRequest $request)
    {
        $newUser = [
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => Hash::make($request->password),
        ];
        $this->userRepo->create($newUser);
        return redirect()->route('admin.users.index')->with('message', trans('user::message.create_user_success'));
    }
    public function data()
    {
        $users = $this->userRepo->getAllUsers();
        // $usersFormat = [];
        // foreach ($users as $user) {
        //     $user['edit'] = "<a href='#' class='btn btn-warning'>Edit</a>";
        //     $user['delete'] = "<a href='#' class='btn btn-danger'>Delete</a>";
        //     array_push($usersFormat, $user);
        // }
        // $dataReturn = [
        //     'draw' => 1,
        //     'recordsTotal' => count($usersFormat),
        //     'recordsFiltered' => count($usersFormat),
        //     'data' => $usersFormat
        // ];
        // return response()->json($dataReturn);
        return DataTables::of($users)
            ->editColumn('created_at', function ($user) {
                return Carbon::parse($user->created_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('edit', function ($user) {
                return "<a href='" . route('admin.users.edit', ['id' => $user->id]) . "' class='btn btn-warning'>Edit</a>";
            })
            ->addColumn('delete', function ($user) {
                return  "<a href='" . route('admin.users.edit', ['id' => $user->id]) . "' class='btn btn-danger'>Delete</a>";
            })
            ->rawColumns(['delete', 'edit'])
            ->toJson();
    }

    public function edit($id)
    {
        $user = $this->userRepo->find($id);
        if ($user) {
            return view('user::edit', compact('user'));
        }
        abort(404);
    }
    public function postEdit(UserRequest $request, $id)
    {
        $dataUpdate = $request->except('_token');
        if ($dataUpdate['password']) {
            $dataUpdate['password'] = Hash::make($dataUpdate['password']);
        } else {
            unset($dataUpdate['password']);
        }
        $result = $this->userRepo->update($id, $dataUpdate);
        if ($result) {
            return redirect()->route('admin.users.index')->with('message', trans('user::message.update_user_success'));
        }
        abort(404);
    }
}
