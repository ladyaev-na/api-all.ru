<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return response()->json($products)->setStatusCode(200, 'Успешно');
    }

    public function show($id) {
        $products = Product::find($id);
        if ($products){
            return response()->json($products)->setStatusCode(200, 'Успешно');
        }else{
            return response()->json('Продукт не найден')->setStatusCode(404, 'Не найдено');
        }
    }

    public function create(ProductCreateRequest $request) {
        $products = new Product($request->all());
        $products->save();
        return response()->json($products)->setStatusCode(200, 'Добавлено');
    }

    public function update(ProductUpdateRequest $request, $id) {
        $products = Product::find($id);

        if ($products) {
            $products->update($request->all());
            return response()->json($products)->setStatusCode(200, 'Изменено');
        } else {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Не найдено');
        }
    }

    public function destroy(ProductUpdateRequest $request, $id) {
        $products = Product::find($id);
        if ($products) {
            Product::destroy($id);
            return response()->json('Продукт удален')->setStatusCode(200, 'Успешно');
        } else {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Не найдено');
        }
    }
}
