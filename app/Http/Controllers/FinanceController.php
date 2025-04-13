namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function predictMonthlyExpense()
    {
        $monthlyData = DB::table('your_table_name') // Replace with your table name
            ->selectRaw('MONTH(date) as month, SUM(amount) as total')
            ->groupBy(DB::raw('MONTH(date)'))
            ->orderBy(DB::raw('MONTH(date)'))
            ->get();

        $x = []; // Months (1 to 12)
        $y = []; // Total amount

        foreach ($monthlyData as $data) {
            $x[] = $data->month;
            $y[] = $data->total;
        }

        $prediction = $this->linearRegression($x, $y);

        return view('finance.prediction', [
            'months' => $x,
            'totals' => $y,
            'predicted_month' => $prediction['next_month'],
            'predicted_value' => $prediction['predicted_value'],
        ]);
    }

    private function linearRegression($x, $y)
    {
        $n = count($x);
        if ($n == 0) return null;

        $x_sum = array_sum($x);
        $y_sum = array_sum($y);
        $xy_sum = 0;
        $x2_sum = 0;

        for ($i = 0; $i < $n; $i++) {
            $xy_sum += $x[$i] * $y[$i];
            $x2_sum += $x[$i] * $x[$i];
        }

        $slope = ($n * $xy_sum - $x_sum * $y_sum) / ($n * $x2_sum - $x_sum * $x_sum);
        $intercept = ($y_sum - $slope * $x_sum) / $n;

        $nextMonth = max($x) + 1;
        $predicted = $slope * $nextMonth + $intercept;

        return [
            'next_month' => $nextMonth,
            'predicted_value' => round($predicted, 2),
        ];
    }
}
