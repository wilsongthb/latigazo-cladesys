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
    return view('index');
});
Auth::routes();
Route::get('home', function(){ 
    return redirect('/');
});
Route::get('presentation', 'PresentationsController@index');
Route::group(['middleware' => 'auth'], function(){
    Route::get('view/{view}', 'HomeController@view');
    Route::group(['middleware' => 'user-modules'], function(){
        ROute::get('billing', 'Billing\BillingsController@index');
        Route::group(['prefix' => 'logistic'], function(){
            Route::get('purchase-order/{requeriments_id}/{supppliers_id}', 'Logistic\QuotationsController@purchaseOrder');
            Route::get('orders/print/{id}', 'Logistic\RequerimentsController@imprimir');
            Route::get('{a?}/{b?}/{c?}', 'Logistic\MainController@index')->name('logistic');
        });
        Route::get('credentials/{a?}/{b?}/{c?}', 'CredentialsController@index');
        Route::get('instruments/{a?}/{b?}/{c?}', 'InstrumentsController@index');
        Route::get('lab', function(){ return view('lab.index');});
    });
    Route::group([
        'prefix' => 'rsc',
        'middleware' => 'user-modules'
    ], function(){
        Route::resource('brands', 'Logistic\BrandsController');
        Route::resource('measurements', 'Logistic\MeasurementsController');
        Route::resource('products', 'Logistic\ProductsController');
        Route::resource('locations', 'Logistic\LocationsController');
        Route::resource('packings', 'Logistic\PackingsController');
        Route::resource('categories', 'Logistic\CategoriesController');
        Route::resource('suppliers', 'Logistic\SuppliersController');
        Route::post('product-options/{locations_id}/{products_id}', 'Logistic\ProductOptionsController@getOrCreate');
        Route::resource('product-options', 'Logistic\ProductOptionsController');
        Route::resource('inputs', 'Logistic\InputsController');
        Route::resource('input-details', 'Logistic\InputDetailsController');
        Route::post('outputs/send/{id}', 'Logistic\OutputsController@send');
        Route::put('outputs/to-unlock/{outputs_id}', 'Logistic\OutputsController@toUnlock');
        Route::put('outputs/reeboot-prices', 'Logistic\OutputsController@reebootPricesReq');
        Route::post('outputs/generate-ticket/{outputs_id}', 'Logistic\OutputsController@generateTicket');
        Route::resource('outputs', 'Logistic\OutputsController');
        Route::resource('output-details', 'Logistic\OutputDetailsController');
        Route::resource('requeriments', 'Logistic\RequerimentsController');
        Route::post('requeriment-details/add-all-req', 'Logistic\RequerimentDetailsController@addAllReq');
        Route::resource('requeriment-details', 'Logistic\RequerimentDetailsController');
        Route::delete('quotations/remove-supplier', 'Logistic\QuotationsController@removeSupplier');
        Route::put('quotations/select-more-cheap', 'Logistic\QuotationsController@selectMoreCheap');
        Route::get('quotations/select-suppliers', 'Logistic\QuotationsController@selectSuppliers');
        Route::Resource('quotations', 'Logistic\QuotationsController');
        Route::Resource('images', 'ImagesController');
        Route::get('user-locations/all', 'Logistic\UserLocationsController@getAllLocations');
        Route::resource('user-locations', 'Logistic\UserLocationsController');
        
        // NUEVAS RUTAS DE FUNCION
        Route::get('location-resume/{locations_id}', 'Logistic\StockController@locationResume');
        Route::get('location-move-resume/{locations_id}', 'Logistic\StockController@locationMoveResume');
        Route::get('stock/{locations_id}', 'Logistic\StockController@locationStockByProduct');
        Route::get('stock-input/{locations_id}', 'Logistic\StockController@locationStockByInput');
        Route::get('stock-status/{locations_id}', 'Logistic\StockController@StockStatus');
        Route::get('stock-simple/{anio}/{mes}/{locationId}', 'Logistic\StockController@simpleReport');
        Route::post('final-use', 'Logistic\OutputsController@finalUseReq');

        // EN MANTENIMIENTO
        // Route::get('inventory/{locations_id?}/{show_zeros?}', 'Logistic\InventoryController@index');
        // Route::get('inventory-grouped/{locations_id?}', 'Logistic\InventoryController@indexGrouped');
        // Route::get('stock/{locations_id}', 'Logistic\InventoryController@stock_location');
        // Route::get('stock-po/{locations_id}', 'Logistic\InventoryController@stock_location_po');
        // Route::get('stock-status/{locations_id}', 'Logistic\InventoryController@stock_status');
        // Route::get('real-price/{locations_id}/{products_id}', 'Logistic\InventoryController@real_price');
        // Route::get('real-price-id/{locations_id}/{products_id}', 'Logistic\InventoryController@real_price_id');
        // Route::get('inventory-by-location/{locations_id}', 'Logistic\InventoryController@inventoryByLocation');
        Route::get('history-product/{locations_id}/{product_id}/{showDeletes?}', 'Logistic\InventoryController@historyProduct');
        Route::get('kardex/{locations_id}/{product_id}/{showDeletes?}', 'Logistic\InventoryController@kardex');
        
        // /////////////////
        
        Route::put('locations-stages-session', 'Logistic\LocationsStagesController@session');
        Route::resource('locations-stages', 'Logistic\LocationsStagesController');
        // LABORATORY
        Route::Resource('lab-encharged-jobs', 'Lab\LabEnchargedJobsController');
        // CLINIC
        Route::Resource('clinic-doctors', 'Clinic\DoctorsController');
        Route::Resource('clinic-patients', 'Clinic\PatientsController');
        Route::Resource('instrument-history', 'Clinic\InstrumentHistoryController');
        // CREDENTIALS
        Route::resource('users', 'UsersController');
        Route::resource('user-modules', 'UserModulesController');
        Route::get('tickets-locations/{locations_id}', 'TicketsController@TicketsFromLocation');
        Route::resource('tickets', 'TicketsController');
        Route::put('requeriments-delete-list', 'Logistic\RequerimentDetailsController@deleteList');
    });
});

use App\Http\Controllers\TicketsController;

Route::group(['middleware' => 'auth'], function(){
    Route::get('/test', function(){
        $t = new TicketsController;
        $locations_id = 1;
        dd($t->TicketsFromLocation($locations_id, false));
    });
    Route::get('/tist', function(){
        dd(session()->all());
    });
});
