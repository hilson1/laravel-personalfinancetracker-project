<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

class IncomeController extends Controller
{
    public function create()
    {
        return view('income-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'category' => 'required|string',
            'date' => 'required|date',
            'comment' => 'nullable|string',
        ]);

        Income::create($validated);

        return redirect()->back()->with('success', 'Income added successfully!');
    }
}

?>