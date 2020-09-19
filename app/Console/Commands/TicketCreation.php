<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\EventProduct;
use App\Models\Ticket;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
//use SimpleSoftwareIO\QrCode\Generator;
use SimpleSoftwareIO\QrCode\Facade as Generator;


class TicketCreation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:create {--event=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        dd(config('constants.ticket.tag.regular'));
        $eventId = (int)$this->input->getOption('event');

        if ($eventId > 0) {
            $event = Event::find($eventId);
            if ($event) {
                $this->warn("Event found, Start creating tickets :");
                DB::delete('delete from tickets where event_id = ?', [$eventId]);

                if ($event->regular_qty > 0) {
                    // Regular ticket
                    $this->warn("Creating regular tickets =>");
                    $total = $event->regular_qty;
                    for ($i = 0; $i < $total; $i++) {
                        $ticket = new Ticket();
                        $ticket->user_id = $event->user_id;
                        $ticket->qr_code = \App\Http\Controllers\Controller::getUniqueSaltWithPrefix('TK');
                        $ticket->event_id = $event->id;
                        $ticket->status = config('constants.ticket.status.available');
                        $ticket->tag = config('constants.ticket.tag.regular');
                        $path = public_path('qrcodes\barcodes\\' . $ticket->qr_code . '.svg');
                        Generator::gradient(25, 25, 56, 58, 78, 96, 'vertical')->size(300)->encoding('UTF-8')->generate($ticket->qr_code, $path);
                        $ticket->image_path = 'qrcodes/barcodes/' . $ticket->qr_code . '.svg';
                        $ticket->encoding = base64_encode(file_get_contents(public_path('qrcodes\barcodes\\' . $ticket->qr_code . '.svg')));
                        $ticket->save();
                        $this->info('Ticket ' . $ticket->qr_code . ' saved ! ('.config('constants.ticket.tag.regular').')');
                    }
                }

                if ($event->vip_qty > 0) {
                    // vip ticket
                    $this->warn("Creating vip tickets =>");
                    $total = $event->vip_qty;
                    for ($i = 0; $i < $total; $i++) {
                        $ticket = new Ticket();
                        $ticket->user_id = $event->user_id;
                        $ticket->qr_code = \App\Http\Controllers\Controller::getUniqueSaltWithPrefix('TK');
                        $ticket->event_id = $event->id;
                        $ticket->status = config('constants.ticket.status.available');
                        $ticket->tag = config('constants.ticket.tag.vip');
                        $path = public_path('qrcodes\barcodes\\' . $ticket->qr_code . '.svg');
                        Generator::gradient(25, 25, 56, 58, 78, 96, 'vertical')->size(300)->encoding('UTF-8')->generate($ticket->qr_code, $path);
                        $ticket->image_path = 'qrcodes/barcodes/' . $ticket->qr_code . '.svg';
                        $ticket->encoding = base64_encode(file_get_contents(public_path('qrcodes\barcodes\\' . $ticket->qr_code . '.svg')));
                        $ticket->save();
                        $this->info('Ticket ' . $ticket->qr_code . ' saved ! ('.config('constants.ticket.tag.vip').')');
                    }
                }

                if ($event->guest_qty > 0) {
                    // guest ticket
                    $this->warn("Creating guest tickets =>");
                    $total = $event->guest_qty;
                    for ($i = 0; $i < $total; $i++) {
                        $ticket = new Ticket();
                        $ticket->user_id = $event->user_id;
                        $ticket->qr_code = \App\Http\Controllers\Controller::getUniqueSaltWithPrefix('TK');
                        $ticket->event_id = $event->id;
                        $ticket->status = config('constants.ticket.status.available');
                        $ticket->tag = config('constants.ticket.tag.guest');
                        $path = public_path('qrcodes\barcodes\\' . $ticket->qr_code . '.svg');
                        Generator::gradient(25, 25, 56, 58, 78, 96, 'vertical')->size(300)->encoding('UTF-8')->generate($ticket->qr_code, $path);
                        $ticket->image_path = 'qrcodes/barcodes/' . $ticket->qr_code . '.svg';
                        $ticket->encoding = base64_encode(file_get_contents(public_path('qrcodes\barcodes\\' . $ticket->qr_code . '.svg')));
                        $ticket->save();
                        $this->info('Ticket ' . $ticket->qr_code . ' saved ! ('.config('constants.ticket.tag.guest').')');
                    }
                }


            } else {
                $this->error('Event not found !');
            }
        } else {
            $this->error('Event not provided !');
        }

    }
}
