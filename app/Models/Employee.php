<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use ModelHelper;
    protected $fillable = ['name', 'status', 'store_id'];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'status',
            'store_id',
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
            'name' => ['required',],
            'store_id' => ['required', 'exists:stores,id'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'store_id.required' => 'هذا الحقل مطلوب',
        ];
    }

    public function scopeStoreModel(Builder $builder, array $data = [])
    {
        $user = $builder->create($data);
        return $user ? $user : false;
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

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
