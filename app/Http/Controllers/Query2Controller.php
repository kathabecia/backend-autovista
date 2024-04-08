<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Query2Controller extends Controller
{

public function querySupplier(Request $request)
{
    // Initialize the query builder with the base SQL query
    $query = DB::table("vehicles")
        ->select("vehicles.VIN", "customers.customer_name AS Customer", "engines.created_at AS EngineCreatedDate")
        ->join("customers", "vehicles.VIN", "=", "customers.VIN")
        ->join("engines", "vehicles.VIN", "=", "engines.VIN")
        ->join("suppliers", "vehicles.model_id", "=", "suppliers.model_id");

    if ($request->has('start_date') && $request->has('end_date')) {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        // Assuming 'engines.created_at' is the correct column name for the creation date of engines
        $query->whereBetween('engines.created_at', [$startDate, $endDate]);
    }

    $perPage = 10;
    $vehicles = $query->paginate($perPage);

    return $vehicles;
}




    
}
