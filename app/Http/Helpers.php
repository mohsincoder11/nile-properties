<?php

if (!function_exists('get_agent_profile')) {
    function get_agent_profile($level)
    {
        $profiles =
            [
                '1' => 'Assistant Sales Executive',
                '2' => 'Sales Executive',
                '3' => 'Senior Sales Executive',
                '4' => 'Sales Representative',
                '5' => 'Assistant Sale Representative',
                '6' => 'Senior Sale Representative',
                '7' => 'Assistant Manager',
                '8' => 'Manager',
                '9' => 'Senior Manager',
                '10' => 'Director',
                '11' => 'King'
            ];
        return $profiles[$level] ?? '';
    }
}