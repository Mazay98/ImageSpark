<?php
namespace App\Filters;

class UserFilter
{
    protected $builder;
    protected $request;

    public function __construct($builder, $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function apply()
    {
        foreach($this->filters() as $filter=>$value){
            $filter = $filter.'Filter';
            if (method_exists($this,$filter) && !empty($value)){
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    private function filters()
    {
        return $this->request->all();
    }

    private function cityFilter($value){
        $this->builder->orWhereRaw("LOWER(current_city) LIKE LOWER(?)", ['%'.$value.'%']);
    }
    private function fioFilter($value){
        $this->builder->orWhereRaw("LOWER(CONCAT_WS(' ', name, surname, patronymic)) LIKE LOWER(?)", ['%'.$value.'%']);
    }


}
