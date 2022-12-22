```laravel
Part 226
created middleware 
-> logged to kernel on 'routeMiddleware' section
-> created Route::middleware('role:ADMIN')->group(function(){
    Route::get('admin/users' , [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
}); on routes/web.php

Part 228
Created additional Policy
->php artisan make:policy UserPolicy --model=User
->wrote  public function view(User $user, User $model)
    {
        return $user->userHasRole('admin') ?: $user->id == $model->id;
    }
->and created a route Route::middleware(['can:view,user', 'auth'])->group(function(){
    Route::get('admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
});

and some 
```
