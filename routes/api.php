<?php

use App\Models\Device;
use App\Models\EventAgent;
use App\Models\EventProduct;
use App\Models\Pointofsale;
use App\Models\Product;
use App\Models\StockLog;
use App\User;
use \App\Models\Event;
use \App\Models\Ticket;
use \App\Models\Role;
use Illuminate\Http\Request;
//use Knp\Snappy\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Barryvdh\DomPDF\Facade as PDFL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes();

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/test', function (Request $request) {
    return ['data' => true];
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'Auth\JwtController@login');
    Route::post('logout', 'Auth\JwtController@logout');
    Route::post('register', 'Auth\JwtController@register');
    Route::post('refresh', 'Auth\JwtController@refresh');
    Route::post('me', 'Auth\JwtController@me');
});

Route::post('login', 'Auth\PassportController@login');
Route::post('register', 'Auth\JwtController@register');

//Route::get('/users', [
//    'uses' => 'UserController@test',
//    'as' => 'users.test'
//]);

Route::get('/users', function (Request $request) {
    return response()->json(User::all(), 200);
});

Route::get('/devices', function (Request $request) {
    return response()->json(Device::all(), 200);
});

Route::post('/devices', function (Request $request) {
    // validate the form data
    $validator = Validator::make($request->input(),
        ['model' => 'required', 'manufacturer' => 'required', 'imei' => 'required'],
        ['model.required' => 'Device model is required', 'manufacturer.required' => 'Manufacturer is required', 'imei.required' => 'imei is required']
    );

    if ($validator->fails()) {
        Log::info(json_encode($validator));
        return response()->json($validator->errors()->first(), 404);
//        if ($validator->errors()->has('token')) {
//            return $this->sendError($validator->errors()->first('token'), 200);
//        } else {
//            return $this->sendError('Contact Server Administrator', 200);
//        }
    }

    $device = (Device::where('imei', $request->get('imei'))->first() !== null) ? Device::where('imei', $request->get('imei'))->first() : new Device();
    $device->fill($request->all());
    $device->save();
    return response()->json(['error' => false, 'message' => 'Device saved !'], 200);
});

Route::post('/pointofsales', function (Request $request) {
    // validate the form data
    $validator = Validator::make($request->input(),
        ['model' => 'required', 'manufacturer' => 'required', 'imei' => 'required', 'serial_number' => 'required'],
        ["model.required" => 'Device model is required', "manufacturer.required" => 'Manufacturer is required',]
    );

    if ($validator->fails()) {
        Log::info(json_encode($validator));
        return response()->json($validator->errors()->first(), 404);
    }

    $pointofsale = (Pointofsale::where('imei', $request->get('imei'))->first() !== null) ? Pointofsale::where('imei', $request->get('imei'))->first() : new Pointofsale();
    $pointofsale->fill($request->all());
    $pointofsale->save();
    return response()->json(['error' => false, 'message' => 'Pointofsale saved !'], 200);
});

Route::post('/products', function (Request $request) {
    // validate the form data
    $validator = Validator::make($request->input(),
        ['name' => 'required', 'barcode' => 'required|unique:products', 'user_id' => 'required'],
        ['name.required' => 'Product name is required', 'user_id.required' => 'User is required', 'barcode.required' => 'Barcode is required', 'barcode.unique' => 'Ce barcode existe deja !']
    );

    if ($validator->fails()) {
        Log::info(json_encode($validator));
        return response()->json(['error' => true, 'message' => $validator->errors()->first()], 401);
    }

    $product = (Product::where('barcode', $request->get('barcode'))->first() !== null) ? Product::where('barcode', $request->get('barcode'))->first() : new Product();
    $product->fill($request->all());
    $product->save();
    return response()->json(['error' => false, 'message' => 'Product saved !'], 200);
});

Route::post('/products/sold', function (Request $request) {
    // validate the form data
    $validator = Validator::make($request->input(),
        ['event_id' => 'required', 'barcode' => 'required', 'quantity' => 'required', 'cashier_user_id' => 'required', 'stock_user_id' => 'required'],
        ['event_id.required' => 'Event is required', 'barcode.required' => 'Product is required', 'cashier_user_id.required' => 'Cashier is required', 'stock_user_id.required' => 'Stock manager is required']
    );

    if ($validator->fails()) {
        return response()->json(['error' => true, 'message' => $validator->errors()->first()], 401);
    }

    try{
        $barcode = $request->get('barcode');
        $product = Product::where('barcode', $barcode)->first();
        if(!empty($product)){
            EventProduct::where('event_id', $request->get('event_id'))->where('product_id', $product->id)->first()->increment('sold', $request->get('quantity'));
            unset($request->barcode);
            $stockLog = new StockLog();
            $stockLog->fill($request->all());
            $stockLog->event_product_id = EventProduct::where('event_id', $request->get('event_id'))->where('product_id', $product->id)->first()->id;
            $stockLog->save();
            return response()->json(['error' => false, 'message' => 'Sale registered !'], 200);
        }else{
            return response()->json(['error' => true, 'message' => 'Product not found'], 401);
        }
    }catch (\Exception $e){
        return response()->json(['error' => true, 'message' => 'Cannot register sale : '. $e->getMessage()], 401);
    }
});

