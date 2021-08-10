<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CarCategory;
use App\Http\Controllers\admin\CarController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\customar\AccountController;
use App\Http\Controllers\customar\BlogCommentsControler;
use App\Http\Controllers\customar\BlogController;
use App\Http\Controllers\customar\BookCarController;
use App\Http\Controllers\customar\CarController as CustomarCarController;
use App\Http\Controllers\customar\CategoryPostController;
use App\Http\Controllers\customar\Comments;
use App\Http\Controllers\customar\HomeController;
use App\Http\Controllers\customar\LikeController;
use App\Http\Controllers\customar\LoginController;
use App\Http\Controllers\customar\LogoutController;
use App\Http\Controllers\customar\SignUpController;
use App\Http\Controllers\customar\SubscribeController;
use App\Http\Controllers\customar\UpdateProfileController;

// Route::get('/', function () {
//     return view('customar.home');
// });

// Home route
Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/category-post/{id}", [CategoryPostController::class, "index"])->name("category-post");
Route::get("/car", [CustomarCarController::class, "index"])->name("cars");
Route::get("/car-detail/{id}", [CustomarCarController::class, "detail"])->name("car-detail");
Route::get("/blog", [BlogController::class, "index"])->name("blog");
Route::get("/blog-detail/{id}", [BlogController::class, "detail"])->name("blog-detail");
Route::post("/create_comment", [Comments::class, "create"]);
Route::get("/getReview", [Comments::class, "getReview"]);
Route::post("/create_blog_comment", [BlogCommentsControler::class, "create"]);
Route::get("/getCommets", [BlogCommentsControler::class, "getCommets"]);
Route::post("/subscribe", [SubscribeController::class, "subscribe"]);
Route::get("/getLikes",[LikeController::class,"get"]);


Route::group(["middleware" => "cAuth"], function () {
    Route::get("/book-car", [AccountController::class, "index"])->name("book-car");
    Route::get("/logout", [LogoutController::class, "logout"])->name("logouts");
    Route::post("/like",[LikeController::class,"create"]);
    Route::post("/book-car",[BookCarController::class,"book"])->name("book-car");
    Route::get("/get-book-car",[BookCarController::class,"getBookCar"]);
    Route::get("/delete-book-car",[BookCarController::class,"delete"]);
    Route::get("/update-profile",[UpdateProfileController::class,"index"])->name("update-profile");
    Route::post("/update-profile",[UpdateProfileController::class,"update"]);
    Route::get("/delete-profile",[UpdateProfileController::class,"delete"]);
});
Route::group(["middleware" => "noauth"], function () {
    Route::get("/signup", [SignUpController::class, "index"])->name("signup");
    Route::post("/create", [SignUpController::class, "create"]);
    Route::get("/signin", [LoginController::class, "index"])->name("signin");
    Route::post("/login", [LoginController::class, "login"]);
});



Route::middleware("auth")->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin/dashboard');
    })->name("dashboard");

    // users
    Route::get("/admin/all-users", [UserController::class, "index"])->name("register-user");

    // car category
    Route::get("/admin/car_category", [CarCategory::class, "index"])->name("car_category");
    Route::get("/admin/loadData", [CarCategory::class, "loadData"])->name("loadData");
    Route::get("/admin/searchData", [CarCategory::class, "searchData"])->name("search");
    Route::post("/admin/car_cat_category", [CarCategory::class, "create"])->name("add");
    Route::get("/admin/edit_category", [CarCategory::class, "edit"])->name("edit");
    Route::post("/admin/update_category", [CarCategory::class, "update"])->name("update");
    Route::get("/admin/delete_category", [CarCategory::class, "delete"])->name("delete");


    // car routes
    Route::get("/admin/car", [CarController::class, "index"])->name("car");
    Route::post("/admin/create", [CarController::class, "create"]);
    Route::get("/admin/get", [CarController::class, "get"]);
    Route::get("/admin/search", [CarController::class, "search"]);
    Route::get("/admin/edit", [CarController::class, "edit"]);
    Route::post("/admin/update", [CarController::class, "update"]);
    Route::get("/admin/delete", [CarController::class, "delete"]);


    // post category route
    Route::get("/admin/category", [CategoryController::class, "index"])->name("category");
    Route::post("/admin/createcategory", [CategoryController::class, "create"]);
    Route::get("/admin/getcategory", [CategoryController::class, "get"]);
    Route::get("/admin/edit-category", [CategoryController::class, "edit"]);
    Route::post("/admin/update-category", [CategoryController::class, "update"]);
    Route::get("/admin/search-category", [CategoryController::class, "search"]);
    Route::get("/admin/delete-category", [CategoryController::class, "delete"]);

    // posts routes
    Route::get("/admin/posts", [PostController::class, "index"])->name("posts");
    Route::post("/admin/create-posts", [PostController::class, "create"]);
    Route::get("/admin/get-posts", [PostController::class, "get"]);
    Route::get("/admin/edit-posts", [PostController::class, "edit"]);
    Route::post("/admin/update-posts", [PostController::class, "update"]);
    Route::get("/admin/search-posts", [PostController::class, "search"]);
    Route::get("/admin/delete-posts", [PostController::class, "delete"]);


    // gellary Routes

    Route::get("/admin/gallery", [GalleryController::class, "index"])->name("gallery");
    Route::post("/admin/add_gallery", [GalleryController::class, "create"]);
    Route::get("/admin/get_gallery", [GalleryController::class, "get"]);
    Route::get("/admin/edit-gallery", [GalleryController::class, "edit"]);
    Route::post("/admin/update-gallery", [GalleryController::class, "update"]);
    Route::get("/admin/delete-gallery", [GalleryController::class, "delete"]);
});
require __DIR__ . '/auth.php';
