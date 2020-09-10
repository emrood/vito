<?php namespace app/Api\Controllers;

use app/Api\Controllers\Controller;
use app/Ticket;
use app/Api\Transformers\app/TicketTransformer;

class app/TicketController extends Controller
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new app/Ticket;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new app/TicketTransformer;
    }
}
