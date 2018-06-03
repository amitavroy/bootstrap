<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Valuestore\Valuestore;

class SettingsController extends Controller
{
    private $valueStore;

    /**
     * SettingsController constructor.
     */
    public function __construct()
    {
        $pathToFile = storage_path('settings.json');
        $this->valueStore = Valuestore::make($pathToFile);
    }

    public function index()
    {
        $data = $this->valueStore->all();

        if (count($data) == 0) {
            $data = 'Empty';
        }

        return view('settings.index', compact('data'));
    }

    public function add(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'value' => 'required',
        ]);

        $this->valueStore->put($data['name'], $data['value']);

        return redirect()->route('settings.index');
    }
}
