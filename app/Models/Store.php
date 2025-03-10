<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'commercial_registration',
        'tax_number',
        'type',
        'invoice',
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'user_id',
            'name',
            'commercial_registration',
            'tax_number',
            'type',
            'invoice',
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
            'user_id' => ['required'],
            'name' => ['required',],
            'commercial_registration' => ['required',],
            'tax_number' => ['required'],
            'type' => ['required'],
            'invoice' => ['required'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            'user_id.required' => 'هذا الحقل مطلوب',
            'name.required' => 'هذا الحقل مطلوب',
            'commercial_registration.required' => 'هذا الحقل مطلوب',
            'tax_number.required' => 'هذا الحقل مطلوب',
            'type.required' => 'هذا الحقل مطلوب',
            'invoice.required' => 'هذا الحقل مطلوب',
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
