<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{
    CarCategory,
    CarController,
    CategoryController,
    CommentsController,
    ContactController as AdminContactController,
    CustomarController,
    DashboardController,
    GalleryController,
    LikesController,
    PostController,
    ReviewController,
    UpdateProfile,
    UserController
};
use App\Http\Controllers\customar\{
    Aboutcontroller as CustomarAboutcontroller,
    CarBookController,
    Aboutcontroller,
    AccountController,
    BlogCommentsControler,
    BlogController,
    BookCarController,
    CarController as CustomarCarController,
    CategoryPostController,
    Comments,
    ContactController,
    GalleryController as CustomarGalleryController,
    HomeController,
    LikeController,
    LoginController,
    LogoutController,
    ResetPasswordController,
    SignUpController,
    SubscribeController,
    UpdateProfileController
};
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
Route::get("/getLikes", [LikeController::class, "get"]);
Route::get("/gallery", [CustomarGalleryController::class, "index"])->name("gallery");
Route::get("/about", [CustomarAboutcontroller::class, "index"])->name("abouts");
Route::get("/contact", [ContactController::class, "index"])->name("contacts");
Route::post("/add-contact", [ContactController::class, "create"]);


Route::group(["middleware" => "cAuth"], function () {
    Route::get("/book-car", [AccountController::class, "index"])->name("book-car");
    Route::get("/logout", [LogoutController::class, "logout"])->name("logouts");
    Route::post("/like", [LikeController::class, "create"]);
    Route::post("/book-car", [BookCarController::class, "book"])->name("book-car");
    Route::get("/get-book-car", [BookCarController::class, "getBookCar"]);
    Route::get("/delete-book-car", [BookCarController::class, "delete"]);
    Route::get("/update-profile", [UpdateProfileController::class, "index"])->name("update-profile");
    Route::post("/update-profile", [UpdateProfileController::class, "update"]);
    Route::get("/delete-profile", [UpdateProfileController::class, "delete"]);
    Route::get("/reset-password", [ResetPasswordController::class, "index"])->name("reset-password");
    Route::post("/reset-password", [ResetPasswordController::class, "reset_password"]);
});

Route::group(["middleware" => "noauth"], function () {
    Route::get("/signup", [SignUpController::class, "index"])->name("signup");
    Route::post("/create", [SignUpController::class, "create"]);
    Route::get("/signin", [LoginController::class, "index"])->name("signin");
    Route::post("/login", [LoginController::class, "login"]);
});


