<?php namespace App\Api\Controllers;

use App\Api\Controllers\Controller;
use App\Models\Event;
use app\Api\Transformers\EventTransformer;

class EventController extends Controller
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new Event;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new EventTransformer;
    }
}
