<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return response()->json($categories)->setStatusCode(200, 'Успешно');
    }

    public function show($id) {
        $category = Category::find($id);
        if ($category){
            return response()->json($category)->setStatusCode(200, 'Успешно');
        }else{
            return response()->json('Категория не найдена')->setStatusCode(404, 'Не найдено');
        }
    }

    public function create(CategoryCreateRequest $request) {
        $category = new Category($request->all());
        $category->save();
        return response()->json($category)->setStatusCode(200, 'Добавлено');
    }

    public function update(CategoryUpdateRequest $request, $id) {
        $category = Category::find($id);

        if ($category) {
            $category->update($request->all());
            return response()->json($category)->setStatusCode(200, 'Изменено');
        } else {
            return response()->json('Категория не найдена')->setStatusCode(404, 'Не найдено');
        }
    }

    public function destroy(CategoryUpdateRequest $request, $id) {
        $category = Category::find($id);
        if ($category) {
            Category::destroy($id);
            return response()->json('Категория удалена')->setStatusCode(200, 'Успешно');
        } else {
            return response()->json('Категория не найдена')->setStatusCode(404, 'Не найдено');
        }
    }
}
