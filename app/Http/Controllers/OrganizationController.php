<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    // get all organizations
    public function getAllOrganizations(Request $request)
    {
        $query = Organization::query();

        if ($request->filled('search')) {
            $search = strtolower($request->string('search'));
            $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
        }

        // pagination
        $page = min($request->integer('perPage', 15), 100);
        $organizations = $query->paginate($page);

        return [
            "status" => 200,
            "message" => "Successful",
            "data" => $organizations
        ];

    }

    // create organization
    public function createOrganization(Request $request)
    {
        return [
            "status" => 402,
            "message" => "Organization created successfully",
            "data" => []
        ];
    }
}
