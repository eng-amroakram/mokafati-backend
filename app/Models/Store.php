<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'owner_id',
        'name',
        'commercial_registration',
        'tax_number',
        'type',
        'status',
        'invoice',
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'owner_id',
            'name',
            'commercial_registration',
            'tax_number',
            'type',
            'status',
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
            'owner_id' => ['required', 'exists:users,id'],
            'name' => ['required',],
            'commercial_registration' => ['required',],
            'tax_number' => ['required'],
            'type' => ['required', 'in:cafe,restaurant,entertainment,health,beauty,tourism,other'],
            'invoice' => ['required'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            'owner_id.required' => 'هذا الحقل مطلوب',
            'name.required' => 'هذا الحقل مطلوب',
            'commercial_registration.required' => 'هذا الحقل مطلوب',
            'tax_number.required' => 'هذا الحقل مطلوب',
            'type.required' => 'هذا الحقل مطلوب',
            'invoice.required' => 'هذا الحقل مطلوب',
        ];
    }

    public function scopeStoreModel(Builder $builder, array $data = [])
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

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'store_id');
    }
}
