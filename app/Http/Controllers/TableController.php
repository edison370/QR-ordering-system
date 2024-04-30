<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Str;
use Exception;

class TableController extends Controller
{
    public function getAll(Request $request)
    {
        $tables = Table::paginate(20);

        //remove page request
        $requestUrl = str_replace('&page=' . $request->page, '', $_SERVER["REQUEST_URI"]);

        return view('report.tableListResult', [
            'tables' => $tables, 'requestUrl' => $requestUrl
        ])->render();
    }

    public function updateTable(Request $request, $id)
    {
        try {
            $table = Table::find($id);
        } catch (Exception $ex) {
            return back()->withErrors('Table not found');
        }

        $validated = $request->validate([
            'description' => 'required|max:80',
            'isActive' => 'integer|between:0,1',
        ]);

        $table->description = $request->description;
        $table->isActive = $request->isActive;
        $table->save();

        return redirect('/tableList')->with('success', 'Successfully updated!');
    }

    public function createTable(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|max:80',
        ]);

        do {
            $code = Str::random(8);
        } while (Table::where("code", $code)->first());

        $table = new Table;
        $table->code = $code;
        $table->description = $request->description;
        $table->isActive = 1;
        $table->save();

        return redirect('/tableList')->with('success', 'Successfully added!');
    }

    public function getTable($id, Request $request)
    {
        $table = Table::find($id);
        return view('modals.editTableModal', ['table' => $table]);
    }

    public function setTable(Request $request)
    {
        $table = Table::where("code", $request->table)->first();

        if (!$table) {
            return response('Table not found');
        }

        return response('Table not found');
    }
}
