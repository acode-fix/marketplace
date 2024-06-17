<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Auditlog;

class AuditlogController extends Controller
{

    // Function to display audit logs
    /**
     * Display a listing of the resource.
     */

    public function index(){

        $logs = Auditlog::with('user')->orderByDesc('created_at')->get();
        return view('audit_logs.index', ['logs' => $logs]);
//         $clientIP = request()->ip();
// dd($clientIP);
        // dd($request->ip());
        // $clientIP = \Request::ip();
        // dd($clientIP);
        // $clientIP = \Request::getClientIp(true);
        // dd($clientIP);
      }


    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
        $clientIP = request()->ip();
        //dd($clientIP);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // private $userInstance = "\App\Models\User";

    // public function __construct()
    // {
    //     $userInstance = config('user-activity.model.user');
    //     if (!empty($userInstance)) $this->userInstance = $userInstance;
    // }

    // private function handleData(Request $request)
    // {
    //     $this->validate($request, [
    //         'action'    => 'required|string',
    //         'user_id'   => 'sometimes|numeric',
    //         'view_type'  => 'sometimes|string',
    //         'username'     => 'sometimes|string',
    //         'IP_address'     => 'sometimes|string',
    //         'date' => 'sometimes|date_format:Y-m-d',
    //     ]);

    //     $data = Auditlog::with('user')->orderBy('id', 'desc');
    //     if ($request->has('user_id')) {
    //         $data = $data->where('user_id', request('user_id'));
    //     }
    //     if ($request->has('view_type')) {
    //         $data = $data->where('view_type', request('view_type'));
    //     }
    //     if ($request->has('table')) {
    //         $data = $data->where('username', request('username'));
    //     }
    //     if ($request->has('date')){
    //         $data = $data->where('date', request('date'));
    //     }

    //     return $data->paginate(10);
    // }

    // private function handleCurrentData(Request $request)
    // {
    //     $this->validate($request, [
    //         'table'  => 'required|string',
    //         'id'     => 'required',
    //         'log_id' => 'required|numeric'
    //     ]);

    //     $table = request('table');
    //     $id = request('id');
    //     $logId = request('log_id');
    //     $currentData = DB::table($table)->find($id);
    //     if ($currentData) {
    //         $editHistory = Auditlog::with('user')
    //             ->orderBy('log_date', 'desc')
    //             ->whereNotIn('id', [$logId])
    //             ->where(['table_name' => $table, 'log_type' => 'edit'])
    //             ->whereRaw('data like ?', array('%"id":"' . $id . '"%'))->get();
    //         return ['current_data' => $currentData, 'edit_history' => $editHistory];
    //     }
    //     return [];
    // }

    // private function handleUserAutocomplete(Request $request)
    // {
    //     $this->validate($request, [
    //         'user' => 'required|string|max:50'
    //     ]);

    //     $user = request('user');
    //     return $this->userInstance::select('id', 'name', 'email')
    //         ->where('name', 'like', '%' . $user . '%')
    //         ->orWhere('id', $user)
    //         ->limit(10)->get();
    // }

    // public function getIndex(Request $request)
    // {

    //     if ($request->has('action')) {
    //         $action = $request->get('action');
    //         switch ($action) {
    //             case 'data':
    //                 return response()->json($this->handleData($request));
    //                 break;

    //             case 'current_data':
    //                 return response()->json($this->handleCurrentData($request));
    //                 break;

    //             case 'user_autocomplete':
    //                 return response()->json($this->handleUserAutocomplete($request));
    //                 break;
    //         }
    //     }

    //     $connection = config('database.default');
    //     $driver = DB::connection($connection)->getDriverName();
    //     switch ($driver) {
    //         case 'pgsql':
    //             $sql = sprintf(
    //                 "SELECT table_name FROM information_schema.tables where table_schema = '%s' ORDER BY table_schema,table_name;",
    //                 DB::connection($connection)->getConfig('schema') ?: 'public'
    //             );
    //             $all = array_map('current', DB::select($sql));
    //             break;
    //         case 'sqlite':
    //             $sql = "SELECT name as table_name FROM sqlite_master WHERE type='table' ORDER BY name";
    //             $all = array_map('current', DB::select($sql));
    //             break;
    //         default:
    //             $all = array_map('current', DB::select('SHOW TABLES'));
    //     }

    //     $exclude = ['failed_jobs', 'password_resets', 'migrations', 'logs'];
    //     $tables = array_diff($all, $exclude);

    //     return view('LaravelUserActivity::index', ['tables' => $tables]);

    // }

    // public function handlePostRequest(Request $request)
    // {
    //     if ($request->has('action')) {
    //         $action = $request->get('action');
    //         switch ($action) {
    //             case 'delete':
    //                 $dayLimit = config('user-activity.delete_limit');
    //                 Auditlog::whereRaw('log_date < NOW() - INTERVAL ? DAY', [$dayLimit])->delete();
    //                 return ['success' => true, 'message' => "Successfully deleted log data older than $dayLimit days"];
    //                 break;
    //         }
    //     }
    // }
}
