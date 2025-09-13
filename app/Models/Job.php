<?php


namespace App\Models;
class Job
{
    public static function all(): array {
        return [
            ['title' => 'Job 1', 'salary' => 60000],
            ['title' => 'Job 2', 'salary' => 50000],
        ];
    }
}
