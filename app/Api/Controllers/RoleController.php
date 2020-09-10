<?php namespace app/Api\Controllers;

use app/Api\Controllers\Controller;
use app/Role;
use app/Api\Transformers\app/RoleTransformer;

class app/RoleController extends Controller
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new app/Role;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new app/RoleTransformer;
    }
}
