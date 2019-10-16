<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = factory(\App\User::class)->create();

    $user->phone()->create([
        'phone' => '222-333-4567',
    ]);

    /*
    $phone = new \App\Phone();
    
    $phone->phone='123-123-123';
    $user->phone()->save($phone);
    */
});

Route::get('/onetomany', function () {
    $user = factory(\App\User::class)->create();

    $user->posts()->create([
        'title' => 'Title Here',
        'body' => 'new better body',
    ]);

    $user->posts->first()->title = 'New Title';

    $user->push;

    return $user->posts;
});

Route::get('/manytomany', function () {
    //$user = \App\User::first();

    // $roles = \App\Role::all();
    // $user->roles()->attach($roles);
    
    //$roles = \App\Role::first();
    //$user->roles()->detach($roles);
    //$user->roles()->attach($roles);
    
    //$user->roles()->sync([1,3,5]);

    // $role = \App\Role::find(4);
    // $role->users()->sync([5]);
    
    // dd($roles);

    //Part2
    $user = \App\User::first();
    // $user->roles()->sync([1 => [
    //     'name' => 'victor'
    // ]]);


    dd($user->roles->first()->pivot->name);

});
