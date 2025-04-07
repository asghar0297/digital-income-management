<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    use ApiResponser;
    public function index()
    {
        $title = 'Dashboard';
        return view('dashboard.index',compact('title'));
    }

    public function getExpenseByCategories(){
        try{

            $data = DB::select("SELECT 
                        c.category,
                        SUM(t.amount) AS total,
                        ROUND((SUM(t.amount) / total_expense.total) * 100, 2) AS percentage
                    FROM transcations t
                    INNER JOIN categories c ON c.id = t.category_id
                    JOIN (
                        SELECT SUM(amount) AS total
                        FROM transcations
                        WHERE type = 'expense'
                        AND date BETWEEN '2025-04-01' AND '2025-04-30'
                        AND deleted_at IS NULL
                    ) AS total_expense
                    WHERE t.type = 'expense'
                    AND t.date BETWEEN '2025-04-01' AND '2025-04-30'
                    AND t.deleted_at IS NULL
                    GROUP BY t.category_id, c.category, total_expense.total;");
                

            return $this->success($data,"Data fetch successfully",200);
        }catch(\Exception $e){
            return $this->error("Something went wrong",500);
        }
    }
    public function getDailyExpenseChart(Request $request){
        try{

            $from = $this->getDates('monthly')['from'];
            $to = $this->getDates('monthly')['to'];
            $data = DB::select("SELECT 
                        d.day,
                        IFNULL(SUM(ABS(t.amount)), 0) AS amount
                    FROM 
                        (
                            SELECT 1 AS day UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL
                            SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL
                            SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15 UNION ALL
                            SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19 UNION ALL SELECT 20 UNION ALL
                            SELECT 21 UNION ALL SELECT 22 UNION ALL SELECT 23 UNION ALL SELECT 24 UNION ALL SELECT 25 UNION ALL
                            SELECT 26 UNION ALL SELECT 27 UNION ALL SELECT 28 UNION ALL SELECT 29 UNION ALL SELECT 30 UNION ALL SELECT 31
                        ) AS d
                    LEFT JOIN transcations t 
                        ON DAY(t.date) = d.day 
                         AND t.deleted_at IS NULL 
                        AND t.type = 'expense'
                        AND t.date BETWEEN '$from' AND '$to'
                    GROUP BY d.day
                    ORDER BY d.day;");
                

            return $this->success($data,"Data fetch successfully",200);
        }catch(\Exception $e){
            return $this->error("Something went wrong",500);
        }
    }
    public function getMonthlyExpenseChart(Request $request){
        try{

            $data = DB::select("SELECT 
                                        DATE_FORMAT(MAKEDATE(YEAR(CURDATE()), 1) + INTERVAL d.month - 1 MONTH, '%b') AS month,
                                        IFNULL(SUM(ABS(t.amount)), 0) AS amount
                                    FROM 
                                        (
                                            SELECT 1 AS month UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL
                                            SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL
                                            SELECT 11 UNION ALL SELECT 12
                                        ) AS d
                                    LEFT JOIN transcations t 
                                        ON MONTH(t.date) = d.month 
                                        AND YEAR(t.date) = YEAR(CURDATE())
                                        AND t.deleted_at IS NULL 
                                        AND t.type = 'expense'
                                    GROUP BY d.month
                                    ORDER BY d.month;");
                

            return $this->success($data,"Data fetch successfully",200);
        }catch(\Exception $e){
            return $this->error("Something went wrong",500);
        }
    }
    public function getExpenses(Request $request){
        try{

            $from = $this->getDates('weekly')['from'];
            $to = $this->getDates('weekly')['to'];

            $transactions = DB::select("SELECT 
                        t.date,
                        c.category,
                        a.name as account_name,
                        t.amount,
                        t.type,
                        total_expense,
                        total_balance
                    FROM transcations t
                    INNER JOIN categories c ON c.id = t.category_id
                    INNER JOIN accounts a ON a.id = t.account_id 
                    JOIN (
                        SELECT SUM(amount) AS total_expense
                        FROM transcations
                        where date BETWEEN '$from' AND '$to'
                        and type = 'expense'
                        AND deleted_at IS NULL
                    ) AS total_expense
                    JOIN (
                        SELECT SUM(current_balance) AS total_balance
                        FROM accounts
                    ) AS total_balance
                    where t.date BETWEEN '$from' AND '$to'
                    AND t.deleted_at IS NULL
                    order by t.created_at desc");
            
        $data['transactions'] = view('dashboard.transaction',compact('transactions'))->render();
        $data['total_expense'] = $transactions[0]->total_expense ?? 0;
        $data['total_balance'] = $transactions[0]->total_balance ?? 0;
                

            return $this->success($data,"Data fetch successfully",200);
        }catch(\Exception $e){
            dd($e);
            return $this->error("Something went wrong",500);
        }
    }
    
    public function getAccounts(Request $request){
        try{

            
        $accounts = DB::select("SELECT id,name,current_balance FROM accounts where status = 1 and deleted_at is null");
            
        $data['transactions'] = view('dashboard.accounts',compact('accounts'))->render();
      
            return $this->success($data,"Data fetch successfully",200);
        }catch(\Exception $e){
            dd($e);
            return $this->error("Something went wrong",500);
        }
    }

    public function getDates($duration){

        switch( $duration ){
            case "daily":
                $from = Carbon::today();
                $to = Carbon::today();
            break;
            case "weekly":
                $from =  Carbon::now()->startOfWeek();
                $to = Carbon::now()->endOfWeek();
            break;
            case "monthly":
                $from = Carbon::now()->startOfMonth(); 
                $to = Carbon::now()->endOfMonth();  
            break;
            case "yearly":
                $from = Carbon::now()->startOfYear(); 
                $to = Carbon::now()->endOfYear();  
            break;
            default;
                $from = Carbon::today();
                $to = Carbon::today();
                break;
        }

        return ['from' => $from, 'to'=> $to];

    }
}
