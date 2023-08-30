<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function () {
    $user = 'John Doe';
    return Response::json([
        'name' => $user,
        'state' => 'CA'
    ]);
});

Route::post('/admin/add', function (Request $request) {
    $user = $request->input('name');
    $pass = $request->input('password');
    $intusty = $request->input('intusty');
    $logo = $request->input('logo');
    $location = $request->input('location');
    $role = 'user';
    DB::insert('insert into users (name, password, industry, role, logo, location) values (?, ?, ?, ?, ?, ?)', [$user, $pass, $intusty, $role, $logo, $location]);
    if ($user == null || $pass == null || $intusty == null || $logo == null || $location == null) {
        return Response::json([
            'status' => 'error',
            'message' => 'Please fill all the fields'
        ]);
    }
    return Response::json([
        'status' => 'success',
    ]);
});

Route::post('/admin/delete', function (Request $request) {
    $id = $request->input('id');
    DB::delete('delete from users where id = ?', [$id]);
    return Response::json([
        'status' => 'success',
    ]);
});

Route::post('/login', function (Request $request) {
    $user = $request->input('name');
    $pass = $request->input('password');
    $data  = DB::select('select * from users where name = ? and password = ?', [$user, $pass]);
    if ($user == null || $pass == null) {
        return Response::json([
            'status' => 'error',
            'message' => 'Please fill all the fields'
        ]);
    }
    if (count($data) == 0) {
        return Response::json([
            'status' => 'error',
            'message' => 'Invalid username or password'
        ]);
    }
    return Response::json([
        'status' => 'success',
        'data' => $data
    ]);
});




Route::get('/admin', function () {
    $users = DB::select('select * from users');
    return Response::json([
        'users' => $users
    ]);
});



Route::post('/edit', function (Request $request){
    $id = $request->input('id');
    $user = $request->input('name');
    $pass = $request->input('password');
    $intusty = $request->input('intusty');
    $logo = $request->input('logo');
    $location = $request->input('location');
    if ($user == null || $pass == null || $intusty == null || $logo == null || $location == null) {
        return Response::json([
            'status' => 'error',
            'message' => 'Please fill all the fields'
        ]);
    }
    DB::update('update users set name = ?, password = ?, industry = ?, logo = ?, location = ? where id = ?', [$user, $pass, $intusty, $logo, $location, $id]);
    return Response::json([
        'status' => 'success',
    ]);
});

Route::post('/user/login', function (Request $request) {
    $users = DB::select('select * from users');
    $user = $request->input('user');
    return Response::json([
        'name' => $users
    ]);
});





