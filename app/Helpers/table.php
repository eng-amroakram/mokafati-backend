<?php



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

        if ($role == "admin") {
            return "badge badge-success";
        }
    }
}
