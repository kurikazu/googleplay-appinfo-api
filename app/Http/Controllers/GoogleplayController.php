<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\InfoService;
use Illuminate\Http\Request;

class GoogleplayController extends Controller
{
    /** @var InfoService */
    protected $info;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InfoService $info)
    {
        $this->info = $info;
    }

    public function getInfo(Request $request)
    {
        $result = $this->info->getInfo($request->input('id'), $request->input('hl'));
        return response()->json($result);
    }
}
