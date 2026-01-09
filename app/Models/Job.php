<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '£25,000'
            ],
            [
                'id' => 2,
                'title' => 'Manager',
                'salary' => '£20,000'
            ],
            [
                'id' => 3,
                'title' => 'Programmer',
                'salary' => '£18,000'
            ]
        ];
    }

    public static function find($id)
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id); 
        if (!$job) {
            abort(404);
        }
        return $job;
    }
}
