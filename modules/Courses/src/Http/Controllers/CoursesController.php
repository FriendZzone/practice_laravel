<?php

namespace Modules\Courses\src\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Modules\Courses\src\Http\Requests\CoursesRequest;
use Modules\Courses\src\Repositories\CoursesRepository;

class CoursesController extends Controller
{
    protected $coursesRepository;

    public function __construct(CoursesRepository $coursesRepository)
    {
        $this->coursesRepository = $coursesRepository;
    }
    public function index()
    {
        $pageTitle = 'Quản lý khoa hoc';

        return view('courses::lists', compact('pageTitle'));
    }

    public function data()
    {
        $courses = $this->coursesRepository->getAllCourses();

        return DataTables::of($courses)
            ->addColumn('edit', function ($courses) {
                return '<a href="' . route('admin.courses.edit', $courses) . '" class="btn btn-warning">Sửa</a>';
            })
            ->addColumn('delete', function ($courses) {
                return '<a href="' . route('admin.courses.postDelete', $courses) . '" class="btn btn-danger delete-action">Xóa</a>';
            })
            ->editColumn('created_at', function ($courses) {
                return Carbon::parse($courses->created_at)->format('d/m/Y H:i:s');
            })
            ->editColumn('status', function ($courses) {
                return '<a href="' . route('admin.courses.postDelete', $courses) . '" class="btn ' . ($courses->status == 1 ? 'btn-danger' : 'btn-primary') . ' delete-action">' . ($courses->status == 1 ? 'Unpublish' : 'Publish')  . '</a>';
            })
            ->editColumn('price', function ($courses) {
                return number_format($courses->price, 0, '.', ',');
            })
            ->rawColumns(['edit', 'delete', 'status'])
            ->toJson();
    }

    public function create()
    {
        $pageTitle = 'Thêm khoa hoc';
        return view('courses::add', compact('pageTitle'));
    }

    public function store(CoursesRequest $request)
    {
        $data = $request->except(['_token']);
        $this->coursesRepository->create($data);

        return redirect()->route('admin.courses.index')->with('msg', __('user::messages.create.success'));
    }

    public function edit($id)
    {
        $courses = $this->coursesRepository->find($id);

        if (!$courses) {
            abort(404);
        }

        $pageTitle = 'Cập nhật khoa hoc';

        return view('courses::edit', compact('courses', 'pageTitle'));
    }

    public function postEdit(CoursesRequest $request, $id)
    {
        $data = $request->except('_token', 'password');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $this->coursesRepository->update($id, $data);

        return back()->with('msg', __('courses::messages.update.success'));
    }
    public function postDelete($id)
    {
        $this->coursesRepository->delete($id);
        return back()->with('msg', __('courses::messages.delete.success'));
    }
}