// admin/*
Route::prefix('admin')->group(function () {
    Route::middleware(["auth"])->group(function () {
        Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
        Route::get("/get-car-book", [DashboardController::class, "get"]);
        Route::post("/confirm-book", [DashboardController::class, "confirm"]);
        Route::post("/not-confirm-book", [DashboardController::class, "not_confirm"]);
        Route::get("/load-customars", [DashboardController::class, "customars"]);
        Route::get("/all-customars", [CustomarController::class, "index"])->name("customars");
        Route::get("/load-all-customars", [CustomarController::class, "customars"]);
        Route::get("/likes", [LikesController::class, "index"])->name("likes");
        Route::get("/review", [ReviewController::class, "index"])->name("review");
        Route::get("/load-all-review", [ReviewController::class, "review"]);
        Route::get("/delete-review", [ReviewController::class, "delete"]);
        Route::get("/car-books", [CarBookController::class, "index"])->name("car-book");
        Route::get("/load-all-car-book", [CarBookController::class, "car_book"]);
        Route::get("/comments", [CommentsController::class, "index"])->name("comments");
        Route::get("/load-all-comments", [CommentsController::class, "comments"]);
        Route::get("/delete-comments", [CommentsController::class, "delete"]);


        // users
        Route::get("admins", [UserController::class, "index"])->name("admins");

        Route::get("/get-user", [UserController::class, "get"]);
        Route::get("/edit-user", [UserController::class, "edit"]);
        Route::post("/update-user", [UserController::class, "update"]);
        Route::get("/delete-user", [UserController::class, "delete"]);
        Route::get("/total-user", [UserController::class, "totalCount"]);

        // car category
        Route::get("/car_category", [CarCategory::class, "index"])->name("car_category");
        Route::get("/loadData", [CarCategory::class, "loadData"])->name("loadData");
        Route::get("/searchData", [CarCategory::class, "searchData"])->name("search");
        Route::post("/car_cat_category", [CarCategory::class, "create"])->name("add");
        Route::get("/edit_category", [CarCategory::class, "edit"])->name("edit");
        Route::post("/update_category", [CarCategory::class, "update"])->name("update");
        Route::get("/delete_category", [CarCategory::class, "delete"])->name("delete");
        Route::get("/total-car-category",[CarCategory::class,"totalCount"]);


        // car routes
        Route::get("/car", [CarController::class, "index"])->name("car");
        Route::post("/create", [CarController::class, "create"]);
        Route::get("/get", [CarController::class, "get"]);
        Route::get("/search", [CarController::class, "search"]);
        Route::get("/edit", [CarController::class, "edit"]);
        Route::post("/update", [CarController::class, "update"]);
        Route::get("/delete", [CarController::class, "delete"]);
        Route::get("/total-car",[CarController::class,"totalCount"]);



        // post category route
        Route::get("/category", [CategoryController::class, "index"])->name("category");
        Route::post("/createcategory", [CategoryController::class, "create"]);
        Route::get("/getcategory", [CategoryController::class, "get"]);
        Route::get("/edit-category", [CategoryController::class, "edit"]);
        Route::post("/update-category", [CategoryController::class, "update"]);
        Route::get("/search-category", [CategoryController::class, "search"]);
        Route::get("/delete-category", [CategoryController::class, "delete"]);
        Route::get("/total-category",[CategoryController::class,"totalCount"]);


        // posts routes
        Route::get("/posts", [PostController::class, "index"])->name("post");
        Route::post("/create-posts", [PostController::class, "create"]);
        Route::get("/get-posts", [PostController::class, "get"]);
        Route::get("/edit-posts", [PostController::class, "edit"]);
        Route::post("/update-posts", [PostController::class, "update"]);
        Route::get("/search-posts", [PostController::class, "search"]);
        Route::get("/delete-posts", [PostController::class, "delete"]);
        Route::get("/total-posts",[PostController::class,"totalCount"]);

        // gellary Routes

        Route::get("/gallery", [GalleryController::class, "index"])->name("gallerys");
        Route::post("/add_gallery", [GalleryController::class, "create"]);
        Route::get("/get_gallery", [GalleryController::class, "get"]);
        Route::get("/edit-gallery", [GalleryController::class, "edit"]);
        Route::post("/update-gallery", [GalleryController::class, "update"]);
        Route::get("/delete-gallery", [GalleryController::class, "delete"]);
        Route::get("/total-gallery",[GalleryController::class,"totalCount"]);



        // About routes
        Route::get("/about", [Aboutcontroller::class, "index"])->name("about");
        Route::post("/add-about", [Aboutcontroller::class, "addAbout"]);
        Route::get("/get-about", [Aboutcontroller::class, "getAbout"]);
        Route::get("/read-more", [Aboutcontroller::class, "readMore"]);
        Route::get("/edit-about", [Aboutcontroller::class, "editAbout"]);
        Route::post("/update-about", [Aboutcontroller::class, "updateAbout"]);
        Route::get("/delete-about", [Aboutcontroller::class, "deleteAbout"]);


        // update profile
        Route::get("/profiles", [UpdateProfile::class, "index"])->name("profiles");

        // get contacts
        Route::get("/contact", [AdminContactController::class, "index"])->name("contact");
    });
});


require __DIR__ . '/auth.php';
