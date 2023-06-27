<?php

namespace App\Exports;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class InputsExport implements FromQuery, WithHeadings
{
    // use Exportable;
    protected $filters;

    public function __construct(array $filters)
    {
        
        $this->filters = $filters;
        
        // dd($filters);
    }

    public function query()
    {
        // dd($this->filters);
        $filters = DB::table('vendas')->orderby('nome', 'asc');
                
        // 
        

        // if (!empty($this->filters['ZAPZAP'])) {
        //     $filters->where('WHATSAPP', 'LIKE', "%" . $this->filters['ZAPZAP'] . "%");
        // }

        if (!empty($this->filters['user_name_id'])) {
            $filters->where('user_name_id', 'LIKE', "%" . $this->filters['user_name_id'] . "%");
        }

  
        // if (!empty($this->filters['DDD_1'])) {
        //     $filters->whereIn('DDD', explode(',', $this->filters['DDD_1'][0]));
        // }
        if (!empty($this->filters['supervisor_id'])) {
            $filters->where('supervisor_id', $this->filters['supervisor_id']);
        }

        if (!empty($this->filters['nome'])) {
            $filters->where('nome', $this->filters['nome']);
        }

        if (!empty($this->filters['cpf'])) {
           $filters->where('cpf','LIKE', "%" . $this->filters['cpf']. "%");
        }

        if (!empty($this->filters['num_contrato'])) {
            $filters->where('num_contrato','LIKE', "%" . $this->filters['num_contrato']. "%");
        }

        // dd($filters);
    return $filters;
    }
        public function headings(): array
    {
        return [
            // 'WHATSAPP',
        ];
    }
}

