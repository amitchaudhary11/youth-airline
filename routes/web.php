<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();


Route::any('esewa/success', 'EsewaController@success')->name('esewa.success');
Route::any('esewa/fail', 'EsewaController@fail')->name('esewa.fail');


Route::get('/aircraftdetails', 'AircraftDetailController@index')->name('aircraftdetails.index')->middleware('adminauth');
Route::get('/aircraftdetails/create', 'AircraftDetailController@create')->name('aircraftdetails.create')->middleware('adminauth');
Route::post('/aircraftdetails', 'AircraftDetailController@store')->name('aircraftdetails.store')->middleware('adminauth');
Route::get('/aircraftdetails/aircraftid/edit', 'AircraftDetailController@edit')->name('aircraftdetails.edit')->middleware('adminauth');
Route::patch('/aircraftdetails/aircraftid', 'AircraftDetailController@update')->name('aircraftdetails.update')->middleware('adminauth');
Route::get('/aircraftdetails/activateaircraftid/edit', 'AircraftDetailController@activateEdit')->name('aircraftdetails.activateedit')->middleware('adminauth');
Route::patch('/aircraftdetails/activateaircraftid', 'AircraftDetailController@activateUpdate')->name('aircraftdetails.activateupdate')->middleware('adminauth');

Route::get('/flights', 'FlightController@index')->name('flights.index')->middleware('adminauth');
Route::get('/flights/create', 'FlightController@create')->name('flights.create')->middleware('adminauth');
Route::post('/flights', 'FlightController@store')->name('flights.store')->middleware('adminauth');
Route::get('/flights/{flight}/edit', 'FlightController@edit')->name('flights.edit')->middleware('adminauth');
Route::patch('/flights/{flight}', 'FlightController@update')->name('flights.update')->middleware('adminauth');
Route::get('/flights/deleteflights', 'FlightController@getDelete')->name('flights.getDelete')->middleware('adminauth');
Route::get('/flights/{flight}', 'FlightController@delete')->name('flights.delete')->middleware('adminauth');

Route::get('/admin/complete', 'AdminController@complete')->name('admin.complete')->middleware('adminauth');
Route::post('/admin/complete', 'AdminController@completed')->name('admin.completed')->middleware('adminauth');
Route::get('/admin/viewbookedtickets', 'AdminController@viewTicketForm')->name('admin.viewTicketForm')->middleware('adminauth');
Route::get('/admin', 'AdminController@index')->name('admin.show')->middleware('adminauth');
Route::post('/admin/listofbookedtickets', 'AdminController@viewTicket')->name('admin.viewTicket')->middleware('adminauth');
Route::get('/admin/getLogin', 'AdminController@getLogin')->name('admin.getLogin');
Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::get('/customer', 'CustomerController@index')->name('customers.index')->middleware('auth');
Route::get('/customer/tickets', 'CustomerController@show')->name('customers.show')->middleware('auth');
Route::get('/customer/contact', 'CustomerController@contact')->name('customers.contact')->middleware('auth');
Route::get('/customer/getcustomer', 'CustomerController@getcustomer')->name('customers.getcustomer')->middleware('adminauth');
Route::get('/customer/{delete}', 'CustomerController@delete')->name('customers.delete')->middleware('adminauth');

Route::get('/tickets/successfull', 'TicketController@success')->name('tickets.success')->middleware('auth');
Route::post('/tickets', 'TicketController@getTickets')->name('tickets.getTickets')->middleware('auth');
Route::get('/tickets/update', 'TicketController@update')->name('tickets.update')->middleware('auth');
Route::get('/tickets/cancel', 'TicketController@cancel')->name('tickets.cancel')->middleware('auth');
Route::post('/tickets/cancel', 'TicketController@getCancel')->name('tickets.getCancel')->middleware('auth');
Route::get('/tickets/cancelsuccessfull', 'TicketController@cancelsuccess')->name('tickets.cancelsuccess')->middleware('auth');
Route::post('/e-ticket', 'TicketController@eTicket')->name('tickets.eTicket')->middleware('auth');
Route::get('/download-eticket', 'TicketController@downloadEticket')->name('tickets.download')->middleware('auth');
Route::get('/send-eticket', 'TicketController@emailEticket')->name('tickets.send')->middleware('auth');

Route::get('/tickets/showavailableticketsform', 'TicketController@showAvailableTicketsForm')->name('tickets.showAvailableTicketsForm')->middleware('adminauth');
Route::post('/tickets/showavailabletickets', 'TicketController@showAvailableTickets')->name('tickets.showAvailableTickets')->middleware('adminauth');

Route::get('/passengers', 'PassengerController@store')->name('passengers.store')->middleware('auth');
Route::get('/passengers/create', 'PassengerController@create')->name('passengers.create')->middleware('auth');
Route::get('/passengers/pform', 'PassengerController@pform')->name('passengers.pform')->middleware('adminauth');
Route::post('/passengers/plist', 'PassengerController@index')->name('passengers.index')->middleware('adminauth');

Route::get('/searchflights', 'SearchFlightController@index')->name('searchflights.index')->middleware('auth');
Route::post('/searchflights/show', 'SearchFlightController@show')->name('searchflights.show')->middleware('auth');

Route::get('/payment', 'PaymentController@index')->name('payment.index')->middleware('adminauth');
Route::post('/payment/show', 'PaymentController@show')->name('payment.show')->middleware('adminauth');
Route::get('/payment/create', 'PaymentController@create')->name('payment.create')->middleware('auth');
Route::post('/payment', 'PaymentController@store')->name('payment.store')->middleware('auth');

Route::post('/send-mail', 'MailController@sendEmail');

Route::get('/blog', 'PostController@index')->name('posts.index');
Route::post('/blog', 'PostController@store')->name('posts.store');
Route::get('/blog/create', 'PostController@create')->name('posts.create');
Route::get('/blog/{slug}', 'PostController@show')->name('posts.show');
Route::get('/blog/{slug}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/blog/{slug}', 'PostController@update')->name('posts.update');
Route::delete('/blog/{slug}', 'PostController@destroy')->name('posts.destroy');

Route::get('/blogs', 'PostController@showBlog')->name('posts.showBlog');



// Route::get('/tickets', function() {
//     $jetdetails = \App\JetDetail::find(1001);

//     foreach ($jetdetails->flights as $flight) {
//         echo $flight->from_city . " , " . $flight->to_city . "<br>";
//     }
// });

// Route::get('/price', function () {
//     $flights = \App\Flight::where('flight_no', 'AA101')->get();
//     foreach ($flights as $flight) {
//         echo $flight->price;
//     }
// });

