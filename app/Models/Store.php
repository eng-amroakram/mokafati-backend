<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Store extends Model
{
    use ModelHelper;
    protected $file_path = 'images/store-images';

    protected $fillable = [
        'owner_id',
        'name',
        'commercial_registration',
        'tax_number',
        'type',
        'status',
        'commercial_image',
        'tax_image',
        'invoice',
        'logo',
    ];

    public function getImagePath($filed)
    {
        $image = $this->attributes[$filed];
        return $image && Storage::disk('public')->exists($image) ? asset('storage/' . $image) : asset('panel/images/no-image-available.jpg');
    }

    public function getCommercialImageTableAttribute()
    {
        return $this->getImagePath('commercial_image');
    }

    public function getTaxImageTableAttribute()
    {
        return $this->getImagePath('tax_image');
    }

    public function getInvoiceImageTableAttribute()
    {
        return $this->getImagePath('invoice');
    }

    public function getLogoImageTableAttribute()
    {
        return $this->getImagePath('logo');
    }

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
            'commercial_image',
            'tax_image',
            'invoice',
            'logo',
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
            'commercial_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'tax_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'invoice' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'logo' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
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
            'commercial_image.required' => 'هذا الحقل مطلوب',
            'commercial_image.mimes' => 'يجب أن تكون الصورة بصيغة jpeg, png, jpg, gif, أو svg',
            'tax_image.required' => 'هذا الحقل مطلوب',
            'tax_image.mimes' => 'يجب أن تكون الصورة بصيغة jpeg, png, jpg, gif, أو svg',
            'invoice.required' => 'هذا الحقل مطلوب',
            'invoice.mimes' => 'يجب أن تكون الصورة بصيغة jpeg, png, jpg, gif, أو svg',
            'logo.required' => 'هذا الحقل مطلوب',
            'logo.mimes' => 'يجب أن تكون الصورة بصيغة jpeg, png, jpg, gif, أو svg',
        ];
    }

    public function scopeStoreModel(Builder $builder, array $data = [])
    {
        $data['commercial_image'] = $builder->storeFile($data['commercial_image']);
        $data['tax_image'] = $builder->storeFile($data['tax_image']);
        $data['invoice'] = $builder->storeFile($data['invoice']);
        $data['logo'] = $builder->storeFile($data['logo']);
        $user = $builder->create($data);

        if ($user) {
            return true;
        }

        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {

        $commercial_image = $data['commercial_image'];

        if (gettype($commercial_image) == "object") {
            $builder->deleteFile($id, 'commercial_image');
            $data['commercial_image'] = $builder->storeFile($commercial_image);
        } else {
            unset($data['commercial_image']);
        }

        $tax_image = $data['tax_image'];

        if (gettype($tax_image) == "object") {
            $builder->deleteFile($id, 'tax_image');
            $data['tax_image'] = $builder->storeFile($tax_image);
        } else {
            unset($data['tax_image']);
        }

        $invoice = $data['invoice'];

        if (gettype($invoice) == "object") {
            $builder->deleteFile($id, 'invoice');
            $data['invoice'] = $builder->storeFile($invoice);
        } else {
            unset($data['invoice']);
        }

        $logo = $data['logo'];

        if (gettype($logo) == "object") {
            $builder->deleteFile($id, 'logo');
            $data['logo'] = $builder->storeFile($logo);
        } else {
            unset($data['logo']);
        }

        $store = $builder->find($id);

        if ($store) {
            $store = $store->update($data);
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
