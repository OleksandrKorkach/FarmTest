<?php

namespace App\Filters;

use App\Filters\QueryFilter;

class ProductFilter extends QueryFilter
{
    public function name(string $value): void
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    public function min_quantity(float $value): void
    {
        $this->builder->where('quantity', '>=', $value);
    }

    public function max_quantity(float $value): void
    {
        $this->builder->where('quantity', '<=', $value);
    }

    public function min_price(float $value): void
    {
        $this->builder->where('price', '>=', $value);
    }

    public function max_price(float $value): void
    {
        $this->builder->where('price', '<=', $value);
    }

    public function sort_by(string $field): void
    {
        $sortOrder = $this->request->get('sort_order', 'asc');
        $this->builder->orderBy($field, $sortOrder);
    }
}
