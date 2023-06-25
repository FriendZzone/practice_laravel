<?php

namespace Modules\Categories\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Categories\src\Http\Requests\CategoryRequest;
use Modules\Categories\src\Repositories\CategoriesRepository;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;



class CategoriesController extends Controller
{

    protected $categoryRepo;

    public function __construct(CategoriesRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    public function index()
    {
        $pageTitle = 'Quản lý danh muc';
        // $categories = $this->categoryRepo->getTreeCategories();
        // dd($categories);
        return view('categories::lists', compact('pageTitle'));
    }

    public function data()
    {
        $categories = $this->categoryRepo->getCategories();
        // dd($categories);
        // return 
        $categories = DataTables::of($categories)
            // ->addColumn('edit', function ($category) {
            //     return '<a href="' . route('admin.categories.edit', $category) . '" class="btn btn-warning">Sửa</a>';
            // })
            // ->addColumn('delete', function ($category) {
            //     return '<a href="' . route('admin.categories.postDelete', $category) . '" class="btn btn-danger delete-action">Xóa</a>';
            // })
            // ->addColumn('link', function ($category) {
            //     return '<a href="" class="btn btn-primary delete-action">Xem</a>';
            // })
            // ->editColumn('created_at', function ($category) {
            //     return Carbon::parse($category->created_at)->format('d/m/Y H:i:s');
            // })
            ->rawColumns(['edit', 'delete', 'link'])
            ->toArray();
        // ->toJson();
        // dd($categories);
        // $data = $categories['data'];
        // dd($data);
        $categories['data'] = $this->getCategoriesTable($categories['data']);
        return $categories;
    }

    public function create()
    {
        $pageTitle = 'Thêm danh muc';
        $categories = $this->categoryRepo->getAllCategories();
        // dd($categories);
        return view('categories::add', compact('pageTitle', 'categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepo->create([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categories.index')->with('msg', __('categories::messages.create.success'));
    }

    public function edit($id)
    {
        $category = $this->categoryRepo->find($id);
        if (!$category) {
            abort(404);
        }

        $pageTitle = 'Cập nhật người dùng';

        return view('categories::edit', compact('category', 'pageTitle'));
    }

    public function postEdit(CategoryRequest $request, $id)
    {
        $data = $request->except('_token', 'password');

        $this->categoryRepo->update($id, $data);

        return back()->with('msg', __('categories::messages.update.success'));
    }
    public function postDelete($id)
    {
        $this->categoryRepo->delete($id);
        return back()->with('msg', __('categories::messages.delete.success'));
    }
    public function getCategoriesTable($categories, $char = '', &$result = [])
    {

        if (!empty($categories)) {
            foreach ($categories as $key => $category) {
                $row = $category;
                $row['name'] = $char . $row['name'];
                unset($row['sub_categories']);
                unset($row['updated_at']);
                $row['edit'] = '<a href="' . route('admin.categories.edit', $category) . '" class="btn btn-warning">Sửa</a>';
                $row['delete'] = '<a href="' . route('admin.categories.postDelete', $category) . '" class="btn btn-danger delete-action">Xóa</a>';
                $row['link'] = '<a href="'. route('admin.categories.categories', $category['slug']) . '" class="btn btn-primary link-action">Xem</a>';
                $row['created_at'] = Carbon::parse($category['created_at'])->format('d/m/Y H:i:s');
                $result[] = $row;
                if (!empty($category['sub_categories'])) {
                    $this->getCategoriesTable($category['sub_categories'], $char . '--', $result);
                }
            }
        }
        return $result;
    }
}
