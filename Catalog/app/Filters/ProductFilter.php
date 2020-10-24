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

    public function fragrance ($value)
    {
        $this->builder->where('fragrance_id', $value);
    }

    public function is_antibacterial ($value)
    {
        $this->builder->whereHasMorph('productable',  ['App\Soap', 'App\LiquidSoap'], function (Builder $query) use ($value) {
            $query->where('is_antibacterial', $value);
        });
    }

    public function price ($value)
    {
        $priceToStr = $value;
        $priceToArr = explode('_', $priceToStr);
        if (is_numeric($priceToArr[0]) && is_numeric($priceToArr[1])) {
            $this->builder->whereBetween('price', [$priceToArr[0], $priceToArr[1]]);
        } else {
            $this->builder->where('price', $priceToArr[0], $priceToArr[1]);
        }
    }

}
