<?php

namespace App\Services;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Model;
use Adobrovolsky97\LaravelRepositoryServicePattern\Services\BaseCrudService;
use App\Support\Interfaces\Repositories\ContractRepositoryInterface;
use App\Support\Interfaces\Services\ContractServiceInterface;

class ContractService extends BaseCrudService implements ContractServiceInterface {
    protected function getRepositoryClass(): string {
        return ContractRepositoryInterface::class;
    }

    public function create(array $data): ?Model {
        $data['contract_code'] = Contract::generateContractCode($data['contract_type']);
        // return parent::create($data);
        $contract = parent::create($data);
        if(isset($data['tasks'])) {  
            $contract->tasks()->attach($data['tasks']);
        }

        return $contract;
    }

    public function update($keyOrModel, array $data): ?Model {
        $model = $keyOrModel instanceof Model ? $keyOrModel : $this->find($keyOrModel);

        if (isset($data['contract_type']) && $model->contract_type !== $data['contract_type']) {
            $data['contract_code'] = Contract::generateContractCode($data['contract_type']);
        }

        // return parent::update($keyOrModel, $data);
        $contract = parent::update($keyOrModel, $data);
        if(isset($data['tasks'])) {
            $contract->tasks()->sync($data['tasks']);
        } else {
            $contract->tasks()->detach();
        }

        return $contract;   
    }

    public function delete($keyOrModel): bool {
        $model = $keyOrModel instanceof Model ? $keyOrModel : $this->find($keyOrModel);
        
        $model->tasks()->detach();

        parent::delete($model);

        return true;
    }
}
