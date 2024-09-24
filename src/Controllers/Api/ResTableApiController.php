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
}