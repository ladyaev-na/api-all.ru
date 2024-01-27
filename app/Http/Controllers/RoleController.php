<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return response()->json($roles)->setStatusCode(200, 'Успешно');
    }

    public function show($id) {
        $role = Role::find($id);
        if ($role){
            return response()->json($role)->setStatusCode(200, 'Успешно');
        }else{
            return response()->json('Роль не найдена')->setStatusCode(404, 'Не найдено');
        }
    }

    public function create(RoleCreateRequest $request) {
        $role = new Role($request->all());
        $role->save();
        return response()->json($role)->setStatusCode(200, 'Добавлено');
    }

    public function update(RoleUpdateRequest $request, $id) {
        $role = Role::find($id);

        if ($role) {
            $role->update($request->all());
            return response()->json($role)->setStatusCode(200, 'Изменено');
        } else {
            return response()->json('Роль не найдена')->setStatusCode(404, 'Не найдено');
        }
    }

    public function destroy(RoleUpdateRequest $request, $id) {
        $role = Role::find($id);
        if ($role) {
            Role::destroy($id);
            return response()->json('Роль удалена')->setStatusCode(200, 'Успешно');
        } else {
            return response()->json('Роль не найдена')->setStatusCode(404, 'Не найдено');
        }
    }
}
