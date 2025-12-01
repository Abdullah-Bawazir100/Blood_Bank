<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DashboardController;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// تسجيل الدخول
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// تسجيل حساب جديد
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// حماية الراوتات بالميدلوير auth
Route::middleware(['auth'])->group(function () {

    // لوحة التحكم
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // أقسام لوحة التحكم
    Route::get('/dashboard/{section}', [DashboardController::class, 'section'])->name('dashboard.section');

    // تسجيل خروج
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    // إنشاء متبرع جديد
    Route::get('/donors/create', [DonorController::class, 'create'])->name('donors.create');
    Route::post('/donors', [DonorController::class, 'store'])->name('donors.store');

    // حذف متبرع
    Route::delete('/donors/{id}', [DashboardController::class, 'destroy'])->name('donors.destroy');

    // تعديل متبرع
    Route::get('/dashboard/donors/{donor}/edit', [DashboardController::class, 'edit'])->name('donors.edit');
    Route::put('/dashboard/donors/{donor}', [DashboardController::class, 'update'])->name('donors.update');

});

// عرض متبرع فردي (غير محمي بالميدلوير حسب الكود الأصلي)
Route::get('/donors/{donor}', [DonorController::class, 'show'])->name('donors.show');
