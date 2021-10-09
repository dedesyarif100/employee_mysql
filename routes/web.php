<?php

use App\Http\Controllers\Division\MarketingController;
use App\Http\Controllers\Division\SalesController;
use App\Http\Controllers\Division\HumanResourceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Project\MobileDevelopmentController;
use App\Http\Controllers\Project\UiUxDesignerController;
use App\Http\Controllers\Project\VideoGrapherController;
use App\Http\Controllers\Project\WebDevelopmentController;

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\AssignOp\Mod;

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
Route::middleware('login')->group(function () {
    Route::get('/', function () {
        return view('main');
    });
});

Route::prefix('employee')->middleware('guest')->group(function() {
    Route::view('login', 'login');
    Route::post('login', [LoginController::class, 'Login']);
});

Route::middleware('login')->group(function () {
    Route::get('home', function () {
        return redirect('employee/employee');
    });

    Route::prefix('employee')->middleware('login')->group( function () {
        Route::post('logout', [LoginController::class, 'Logout']);

        Route::get('employee', [EmployeeController::class, 'index']);
        Route::get('getEmployee', [EmployeeController::class, 'getEmployee']);

        Route::get('chart', [EmployeeController::class, 'chart']);
        Route::get('getChart', [EmployeeController::class, 'getChartEmployee']);

        Route::get('diagram', [EmployeeController::class, 'diagram']);
        Route::get('getDiagram', [EmployeeController::class, 'getDiagramEmployee']);
    });

    Route::prefix('project')->middleware(['login', 'admin'])->group( function () {
        Route::get('webdevelopment', [WebDevelopmentController::class, 'index']);
        Route::get('mobiledevelopment', [MobileDevelopmentController::class, 'index']);
        Route::get('videographer', [VideoGrapherController::class, 'index']);
        Route::get('uiuxdesigner', [UiUxDesignerController::class, 'index']);
    });

    Route::prefix('division')->middleware('user')->group( function () {
        Route::get('sales', [SalesController::class, 'index']);
        Route::get('marketing', [MarketingController::class, 'index']);
        Route::get('humanresource', [HumanResourceController::class, 'index']);
    });
});
