$(document).ready(function () {
    setTimeout(() => {
        $(".pre-loader").hide();
    }, 2000)

    $("#open").click(function () {
        $("#main-nav").removeClass("hide")
        $("#main-nav").addClass("show")


    })
    $("#close").click(function () {
        $("#main-nav").removeClass("show")
        $("#main-nav").addClass("hide")
    })

    const loadCarCategory = () => {
        $.ajax({
            url: "/admin/loadData",
            type: "GET",
            success: function (data) {
                $("#table-data").html(data);
            }
        });
    }
    loadCarCategory()


    $("#search").keyup(function () {
        const search = $(this).val();
        $.ajax({
            url: "/admin/searchData",
            type: "GET",
            data: { search: search },
            success: function (data) {
                $("#table-data").html(data);
            }
        });
    })
    $("#addcarCategory").submit(function (e) {
        e.preventDefault();
        var car_name = $("#car_cat_name").val();
        var car_image = $("#car_image").val();

        const formdata = new FormData(this);
        if (car_name == "" || car_image == "") {
            show_message("error", "Please Fill All Field");
        } else {
            $.ajax({
                url: "/admin/car_cat_category",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data == 1) {
                        show_message("success", "Data add Successfully");
                        loadCarCategory()
                        $("#addcarCategory").trigger("reset");
                        $("#carcategory").modal("hide");
                    } else {
                        show_message("error", "Data not Add successfully");
                    }
                }
            });
        }
    });

    $("#editcarCategory").submit(function (e) {
        e.preventDefault();
        var car_name = $("#edit_car_cat_name").val();

        const formdata = new FormData(this);
        if (car_name == "") {
            show_message("error", "Please Fill All Field");
        } else {
            $.ajax({
                url: "/admin/update_category",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data == 1) {
                        show_message("success", "Data update Successfully");
                        loadCarCategory()
                        $("#editcarCategory").trigger("reset");
                        $("#editcategory").modal("hide");
                    } else {
                        show_message("error", "Data not update successfully");
                    }
                }
            });
        }
    });
    $(document).on("click", "#edit-btn", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/edit_category",
            type: "GET",
            data: { id: id },
            success: function (data) {
                $("#form-data").html(data);
            }
        });
    })

    $(document).on("click", "#delete-btn", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/delete_category",
            type: "GET",
            data: { id: id },
            success: function (data) {
                if (data == 1) {
                    show_message("success", "Data Delete Successfully");
                    loadCarCategory()
                } else {
                    show_message("error", "Data not Delete successfully");
                }
            }
        });
    })



    const loadCar = () => {
        $.ajax({
            url: "/admin/get",
            type: "GET",
            success: function (data) {
                $("#car-table").html(data);
            }
        });
    }
    loadCar()

    $("#car_img").change(function (e) {
        console.log(e.target.files[0]);
        const sizeFile = e.target.files[0].size;
        const typeFile = e.target.files[0].type;
        if (typeFile != "image/jpeg" && typeFile != "image/jpg" && typeFile != "image/png") {
            show_message("error", `Not upload <span style='color:white;'>${typeFile}</span> only upload jpg and png and jpeg`);
        }
        if (sizeFile > 4978780) {
            show_message("error", "Image size less then 4 mb");
        }
    })
    $(document).on("change", "#new_car_img", function (e) {
        console.log(e.target.files[0]);
        const sizeFile = e.target.files[0].size;
        const typeFile = e.target.files[0].type;
        if (typeFile != "image/jpeg" && typeFile != "image/jpg" && typeFile != "image/png") {
            // show_message("error", "upload in png or jpeg");
            show_message("error", `Not upload <span style='color:white;'>${typeFile}</span> only upload jpg and png and jpeg`);
        }
        if (sizeFile > 4978780) {
            show_message("error", "Image size less then 4 mb");
        }
    })

    $("#addcars").submit(function (e) {
        e.preventDefault();
        const car_name = $("#car_name").val();
        const car_id = $("#car_id").val();
        const car_desc = $("#car_desc").val();
        const car_image = $("#car_img").val();
        const car_price = $("#car_price").val();

        const formdata = new FormData(this);
        if (car_name == "" || car_price == "" || car_image == "" || car_desc == "" || car_id == "") {
            show_message("error", "Please Fill All Field");
        } else {
            $.ajax({
                url: "/admin/create",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: (data) => {
                    if (data == 1) {
                        show_message("success", "Data add Successfully");
                        $("#addcars").trigger("reset");
                        $("#addcar").modal("hide");
                        loadCar();
                    } else {
                        show_message("error", "Data Not Add Successfully");
                    }
                }
            })
        }

    });
    $(document).on("click", "#car-edit-btn", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/edit",
            type: "GET",
            data: { id: id },
            success: (data) => {
                $("#car-form-data").html(data);
            }
        })
    });

    $("#editcars").submit(function (e) {
        e.preventDefault();
        const car_name = $("#edit_car_name").val();
        const car_id = $("#edit_car_cat_id").val();
        const car_desc = $("#edit_car_desc").val();
        const car_price = $("#edit_car_price").val();

        const formdata = new FormData(this);
        if (car_name == "" || car_price == "" || car_desc == "" || car_id == "") {
            show_message("error", "Please Fill All Field");
        } else {
            $.ajax({
                url: "/admin/update",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: (data) => {
                    if (data == 1) {
                        show_message("success", "Data Update Successfully");
                        $("#edit-car").modal("hide");
                        loadCar();
                    } else {
                        show_message("error", "Data Not Update Successfully");
                    }
                }
            })
        }

    });

    $(document).on("click", "#car-delete-btn", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/delete",
            type: "GET",
            data: { id: id },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Data Delete Successfully");
                    loadCar();
                } else {
                    show_message("error", "Data not Delete successfully");
                }
            }
        })
    });


    $("#search").keyup(function () {
        const search = $(this).val();
        $.ajax({
            url: "/admin/search",
            type: "GET",
            data: { search: search },
            success: (data) => {
                $("#car-table").html(data);
            }
        })
    })


    const loadCategory = () => {
        $.ajax({
            url: "/admin/getcategory",
            type: "GET",
            success: function (data) {
                $("#category-table").html(data);
            }
        });
    }
    loadCategory()


    $("#search").keyup(function () {
        const search = $(this).val();
        $.ajax({
            url: "/admin/search-category",
            type: "GET",
            data: { search: search },
            success: function (data) {
                $("#category-table").html(data);
            }
        });
    })
    $("#addpostcategory").submit(function (e) {
        e.preventDefault();
        var cat_name = $("#cat_name").val();

        const formdata = new FormData(this);
        if (cat_name == "") {
            show_message("error", "Please Fill All Field");
        } else {
            $.ajax({
                url: "/admin/createcategory",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data == 1) {
                        show_message("success", "Data add Successfully");
                        loadCategory()
                        $("#addpostcategory").trigger("reset");
                        $("#category").modal("hide");
                    } else {
                        show_message("error", "Data not Add successfully");
                    }
                }
            });
        }
    });

    $("#editpostcategory").submit(function (e) {
        e.preventDefault();
        var cat_name = $("#edit_cat_name").val();

        const formdata = new FormData(this);
        if (cat_name == "") {
            show_message("error", "Please Fill All Field");
        } else {
            $.ajax({
                url: "/admin/update-category",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data == 1) {
                        show_message("success", "Data update Successfully");
                        loadCategory()
                        $("#editpostcategory").trigger("reset");
                        $("#editcat").modal("hide");
                    } else {
                        show_message("error", "Data not update successfully");
                    }
                }
            });
        }
    });
    $(document).on("click", "#cat-edit-btn", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/edit-category",
            type: "GET",
            data: { id: id },
            success: function (data) {
                $("#category-form").html(data);
            }
        });
    })

    $(document).on("click", "#cat-delete-btn", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/delete-category",
            type: "GET",
            data: { id: id },
            success: function (data) {
                if (data == 1) {
                    show_message("success", "Data Delete Successfully");
                    loadCategory()
                } else {
                    show_message("error", "Data not Delete successfully");
                }
            }
        });
    });



    const loadPosts = () => {
        $.ajax({
            url: "/admin/get-posts",
            type: "GET",
            success: function (data) {
                $("#posts-table").html(data);
            }
        });
    }
    loadPosts()


    $("#addposts").submit(function (e) {
        e.preventDefault();
        const title = $("#title").val();
        const cat_id = $("#cat_id").val();
        const desc = $("#desc").val();
        const image = $("#image").val();

        const formdata = new FormData(this);
        if (title == "" || image == "" || desc == "" || cat_id == "") {
            show_message("error", "Please Fill All Field");
        } else {
            $.ajax({
                url: "/admin/create-posts",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: (data) => {
                    if (data == 1) {
                        show_message("success", "Data add Successfully");
                        $("#addposts").trigger("reset");
                        $("#addpost").modal("hide");
                        loadPosts();
                    } else {
                        show_message("error", "Data Not Add Successfully");
                    }
                }
            })
        }

    });
    $(document).on("click", "#post-edit-btn", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/edit-posts",
            type: "GET",
            data: { id: id },
            success: (data) => {
                $("#post-form-data").html(data);
            }
        })
    });

    $("#editposts").submit(function (e) {
        e.preventDefault();
        const title = $("#edit_post_name").val();
        const cat_id = $("#edit_cat_id").val();
        const desc = $("#edit_post_desc").val();

        const formdata = new FormData(this);
        if (title == "" || cat_id == "" || desc == "") {
            show_message("error", "Please Fill All Field");
        } else {
            $.ajax({
                url: "/admin/update-posts",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: (data) => {
                    if (data == 1) {
                        show_message("success", "Data Update Successfully");
                        $("#editpost").modal("hide");
                        loadPosts();
                    } else {
                        show_message("error", "Data Not Update Successfully");
                    }
                }
            })
        }

    });

    $(document).on("click", "#post-delete-btn", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/delete-posts",
            type: "GET",
            data: { id: id },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Data Delete Successfully");
                    loadPosts();
                } else {
                    show_message("error", "Data not Delete successfully");
                }
            }
        })
    });

    $("#search").keyup(function () {
        const search = $(this).val();
        $.ajax({
            url: "/admin/search-posts",
            type: "GET",
            data: { search: search },
            success: function (data) {
                $("#posts-table").html(data);
            }
        });
    });


    function getGallery() {
        $.ajax({
            type: "GET",
            url: "/admin/get_gallery",
            success: function (data) {
                // console.log(data);
                $("#gallery-data").html(data);
            }
        });
    }
    getGallery();
    $("#submitGallery").on("submit", function (e) {
        e.preventDefault();
        var image = $("#file").val();

        var formdata = new FormData(this);
        if (image == "") {
            alert("fill all field");
        } else {
            $.ajax({
                url: "/admin/add_gallery",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data == 1) {
                        show_message("success", "Data add successfully");
                        $("#submitGallery").trigger("reset");
                        $("#modelId").modal("hide");
                        getGallery();

                    } else {
                        show_message("error", "Data not add successfully");
                    }
                }
            })
        }
    })

    $(document).on("click", "#edit-gallery", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/edit-gallery",
            type: "GET",
            data: { id: id },
            success: (data) => {
                $("#form-gallery").html(data);
            }
        })
    });


    $("#editGallery").submit(function (e) {
        e.preventDefault();
        const formdata = new FormData(this);
        $.ajax({
            url: "/admin/update-gallery",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Data Add Successfully");
                    $("#edit-gallerys").modal("hide");
                    getGallery();
                } else {
                    show_message("error", "Data Not Add Successfully");
                }
            }
        });
    });

    $(document).on("click", "#delete-gallery", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/delete-gallery",
            type: "GET",
            data: { id: id },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Data delete successfully");
                    getGallery();
                } else {
                    show_message("error", "Data Not Delete successfully");
                }
            }
        })
    })

    const loadUser = () => {
        $.ajax({
            url: "/admin/get-user",
            type: "GET",
            success: (data) => {
                $("#get-user").html(data);
            }
        })
    }
    loadUser();
    $("#save-user").on("submit", function (e) {
        e.preventDefault();
        const fname = $("#fname").val()
        const lname = $("#lname").val()
        const username = $("#username").val()
        const email = $("#email").val()
        const password = $("#password").val()
        const c_password = $("#c_password").val()
        const image = $("#image").val();

        const formdata = new FormData(this);

        if (fname == "" || lname == "" || email == "" || username == "" || password == "" || c_password == "" || image == "") {
            show_message("error", "Please Fill All The Field");

        } else if (password != c_password) {
            show_message("error", "Password Are Not Matched");
        } else {
            $.ajax({
                url: "/admin/add-user",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data == 1) {
                        show_message("success", "Admin Add Successfully")
                        loadUser();
                        $("#save-user").trigger("reset");
                        $("#users").modal("hide");

                    } else if (data == 2) {
                        show_message("error", "Emai already Exist")
                    }
                    else {
                        show_message("error", "Admin Not Add Successfully")
                    }
                }
            })
        }

    });


    $(document).on("click", "#user-edit", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/edit-user",
            type: "GET",
            data: { id: id },
            success: (data) => {
                $("#get-user-form").html(data);
            }
        })
    });


    $("#update-user").on("submit", function (e) {
        e.preventDefault();
        const fname = $("#edit_fname").val()
        const lname = $("#edit_lname").val()
        const username = $("#edit_username").val()
        const email = $("#edit_email").val()

        const formdata = new FormData(this);

        if (fname == "" || lname == "" || email == "" || username == "") {
            show_message("error", "Please Fill All The Field");

        } else {
            $.ajax({
                url: "/admin/update-user",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data == 1) {
                        show_message("success", "Admin Update Successfully")
                        loadUser();
                        $("#edit-user").modal("hide");
                    }
                    else {
                        show_message("error", "Admin Not Update Successfully")
                    }
                }
            })
        }

    });

    $(document).on("click", "#user-delete", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/delete-user",
            type: "GET",
            data: { id: id },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Data delete successfully");
                    loadUser();
                } else {
                    show_message("error", "Data Not Delete successfully");
                }
            }
        })
    })
    const loadReview = () => {
        const id = $("#car_id").val();
        $.ajax({
            url: "/getReview",
            type: "GET",
            data: { id: id },
            success: (data) => {
                $("#load-review").html(data);
            }
        })
    }
    loadReview();
    $("#submitReview").on("click", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var review = $("#review").val();
        var comment = $("#comment").val();
        var _token = $("input[name=_token]").val();
        // console.log(id + _token)
        if (review == "" || comment == "") {
            show_message("error", "Please fill the Field");
        } else {
            $.ajax({
                type: "POST",
                url: "/create_comment",
                data: {
                    id: id,
                    review: review,
                    comment: comment,
                    _token: _token
                },
                success: function (data) {
                    if (data == 1) {
                        $("#review-form").trigger("reset");
                        loadReview();
                    } else {
                        alert("something wroning");
                    }
                }
            });
        }

    });




    const comments = () => {
        const id = $("#posts_id").val();
        $.ajax({
            url: "/getCommets",
            type: "GET",
            data: { id: id },
            success: (data) => {
                $("#load-comments").html(data);
            }
        })
    }
    comments();
    $("#submitComment").on("click", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var comment = $("#comment").val();
        var _token = $("input[name=_token]").val();
        // console.log(id + _token)
        if (comment == "") {
            show_message("error", "Please Fill the Field For Comment")
        } else {
            $.ajax({
                type: "POST",
                url: "/create_blog_comment",
                data: {
                    id: id,
                    comment: comment,
                    _token: _token
                },
                success: function (data) {
                    if (data == 1) {
                        $("#comment-form").trigger("reset");
                        comments();
                    } else {
                        alert("something wroing");
                    }
                }
            });
        }

    });


    $("#addCustomar").on("submit", function (e) {
        e.preventDefault();
        const fname = $("#fname").val();
        const lname = $("#lname").val();
        const username = $("#username").val();
        const email = $("#email").val();
        const password = $("#password").val();
        const cpassword = $("#cpassword").val();
        const profile = $("#profile").val();

        const formdata = new FormData(this);
        if (fname == "" || lname == "" || username == "" || email == "" || password == "" || cpassword == "" || profile == "") {
            show_message("error", "Please fill all the field");
        } else if (password != cpassword) {
            show_message("error", "password are not matched");
        } else {
            $.ajax({
                type: "POST",
                url: "/create",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data == 1) {
                        show_message("success", "User register successfully");
                        $("#addCustomar").trigger("reset");
                        window.location.href = "/signin";
                    } else if (data == 2) {
                        show_message("error", "email allready exsits");
                    } else {
                        show_message("error", "something wroing");
                    }
                }
            });
        }
    })


    $("#login").submit(function (e) {
        e.preventDefault();
        const email = $("#email").val();
        const password = $("#password").val();
        const formdata = new FormData(this);

        if (email == "" || password == "") {
            show_message("error", "Please Fill the field");
        } else {
            $.ajax({
                type: "POST",
                url: "/login",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    if (data == 1) {
                        show_message("success", "User register successfully");
                        $("#login").trigger("reset");
                        window.location.href = "/";
                    } else if (data == 2) {
                        show_message("error", "Invalid email and password");
                    } else {
                        show_message("error", "Invalid email and password");
                    }
                }
            });
        }
    });

    $("#gotologin").click(function (e) {
        e.preventDefault();
        window.location.href = "/signin";
    });


    $("#subscribe").on("submit", function (e) {
        e.preventDefault();

        const email = $("#email").val();

        const formdata = new FormData(this);
        if (email == "") {
            show_message("error", "Please fill the field");
        } else {
            $.ajax({
                url: "/subscribe",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: (data) => {
                    if (data == 1) {
                        $("#subscribe").trigger("reset");
                    }
                }
            })
        }
    });


    const loadLike = () => {
        const id = $("#car_id").val();
        $.ajax({
            url: "/getLikes",
            type: "GET",
            data: { id: id },
            success: (data) => {
                // console.log(data)
                $("#like-data").html(data);
            }
        })
    }
    loadLike();
    $("#likebtn").on("click", function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        var _token = $("input[name=_token]").val();
        $.ajax({
            url: "/like",
            type: "POST",
            data: { id: id, _token: _token },
            success: (data) => {
                loadLike();

                // console.log(data);
            }
        })
    });

    const loadBookCar = () => {
        $.ajax({
            url: "/get-book-car",
            type: "GET",
            success: (data) => {
                $("#get-book-car").html(data);
            }
        })
    }
    loadBookCar();

    $("#book-car").on("submit", function (e) {
        e.preventDefault();
        const id = $("#id").val();
        const days = $("#days").val();
        const formdata = new FormData(this);
        if (days == "" || id == "") {
            show_message("error", "Please Fill the Field");
        } else {
            $.ajax({
                url: "/book-car",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: (data) => {
                    if (data == 1) {
                        show_message("success", "Car Books Successfully");
                        loadBookCar();
                        $("#book-car").trigger("reset");
                    } else if (data == 2) {
                        show_message("error", "This Car you book");
                    } else {
                        show_message("error", "Something Woring");
                    }
                }
            });
        }
    });

    $(document).on("click", "#delete-book-car", function () {
        const id = $(this).data("id")
        $.ajax({
            url: "/delete-book-car",
            type: "GET",
            data: { id: id },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Car Book Remove Successfully");
                    loadBookCar();
                } else {
                    show_message("error", "Car not Remove successfully");
                }
            }
        })
    });

    $("#delete-account").on("click", function (e) {
        e.preventDefault();
        if (confirm("Are you Sure you want to delete account")) {
            $.ajax({
                url: "/delete-profile",
                type: "GET",
                success: (data) => {
                    if (data == 1) {
                        show_message("success", "Account Delete Successfully");
                        window.location.href = "/";
                    } else {
                        show_message("error", "Account Not Delete successfully");
                    }
                }
            })
        }

    });

    const loadBookCars = () => {
        $.ajax({
            url: "/admin/get-car-book",
            type: "GET",
            success: (data) => {
                // console.log(data);
                $("#get-car-book").html(data);
            }
        })
    }
    loadBookCars();

    $(document).on("click", "#confirm", function () {
        const id = $(this).data("id");
        var _token = $("input[name=_token]").val();
        // console.log(id);
        $.ajax({
            url: "/admin/confirm-book",
            type: "POST",
            data: { id: id, _token: _token },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Car Book Confirm");
                    loadAllBookCars();
                    loadBookCars();
                } else {
                    show_message("error", "Something woring");
                }
            }
        })
    })
    $(document).on("click", "#not-confirm", function () {
        const id = $(this).data("id");
        var _token = $("input[name=_token]").val();
        // console.log(id);
        $.ajax({
            url: "/admin/not-confirm-book",
            type: "POST",
            data: { id: id, _token: _token },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Car Not  Confirm");
                    loadAllBookCars();
                    loadBookCars();
                } else {
                    show_message("error", "Something woring");
                }
            }
        })
    });


    const loadCustomars = () => {
        $.ajax({
            url: "/admin/load-customars",
            type: "GET",
            success: (data) => {
                $("#get-customars").html(data);
            }
        })
    }
    loadCustomars();
    const loadAllCustomars = () => {
        $.ajax({
            url: "/admin/load-all-customars",
            type: "GET",
            success: (data) => {
                $("#load-all-customars").html(data);
            }
        })
    }
    loadAllCustomars();
    const loadAllReview = () => {
        $.ajax({
            url: "/admin/load-all-review",
            type: "GET",
            success: (data) => {
                $("#load-all-review").html(data);
            }
        })
    }
    loadAllReview();

    const loadAllBookCars = () => {
        $.ajax({
            url: "/admin/load-all-car-book",
            type: "GET",
            success: (data) => {
                // console.log(data);
                $("#get-all-car-book").html(data);
            }
        })
    }
    loadAllBookCars();
    const loadAllCommets = () => {
        $.ajax({
            url: "/admin/load-all-comments",
            type: "GET",
            success: (data) => {
                // console.log(data);
                $("#get-all-comments").html(data);
            }
        })
    }
    loadAllCommets();


    $(document).on("click","#delete-review",function(){
        const id=$(this).data("id");
        $.ajax({
            url:"/admin/delete-review",
            type:"GET",
            data:{id:id},
            success:(data)=>{
                if(data ==1){
                    show_message("success","Review Delete Successfully");
                    loadAllReview();
                }else{
                    show_message("error","Review Not Delete Successfully");
                }
            }
        })
    })
    $(document).on("click","#delete-comment",function(){
        const id=$(this).data("id");
        $.ajax({
            url:"/admin/delete-comments",
            type:"GET",
            data:{id:id},
            success:(data)=>{
                if(data ==1){
                    show_message("success","Comment Delete Successfully");
                    loadAllCommets();
                }else{
                    show_message("error","Comment Not Delete Successfully");
                }
            }
        })
    })
    const show_message = (type, text) => {
        if (type == "error") {
            var message_box = $("#error-message");
        } else {
            var message_box = $("#success-message");
        }

        message_box.css({ display: "block" });
        message_box.html(text);

        setTimeout(() => {
            message_box.css({ display: "none" });
        }, 3000);
    }
});
