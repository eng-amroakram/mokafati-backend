<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'price',
        'cash_back',
        'rewards',
        'minimum_purchase',
        'bonus',
        'validity_period',
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'price',
            'cash_back',
            'rewards',
            'minimum_purchase',
            'bonus',
            'validity_period',
        ]);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query
                ->where('name', 'like', '%' . $filters['search'] . '%');
        });
    }

    public function scopeGetRules(Builder $builder, $id = "")
    {
        return [
            'name' => ['required'],
            'price' => ['required',],
            'cash_back' => ['required',],
            'rewards' => ['required'],
            'minimum_purchase' => ['required'],
            'bonus' => ['required'],
            'validity_period' => ['string'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'price.required' => 'هذا الحقل مطلوب',
            'cash_back.required' => 'هذا الحقل مطلوب',
            'rewards.required' => 'هذا الحقل مطلوب',
            'minimum_purchase.required' => 'هذا الحقل مطلوب',
            'bonus.required' => 'هذا الحقل مطلوب',
            'validity_period.required' => 'هذا الحقل مطلوب',
        ];
    }

    public function scopeStore(Builder $builder, array $data = [])
    {
        $user = $builder->create($data);

        if ($user) {
            return true;
        }

        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {
        $user = $builder->find($id);

        if ($user) {
            $user = $user->update($data);
            return true;
        }

        return false;
    }
}