Route::post('/products/initial', function (Request $request) {
    // validate the form data
    $validator = Validator::make($request->input(),
        ['event_id' => 'required', 'product_id' => 'required', 'quantity' => 'required', 'user_id' => 'required'],
        ['event_id.required' => 'Event is required', 'user_id.required' => 'User is required', 'product_id.required' => 'Product is required', 'quantity.required' => 'Quantity is required']
    );

    if ($validator->fails()) {
        return response()->json(['error' => true, 'message' => $validator->errors()->first()], 401);
    }

    $user = User::find($request->user_id);

    if($user){
        if($user->roles->first()->name === config('constants.user.roles.administrator') || $user->roles->first()->name === config('constants.user.roles.supervisor')){
            try{
                $event_product = EventProduct::where('event_id', $request->get('event_id'))->where('product_id', $request->get('product_id'))->first();
                $event_product->initial = $request->quantity;
                $event_product->save();
                return response()->json(['error' => false, 'message' => 'inital Stock registered !'], 200);
            }catch (\Exception $e){
                return response()->json(['error' => true, 'message' => 'Cannot register stock : '. $e->getMessage()], 401);
            }
        }
    }

    return response()->json(['error' => true, 'message' => 'Action non autorisée'], 401);
});

Route::get('/products', function (Request $request) {
    return response()->json(Product::all(), 200);
});

Route::get('/pointofsales', function (Request $request) {
    return response()->json(Pointofsale::all(), 200);
});

Route::get('/events/products', function (Request $request) {
    if ($request->has('event_id')) {
        return response()->json(EventProduct::where('event_id', $request->get('event_id'))->with('product')->get(), 200);
    }
    return response()->json(['error' => true, 'message' => 'Event id not provided'], 401);
});

Route::post('/events/products', function (Request $request) {

    $validator = Validator::make($request->input(),
        ['event_id' => 'required', 'product_id' => 'required', 'initial' => 'required', 'currency' => 'required'],
        ['event_id.required' => 'Event is required', 'product_id.required' => 'Product is required', 'initial.required' => 'Quantity is required', 'currency.required' => 'Currency is required']
    );

    if ($validator->fails()) {
        return response()->json(['error' => true, 'message' => $validator->errors()->first()], 404);
    }

    if(EventProduct::where('event_id', $request->event_id)->where('product_id', $request->product_id)->first() === null){
        try{
            $eventProduct = new EventProduct();
            $eventProduct->fill($request->all());
            $eventProduct->save();
            return response()->json(['error' => false, 'message' => 'Evenement lie au produit avec succes'], 200);
        }catch (\Exception $e){
            return response()->json(['error' => true, 'message' => 'Cannot register product on this event : '. $e->getMessage()], 422);
        }
    }else{
        return response()->json(['error' => true, 'message' => 'Event already linked to this product'], 401);
    }
});

Route::get('/user/tickets', function (Request $request) {
    if ($request->has('user_id')) {
        return response()->json(Ticket::join('user_tickets', 'tickets.id', '=', 'user_tickets.ticket_id')->where('user_tickets.user_id', $request->get('user_id'))->where('user_tickets.status', 'active')->get(), 200);
    }
    return response()->json(['error' => true, 'message' => 'User id not provided'], 405);
});

Route::get('/user/devices', function (Request $request) {
    if ($request->has('user_id')) {
        return response()->json(Device::where('.user_id', $request->get('user_id'))->get(), 200);
    }
    return response()->json(['error' => true, 'message' => 'User id not provided'], 405);
});

Route::get('/events', function (Request $request) {
    if (!empty($request->all()) && $request->has('user_id')) {
        return response()->json(Event::where('user_id', $request->user_id)->where('status', 1)->get(), 200);
    }
    return response()->json(Event::where('status', 1)->get(), 200);
});

Route::get('/tickets', function (Request $request) {
    if (!empty($request->all())) {

        if ($request->has('event_id')) {
            $tickets = Ticket::where('event_id', $request->event_id)->where('checked', true);
            if ($request->has('status')) {
                $tickets = $tickets->where('status', $request->status);
            }

            if ($request->has('tag')) {
                $tickets = $tickets->where('tag', $request->tag);
            }

            if ($request->has('count')) {
                if ($request->count) {
                    return response()->json($tickets->count(), 200);
                }
            } elseif ($request->has('only')) {
                return response()->json($tickets->get(explode(',', $request->only)), 200);
            }

            return response()->json($tickets->with('user')->get(), 200);
        } else if ($request->has('code')) {
            return response()->json(Ticket::where('qr_code', $request->code)->first(), 200);
        }
    }
    return response()->json(['error' => true, 'message' => 'Event not provided'], 401);
});

