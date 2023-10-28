<?php

// Dashboard Routes
use App\Modules\Admins\Http\Controllers\DashboardController;
use App\Modules\Admins\Http\Controllers\ProfileController;

// User Routes
use App\Modules\Admins\Http\Controllers\Users\UserController;
use App\Modules\Admins\Http\Controllers\Users\Ajax\CreateUserController;
use App\Modules\Admins\Http\Controllers\Users\Ajax\DeleteUserController;
use App\Modules\Admins\Http\Controllers\Users\Ajax\UpdateUserController;
use App\Modules\Admins\Http\Controllers\Users\Ajax\BanUserController;
use App\Modules\Admins\Http\Controllers\Users\Ajax\ChangeUserRoleController;
use App\Modules\Admins\Http\Controllers\Users\BannedUsersController;
use App\Modules\Admins\Http\Controllers\Users\UserRoleController;
use Illuminate\Support\Facades\Route;

// Post Routes
use App\Modules\Admins\Http\Controllers\Blogs\PostController;
use App\Modules\Admins\Http\Controllers\Blogs\Ajax\Post\CreatePostController;

// Post Category Routes
use App\Modules\Admins\Http\Controllers\Blogs\PostCategoryController;
use App\Modules\Admins\Http\Controllers\Blogs\Ajax\Category\CreatePostCategoryController;
use App\Modules\Admins\Http\Controllers\Blogs\Ajax\Post\DeletePostController;
use App\Modules\Admins\Http\Controllers\Blogs\Ajax\Tag\CreatTagController;
use App\Modules\Admins\Http\Controllers\Blogs\Ajax\Tag\UpdateTagController;
use App\Modules\Admins\Http\Controllers\Blogs\PostTagController;

Route::group(['middleware' => ['web', 'admin.auth', 'admin.verified']], function() {

    Route::group(['as' => 'admin.', 'prefix' => '/admin'], function() {
        
        // Dashboard
        Route::get('/', DashboardController::class)->name('dashboard');
        
        Route::group(['as' => 'user.', 'prefix' => '/user'], function(){

            // Users
            Route::get('/all', [UserController::class, 'index'])->name('all');
            Route::get('/show/{slug}', [UserController::class, 'show'])->name('show');
            Route::get('/show/{slug}/password', [UserController::class, 'showPassword'])->name('show.password');
            // Route::get('/show/{slug}/role', [UserController::class, 'role'])->name('show.role');
            Route::get('/show/{slug}/ban', [UserController::class, 'ban'])->name('show.ban');
            Route::get('/show/{slug}/remove', [UserController::class, 'remove'])->name('show.remove');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            // Route::get('/roles', UserRoleController::class)->name('roles.all');
            Route::get('/banned', BannedUsersController::class)->name('banned.all');

            // ajax to choose ban type <daterange or duration>
            Route::post('/ajax/ban/type', [UserController::class, 'banType'])->name('ajax.ban.type');
            // ajax to create new user
            Route::post('/ajax/create', CreateUserController::class)->name('ajax.create');
            // ajax to delete user
            Route::post('/ajax/delete', DeleteUserController::class)->name('ajax.delete');
            // ajax to update user info <fname, lname, email>
            Route::post('/ajax/update/info', [UpdateUserController::class, 'update'])->name('ajax.update.info');
            // ajax to update user personal info
            Route::post('/ajax/update/personal-info', [UpdateUserController::class, 'updatePersonalInfo'])->name('ajax.update.personal-info');
            // ajax to update user password
            Route::post('/ajax/update/password', [UpdateUserController::class, 'updatePassword'])->name('ajax.update.password');
            // ajax to change user role
            Route::post('/ajax/change/role', ChangeUserRoleController::class)->name('ajax.change.role');
            // ajax to update user personal image
            Route::post('/ajax/update/image', [UpdateUserController::class, 'updateImage'])->name('ajax.update.image');
            // ajax to remove user personal image
            Route::post('/ajax/remove/image', [UpdateUserController::class, 'removeImage'])->name('ajax.remove.image');
            // ajax to ban user
            Route::post('/ajax/ban', [BanUserController::class, 'ban'])->name('ajax.ban');
            // ajax to remove ban from user
            Route::post('/ajax/ban/remove', DeleteUserController::class)->name('ajax.ban.remove');
        });

        Route::group(['as' => 'blog.', 'prefix' => '/blog'], function(){

            // blog post categories routes
            Route::group(['as' => 'category.', 'prefix' => '/category'], function(){

                Route::get('/all', [PostCategoryController::class, 'index'])->name('all');

                // ajax to create new post category
                Route::post('/ajax/create', CreatePostCategoryController::class)->name('ajax.create');
            });

            // blog post routes
            Route::group(['as' => 'post.', 'prefix' => '/post'], function(){

                Route::get('/all', [PostController::class, 'index'])->name('all');
                Route::get('/create', [PostController::class, 'create'])->name('create');
                Route::get('/show/{slug}', [PostController::class, 'show'])->name('show');
                
                // ajax to create new post
                Route::post('/ajax/create', CreatePostController::class)->name('ajax.create');
                // ajax to delete post
                Route::post('/ajax/delete', DeletePostController::class)->name('ajax.delete');
            });

            // blog post tags routes
            Route::group(['as' => 'tag.', 'prefix' => '/tag'], function(){

                Route::get('/all', [PostTagController::class, 'index'])->name('all');
                Route::get('/show/{slug}', [PostTagController::class, 'show'])->name('show');

                Route::post('/ajax/create', CreatTagController::class)->name('ajax.create');
                Route::post('/ajax/update', UpdateTagController::class)->name('ajax.update');
            });
        });
    });
});


Route::group(['as' => 'admin.', 'prefix' => '/admin', 'middleware' => ['web', 'admin.auth']], function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['web', 'admin.auth', 'admin.verified'])->get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

require __DIR__.'/auth.php';
