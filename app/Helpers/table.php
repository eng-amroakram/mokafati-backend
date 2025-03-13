<?php

use App\Models\User;

if (!function_exists('badge')) {
    function badge($role)
    {
        // badge badge-secondary
        // badge badge-success
        // badge badge-danger
        // badge badge-warning
        // badge badge-info
        // badge badge-light
        // badge badge-dark
        if ($role == "user") {
            return "badge badge-primary";
        }

        if ($role == "employee") {
            return "badge badge-warning";
        }

        if ($role == "store_owner") {
            return "badge badge-warning";
        }

        if ($role == "admin") {
            return "badge badge-success";
        }
    }
}

if (!function_exists('storeTypeBadge')) {
    function storeTypeBadge($type)
    {
        $types = [
            "cafe" => ["name" => "كفي", "badge" => "badge badge-secondary"],
            "restaurant" => ["name" => "مطعم", "badge" => "badge badge-success"],
            "entertainment" => ["name" => "ترفيهي", "badge" => "badge badge-danger"],
            "health" => ["name" => "صحي", "badge" => "badge badge-warning"],
            "beauty" => ["name" => "الجمال", "badge" => "badge badge-info"],
            "tourism" => ["name" => "سياحي", "badge" => "badge badge-light"],
            "other" => ["name" => "اخر", "badge" => "badge badge-dark"],
        ];

        return $types[$type] ?? ["name" => "غير معروف", "badge" => "badge badge-dark"];
    }
}


if (!function_exists('users')) {
    function users()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
    }
}


if (!function_exists('store_types')) {
    function store_types()
    {
        return [
            "cafe" => "كفي",
            "restaurant" => "مطعم",
            "entertainment" => "ترفيهي",
            "health" => "صحي",
            "beauty" => "الجمال",
            "tourism" => "سياحي",
            "other" => "اخر"
        ];
    }
}
