<?php namespace app/Api\Controllers;

use app/Api\Controllers\Controller;
use app/User;
use app/Api\Transformers\app/UserTransformer;

class app/UserController extends Controller
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new app/User;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new app/UserTransformer;
    }
}
