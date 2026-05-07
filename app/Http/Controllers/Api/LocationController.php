<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * All 33 districts of Gujarat state (India).
     */
    private const GUJARAT_DISTRICTS = [
        'Ahmedabad',
        'Amreli',
        'Anand',
        'Aravalli',
        'Banaskantha',
        'Bharuch',
        'Bhavnagar',
        'Botad',
        'Chhota Udaipur',
        'Dahod',
        'Dang',
        'Devbhoomi Dwarka',
        'Gandhinagar',
        'Gir Somnath',
        'Jamnagar',
        'Junagadh',
        'Kheda',
        'Kutch',
        'Mahisagar',
        'Mehsana',
        'Morbi',
        'Narmada',
        'Navsari',
        'Panchmahal',
        'Patan',
        'Porbandar',
        'Rajkot',
        'Sabarkantha',
        'Surat',
        'Surendranagar',
        'Tapi',
        'Vadodara',
        'Valsad',
    ];

    /**
     * GET /api/locations/gujarat-districts
     *
     * Returns the list of all Gujarat state districts.
     * Used by the Employee registration form to populate the
     * preferred_locations multi-select dropdown.
     */
    public function gujaratDistricts()
    {
        $districts = array_map(fn($name, $index) => [
            'id'   => $index + 1,
            'name' => $name,
        ], self::GUJARAT_DISTRICTS, array_keys(self::GUJARAT_DISTRICTS));

        return response()->json([
            'success' => true,
            'state'   => 'Gujarat',
            'total'   => count($districts),
            'data'    => $districts,
        ]);
    }
}
