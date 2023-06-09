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

        // if (!empty($this->filters['num_contrato'])) {
        //     $filters->where('num_contrato','LIKE', "%" . $this->filters['num_contrato']. "%");
        // }

        // if (!empty($this->filters['ENDERECO'])) {
        //     $filters->where('ENDERECO','LIKE', "%" . $this->filters['ENDERECO']. "%");
        // }

        // if (!empty($this->filters['COMPLEMENTO'])) {
        //     $filters->where('COMPLEMENTO','LIKE', "%" . $this->filters['COMPLEMENTO']. "%");
        // }

        // if (!empty($this->filters['PF_PJ'])) {
        //     $filters->where('NATUREZA_PESSOA', $this->filters['PF_PJ']);
        // }

        // if (!empty($this->filters['NU_1']) && !empty($this->filters['NU_2'])) {
        //     $filters->where(DB::raw("(CASE WHEN NUMERO IN ( 'S/N','SN' ) THEN NULL ELSE CAST(NUMERO AS INT) END)"), ">=", [$this->filters['NU_1']]);
        //     $filters->where(DB::raw("(CASE WHEN NUMERO IN ( 'S/N', 'SN' ) THEN NULL ELSE CAST(NUMERO AS INT) END)"), "<=",[$this->filters['NU_2']]);
        // }

        // if ($this->filters){
        //     $filters->whereNull('BLACK_LIST');
        // }

        // if (!empty($this->filters['CEP'])) {
        //     $filters->where('CEP', 'LIKE', "%" . $this->filters['CEP'] . "%");
        // }

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

