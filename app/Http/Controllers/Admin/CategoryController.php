<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use File;
use Mockery\Exception;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(15);
    	return view('admin.categories.index')->with(compact('categories')); // listado
    }

    public function create()
    {
    	return view('admin.categories.create'); // formulario de registro
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        $category = Category::create($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            // update category
            if ($moved) {
                $category->image = $fileName;
                $category->save(); // UPDATE
            }
        }

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category')); // form de edición
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
        $this->validate($request, Category::$rules, Category::$messages);

        $category->update($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            // update category
            if ($moved) {
                $previousPath = $path . '/' . $category->image;

                $category->image = $fileName;
                $saved = $category->save(); // UPDATE

                if ($saved)
                    File::delete($previousPath);
            }
        }

        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Category::findOrFail($request->id)->delete();
            $notification = "El registro se eliminó correctamente";
        } catch (QueryException $exception){
            $notification = "Error al eliminar el registro".$exception->getMessage();
        }

        return back()->with(compact('notification'));
    }
}
