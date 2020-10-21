<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductFilter
{
    protected $builder;
    protected $request;

    public function __construct (Request $request)
    {
        $this->request = $request;
    }

    public function apply ($builder)
    {
        $this->builder = $builder;
        foreach ($this->filters() as $filter => $value) {
            if (!$value) continue;
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    public function filters ()
    {
        return $this->request->all();
    }

    public function category ($value)
    {
        $this->builder->where('category_id', $value);
    }

}
