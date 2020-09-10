<?php namespace App\Api\Controllers;

use App\Api\Controllers\Controller;
use App\User;
use App\Api\Transformers\UserTransformer;

class UserController extends Controller
{
    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return new User;
    }

    /**
     * Transformer for the current model.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    protected function transformer()
    {
        return new UserTransformer;
    }

    protected function test(){
        return response()->json('test', 200);
    }
}
