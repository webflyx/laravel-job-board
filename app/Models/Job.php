<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $categories = ['Development', 'Design', 'Marketing', 'HR', 'Finance', 'Sales'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        return $query->when($filters['search'], function ($query) {
            $query->where(function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'LIKE', '%' . request('search') . '%');
            });
        })->when($filters['min_salary'] ?? null, function ($query) {
            $query->where('salary', '>=', request('min_salary'));
        })->when($filters['max_salary'] ?? null, function ($query) {
            $query->where('salary', '<=', request('max_salary'));
        })->when($filters['experience'] ?? null, function ($query) {
            $query->where('experience', '=', request('experience'));
        })->when($filters['category'] ?? null, function ($query) {
            $query->where('category', '=', request('category'));
        });
    }
}
