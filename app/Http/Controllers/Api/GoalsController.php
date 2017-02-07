<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function index()
    {
        return Goal::all();
    }

    public function show($id)
    {
        return Goal::findOrFail($id);
    }

    public function create(Request $request)
    {
        return \Auth::user()->goals()->create($request->all());
    }

    public function update(Request $request, $id)
    {
        $goal = Goal::findOrFail($id);
        return ($goal->fill($request->all())->save()) ? $goal : ['status' => 'error'];
    }

    public function delete($id)
    {
        $result = Goal::where('id', $id)->delete();
        return ($result) ? ['status' => 'success'] : ['status' => 'error'];
    }
}
