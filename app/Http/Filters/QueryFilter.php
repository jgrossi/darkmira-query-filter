<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value) {
            $method = camel_case($field);
            if ($value && method_exists($this, $method)) {
                call_user_func_array([$this, $method], [$value]);
            }
        }
    }

    /**
     * @return array
     */
    protected function fields(): array
    {
        return array_map('trim', $this->request->all());
    }

    /**
     * @param string $value
     */
    protected function sort(string $value)
    {
        collect(explode(',', $value))->mapWithKeys(function (string $field) {
            switch (substr($field, 0, 1)) {
                case '-':
                    return [substr($field, 1) => 'desc'];
                case '+':
                    return [substr($field, 1) => 'asc'];
                default:
                    return [$field => 'asc'];
            }
        })->each(function ($order, $field) {
            $this->builder->orderBy($field, $order);
        });
    }
}
