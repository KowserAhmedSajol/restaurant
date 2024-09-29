<?php

namespace restaurant\restaurant\Controllers\Api;

use restaurant\restaurant\Models\ResTable;

class ResTableApiController extends ResTableApiBaseController
{
    public function getTables()
    {
        // Fetch all tables from the database
        $tables = ResTable::all();

        return response()->json($tables);
    }

    public function getTotalAvailableTables()
    {
        $availableTables = ResTable::where('is_occupied',0)->where('status', 1)->count();

        return response()->json([
            'availableTables' => $availableTables
        ]);
    }
}