Route::get('/roles', function (Request $request) {
    return response()->json(Role::all(), 200);
});

Route::get('/role/user', function (Request $request) {
    if (!empty($request->all())) {
        if ($request->has('user_id')) {
            return response()->json(User::find($request->user_id)->roles, 200);
            //return response()->json(\DB::select('select * from user_role where user_id = ?', [$request->user_id]), 200);
        }
    }
    return response()->json(['error' => true, 'message' => 'user not provided'], 500);
});

Route::get('/events/tickets', function (Request $request) {

    if (!empty($request->all()) && $request->has('event_id')) {
        $event = Event::find($request->event_id);
        if ($event) {
            //$tickets = Ticket::where('event_id', $event->id)->skip(436)->take(72)->get();
            $tickets = Ticket::where('event_id', $event->id)->skip(0)->take(72)->get();
//            $pdf = PDF::loadView('print.event_tickets', compact('event', 'tickets'));
////            $pdf = SnappyPdf::loadView('print.event_tickets', compact('event', 'tickets'));
//            return $pdf->download('document.pdf');
//            return $pdf->stream('document.pdf');
            return view('print.event_tickets', compact('event', 'tickets'));
        }
    }
    return abort(500, 'event not defined');
});

Route::post('/ticket', function (Request $request) {
    if (!empty($request->all())) {

        if ($request->has('qr_code')) {
            Log::info('has qr');
        } else {
            Log::error('no qr found');
        }
        Log::info(json_encode($request->all()));
        $ticket = Ticket::where('qr_code', $request->qr_code)->where('checked', true)->first();
        if ($ticket) {
            if ($request->status !== $ticket->status) {
                $user = User::find($request->user_id);
                $ticket->status = $request->status;
                $ticket->save();
                return response()->json(['error' => false, 'message' => 'ticket status set to ' . $request->status], 200);
            }
            Log::error('Trying to double entry ticket #' . $ticket->qr_code);
            return response()->json(['error' => true, 'message' => 'ticket status already set to ' . $request->status . ' !'], 401);
        }
        Log::error('ticket not checked or cancelled : ' . $request->qr_code);
        return response()->json(['error' => true, 'message' => 'ticket not checked or cancelled !'], 401);
    }

    return response()->json(['error' => true, 'message' => 'no data !'], 401);
});

Route::post('/tickets/checked', function (Request $request) {
	
	$validator = Validator::make($request->input(),
        ['qr_code' => 'required', 'user_id' => 'required'],
        ['qr_code.required' => 'QR is required', 'user_id.required' => 'User is required']
    );

    if ($validator->fails()) {
        return response()->json(['error' => true, 'message' => $validator->errors()->first()], 401);
    }
	
	
    $user = User::find($request->user_id);
	
	if($user){
		if($user->roles()->first()->name === config('constants.user.roles.administrator') || $user->roles()->first()->name === config('constants.user.roles.supervisor')){
			$ticket = Ticket::where('checked', false)->where('qr_code', $request->qr_code)->first();
			if($ticket){
				$ticket->checked = true;
				$ticket->save();
				return response()->json(['error' => false, 'message' => 'Ticket activation successfull !'], 200);
			}
		}
		
		return response()->json(['error' => true, 'message' => 'Action not permitted'], 401);
	}

    return response()->json(['error' => true, 'message' => 'no data !'], 401);
});

Route::get('/user/assign', function (Request $request) {
    $validator = Validator::make($request->input(),
        ['user_id' => 'required'],
        ['user_id.required' => 'User is required']
    );

    if ($validator->fails()) {
        return response()->json(['error' => true, 'message' => $validator->errors()->first()], 401);
    }

    if(!empty(EventAgent::where('status', 'enable')->where('user_id', $request->user_id)->first())){
        return response()->json(EventAgent::where('status', 'enable')->where('user_id', $request->user_id)->with('event')->first(), 200);
    }

    return response()->json(['error' => true, 'message' => 'assignation non trouvé'], 401);
});

Route::post('/user/assign', function (Request $request) {
    $validator = Validator::make($request->input(),
        ['event_id' => 'required', 'user_id' => 'required'],
        ['event_id.required' => 'Event is required', 'user_id.required' => 'User is required']
    );

    if ($validator->fails()) {
        return response()->json(['error' => true, 'message' => $validator->errors()->first()], 401);
    }

    if(empty(EventAgent::where('user_id', $request->user_id)->where('event_id', $request->event_id)->first())){
        $eventAgent = new EventAgent();
        $eventAgent->user_id = $request->get('user_id');
        $eventAgent->event_id = $request->get('event_id');
        $eventAgent->status = 'enable';
        $eventAgent->save();
        return response()->json(['error' => false, 'message' => 'Assign succès !'], 200);
    }else{
        return response()->json(['error' => true, 'message' => 'Assignation deja enregistrée'], 401);
    }
});
