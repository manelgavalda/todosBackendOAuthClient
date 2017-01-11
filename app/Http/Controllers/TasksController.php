<?php

namespace App\Http\Controllers;

use App\AccessToken;
use Illuminate\Http\Request;

/**
 * Class TasksController
 * @package App\Http\Controllers
 */
class TasksController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $access_token = null;
        try {

            $access_token = AccessToken::where('user_id',1)->token;
        } catch (\Exception $e) {

            redirect('/redirect');
        }
        $data = [
            "access_token" => $access_token
        ];
        return view('tasks',$data);
    }

}
