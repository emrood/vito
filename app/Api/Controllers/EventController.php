<?php namespace app/Api\Controllers;

use app/Api\Controllers\Controller;
use app/Event;
use app/Api\Transformers\app/EventTransformer;

class app/EventController extends Controller
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new app/Event;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new app/EventTransformer;
    }
}
