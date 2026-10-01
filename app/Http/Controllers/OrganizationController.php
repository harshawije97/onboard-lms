<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class OrganizationController extends Controller
{
    // get all organizations
    public function getAllOrganizations(Request $request)
    {
        $query = Organization::query();
        $perPage = 10;
        $page = 1;



        if ($request->filled('perPage')) {
            $perPage = $request->integer('perPage');
        }

        if ($request->filled('search')) {
            $search = strtolower($request->string('search'));
            $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
        }

        // pagination
        if ($request->filled('take') && $request->filled('skip')) {
            $perPage = max(1, min($request->integer('take'), 100));
            $skip = max(0, $request->integer('skip'));

            $page = intdiv($skip, $perPage) + 1;
        }

        $organizations = $query->paginate($perPage, ['*'], 'page', $page);

        return [
            "status" => 200,
            "message" => "Successful",
            "data" => $organizations
        ];

    }

    // create organization
    public function createOrganization(Request $request)
    {
        // Validate name
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:organizations,name'],
            'short_description' => ['required', 'string', 'max:255'],
        ]);

        $organization = Organization::create($request->all());

        return [
            "status" => 201,
            "message" => "Organization created successfully",
            "data" => $organization
        ];
    }

    // update organization
    public function updateOrganization(Request $request, string $id)
    {
        // Validate
        if (!Str::isUuid($id)) {
            return response()->json([
                'status' => 422,
                'message' => 'Invalid Id',
                'description' => 'Check the id and try again'
            ], 422);
        }

        // data
        $organization = Organization::find($id);

        if (!$organization) {
            return response()->json([
                'status' => 404,
                'message' => 'Organization not found',
            ], 404);
        }

        // check if the name exists
        $validated = $request->validate([
            'name' => ['sometimes', 'string', 'max:255', Rule::unique('organizations')->ignore($organization->id)],
            'short_description' => ['sometimes', 'string', 'max:100'],
            'description' => ['sometimes', 'nullable', 'string', 'max:255'],
            'no_of_users' => ['sometimes', 'integer', 'min:0'],
            'no_of_admins' => ['sometimes', 'integer', 'min:0'],
        ]);

        $organization->update($validated);
        $updated = $organization->fresh();

        // Return data
        return [
            "status" => 200,
            "message" => "Organization updated successfully",
            "data" => $updated
        ];
    }
}
