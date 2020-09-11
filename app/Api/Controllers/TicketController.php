<?php namespace App\Api\Controllers;

use App\Api\Controllers\Controller;
use App\Models\Ticket;
use App\Api\Transformers\TicketTransformer;

class TicketController extends Controller
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new Ticket;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new TicketTransformer;
    }
}
