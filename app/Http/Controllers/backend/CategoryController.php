<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $table= Category::all();
        return view('backend.category.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data= $request->validate([
            'name' => 'required|unique:categories',
        ]);
        Category::create($data);
        return redirect(route('backend.categories.create'))->with('successMessage', 'Data stored successfully!<a class="btn btn-sm btn-info ml-2" href="'.route('backend.categories.index').'">View All</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        abort_if(Gate::denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category->all();

        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data= $request->validate([
            'name' => 'required',
        ]);
        $category->update($data);
        return redirect(route('backend.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($category->posts()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, category has posts.']);
        }else{
            $category->delete();
            return redirect(route('backend.categories.index'));
        }

    }
    public function massDestroy(Category $category)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($category->posts()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, category has posts.']);
        }else{
            Category::whereIn('id', request('ids'))->delete();
        }
        return response()->noContent();
    }
}
