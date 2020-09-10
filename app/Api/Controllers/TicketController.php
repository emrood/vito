<?php namespace app\Api\Controllers;

use app\Api\Controllers\Controller;
use app\Models\Ticket;
use app\Api\Transformers\TicketTransformer;

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
