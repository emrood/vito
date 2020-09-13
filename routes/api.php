<?php

use App\User;
use \App\Models\Event;
use \App\Models\Ticket;
use \App\Models\Role;
use Illuminate\Http\Request;
//use Knp\Snappy\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Barryvdh\DomPDF\Facade as PDFL;
use Illuminate\Support\Facades\Log;

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

Route::get('/users', [
    'uses' => 'UserController@test',
    'as' => 'users.test'
]);

Route::get('/users', function (Request $request) {
    return response()->json(User::all(), 200);
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
            $tickets = Ticket::where('event_id', $request->event_id);
            if ($request->has('status')) {
                $tickets = $tickets->where('status', $request->status);
            }

            if ($request->has('count')) {
                if ($request->count) {
                    return response()->json($tickets->count(), 200);
                }
            } elseif ($request->has('only')) {
                return response()->json($tickets->get(explode(',', $request->only)), 200);
            }

            return response()->json($tickets->get(), 200);
        } else if ($request->has('code')) {
            return response()->json(Ticket::where('qr_code', $request->code)->first(), 200);
        }
    }
    return response()->json(['error' => true, 'message' => 'Event not provided'], 500);
});

Route::get('/roles', function (Request $request) {
    return response()->json(Role::all(), 200);
});

Route::get('/role/user', function (Request $request) {
    if(!empty($request->all())){
        if($request->has('user_id')){
            //return response()->json(User::find($request->user_id)->roles->first(), 200);
            return response()->json(\DB::select('select * from user_role where user_id = ?', [$request->user_id])[0], 200);
        }
    }
    return response()->json(['error' => true, 'message' => 'user not provided'], 500);
});

Route::get('/events/generateBarcodes', function (Request $request) {
    if(!empty($request->all()) && $request->has('event_id')){
        $tickets = Ticket::where('event_id', $request->event_id)->get();
        foreach ($tickets as $ticket){
            $path = public_path('qrcodes\barcodes\\' . $ticket->qr_code.'.svg');
            $qrcode = new SimpleSoftwareIO\QrCode\Generator();
            $qrcode->generate($ticket->qr_code, $path);
            $ticket->image_path = 'qrcodes/barcodes/' . $ticket->qr_code.'.svg';
            $ticket->save();
        }

        return response()->json(Ticket::where('event_id', $request->event_id)->get(), 200);
    }
    return response()->json('error', 500);
});

Route::get('/events/generateTickets', function (Request $request) {
    if (!empty($request->all()) && $request->has('event_id')) {
        $event = Event::find($request->event_id);
        if ($event) {
            if ($event->ticket_qty > 0) {
//                \DB::delete('delete from tickets where event_id = ?', [$request->event_id]);
                for ($i = 0; $i < $event->ticket_qty; $i++) {
                    $ticket = new Ticket();
                    $ticket->user_id = $event->user_id;
                    $ticket->qr_code = \App\Http\Controllers\Controller::getUniqueSaltWithPrefix('TK');
                    $ticket->event_id = $event->id;
//                    $ticket->status = config('constants.status.available');
//                    $qrcode->style('dot', 0.7);
                    $ticket->status = 'available';
                    $path = public_path('qrcodes\barcodes\\' . $ticket->qr_code . '.svg');
                    $qrcode = new SimpleSoftwareIO\QrCode\Generator();
                    $qrcode->gradient(25, 25, 56, 58, 78, 96, 'vertical');
                    $qrcode->generate($ticket->qr_code, $path);
                    $qrcode->size(300);
                    $qrcode->encoding('UTF-8');
                    $qrcode->merge(public_path('\images\logo_qr.png'), 0.4, true);
                    $ticket->image_path = 'qrcodes/barcodes/' . $ticket->qr_code . '.svg';
                    $ticket->encoding = base64_encode(file_get_contents(public_path('qrcodes\barcodes\\' . $ticket->qr_code . '.svg')));
                    $ticket->save();
                }
            }
        }

        return response()->json(Ticket::where('event_id', $request->event_id)->get(), 200);
    }
    return response()->json('error', 500);
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
		
		if($request->has('qr_code')){
			Log::info('has qr');
		}else{
			Log::error('no qr found');
		}
        Log::info(json_encode($request->all()));
        $ticket = Ticket::where('qr_code', $request->qr_code)->where('checked', true)->where('status', '!=', 'cancelled')->first();
        if ($ticket) {
            if ($request->status !== $ticket->status) {
                $user = User::find($request->user_id);
                $ticket->status = $request->status;
                $ticket->save();
                return response()->json(['error' => false, 'message' => 'ticket status set to ' . $request->status], 200);
            }
            
            return response()->json(['error' => true, 'message' => 'ticket status already set to ' . $request->status.' !'], 500);
        }

        return response()->json(['error' => true, 'message' => 'ticket not checked or cancelled !'], 500);
    }

    return response()->json(['error' => true, 'message' => 'no data !'], 500);
});
