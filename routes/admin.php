<?php

use App\Http\Controllers\Admin\AddNewProductController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ManageCategoryController;
use App\Http\Controllers\Admin\ManageColorController;
use App\Http\Controllers\Admin\ManageThemeController;
use App\Http\Controllers\Admin\newCategoryController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SignupController;
use App\Http\Controllers\Admin\UpdateProfileController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\ManageUserController\businessCustomerController;
use App\Http\Controllers\ManageUserController\personalCustomerController;
use App\Http\Controllers\PolicyController\ExchangePolicyController\ExchangePolicyController;
use App\Http\Controllers\PolicyController\PrivacyPolicyController\UpdatePolicyController;
use App\Http\Controllers\PolicyController\TermsAndConditions\TermsPolicycontroller;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin', 'middleware' => ['auth.access']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); //logout function


    //category controller

    Route::get('/personal-customer', [personalCustomerController::class, 'index'])->name('personal.customer'); //personal customer tables
    Route::get('/business-customer', [businessCustomerController::class, 'index'])->name('business.customer'); //business customer table
    Route::get('/manage-products', [ManageCategoryController::class, 'index'])->name("manage.product"); //managing th eproduct category
    Route::get('/manage-products', [ManageCategoryController::class, 'index'])->name("manage.product"); //managing th eproduct category
    Route::get('/manage-products/delete/{id}', [ManageCategoryController::class, 'delete'])->name("delete.product"); //deleteing the eproduct category
    Route::get('/manage-products/edit/{id}', [ManageCategoryController::class, 'editpage'])->name("edit.product"); //opening the edit page for the product category
    Route::post('/manage-products/edit/{id}', [ManageCategoryController::class, 'updateproduct'])->name("update.product"); //opening the edit page for the product category
    Route::get('/add-new-category', [newCategoryController::class, 'index'])->name('addnewcategory'); //adding a new product category.
    Route::post('/add-new-category', [newCategoryController::class, 'addcategory'])->name('addnewproduct'); //adding a new product category.

    Route::get('/add-product', [AddNewProductController::class, 'index'])->name('addProduct'); //to view add a new product form
    Route::post('/add-product', [AddNewProductController::class, 'addnewproduct'])->name('addProduct.submit'); // submitting the add new product form
    Route::get('/product-list', [ProductListController::class, 'index'])->name('product.list');
    Route::get('/product-list/delete/{id}', [ProductListController::class, 'delete'])->name('product.list.delete'); // deleting product from the database.
    Route::get('/product-list/edit/{id}', [ProductListController::class, 'editpage'])->name('product.list.edit'); //view for the edit page of product 
    Route::post('/product-list/edit/{id}', [ProductListController::class, 'updateproduct'])->name('update.product.list'); //editing the existing products.

    //manage color route
    Route::get('/manage-color',[ManageColorController::class , 'index'])->name('manage.color');
    Route::get('/add-new-color',[ManageColorController::class , 'create'])->name('addNewColor');
    Route::post('/add-new-color',[ManageColorController::class , 'store'])->name('addNewColor.submit');
    Route::get('/add-new-color/edit/{id}',[ManageColorController::class , 'edit'])->name('addNewColor.edit');
    Route::post('/add-new-color/edit/{id}',[ManageColorController::class , 'update'])->name('update.addNewColor');
    Route::get('/add-new-color/delete/{id}',[ManageColorController::class , 'delete'])->name('delete.NewColor');
    // Manage theme Routes
    
    
    Route::get('/manage-theme',[ManageThemeController::class , 'index'])->name('manage.theme');
    Route::get('/add-new-theme',[ManageThemeController::class , 'create'])->name('addNewTheme');
    Route::post('/add-new-theme',[ManageThemeController::class , 'store'])->name('addNewTheme.submit');
    Route::get('/add-new-theme/edit/{id}',[ManageThemeController::class, 'edit'])->name('addNewTheme.edit');
    Route::post('/add-new-theme/edit/{id}',[ManageThemeController::class, 'update'])->name('update.addNewTheme');
    Route::get('add-new-theme/delete/{id}',[ManageThemeController::class, 'delete'])->name('delete.NewTheme');



    //policy page routes
    Route::get('/privacy-policy', [UpdatePolicyController::class, 'privacy'])->name('privacy-policy');
    Route::post('/privacy-policy/{id}', [UpdatePolicyController::class, 'updateprivacy'])->name('updatePrivacy-policy'); //updating the policy

    Route::get('/exchange-policy', [ExchangePolicyController::class, 'exchange'])->name('exchange-policy');
    Route::Post('/update-exchange-policy/{id?}', [ExchangePolicyController::class, 'updateExchangePolicy'])->name('updateExchange-policy'); //updating the policy

    Route::get('/terms-condition', [TermsPolicycontroller::class, 'terms'])->name('terms-and-condition');
    Route::post('/terms-condition', [TermsPolicycontroller::class, 'updateterms'])->name('updateTerms-and-condition'); //updating the policy

    //user profile route
    Route::get('/user-profile', [UserProfileController::class, 'index'])->name('userprofile');
    Route::get('/update-profile', [UpdateProfileController::class, 'index'])->name('update-profile');
    Route::post('/updated-profile', [UpdateProfileController::class, 'updateuser'])->name('updated-profile');

    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password');
    Route::post('/change-password', [ChangePasswordController::class, 'changepassword'])->name('updated-password');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::middleware('auth.custom')->group(function(){    
    Route::get('/',[LoginController ::class , 'index'])->name('login');//login page
    Route::post('/login',[ LoginController::class,'verifylogin' ])->name('verifylogin');//login check
    Route::post('/signup',[SignupController::class, 'registeruser'])->name('registerUser');//registering the user to db
    Route::get('/signup',[SignupController::class, 'index'])->name('signup');
});    
