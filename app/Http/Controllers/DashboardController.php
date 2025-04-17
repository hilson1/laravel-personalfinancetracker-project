<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income; 
use App\Models\Expense;

class DashboardController extends Controller
{
    public function index()
    {
        // Example data: fetching income and expense for the dashboard
        $totalIncome = Income::sum('amount');
        $totalExpense = Expense::sum('amount');
        $balance = $totalIncome - $totalExpense;

        return view('dashboard', compact('totalIncome', 'totalExpense', 'balance'));
    }
}
