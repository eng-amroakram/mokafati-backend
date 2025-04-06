<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\ModelHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;
    use HasApiTokens;
    use ModelHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'status',
        'username',
        'otp_code',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'email',
            'phone',
            'address',
            'status',
            'username',
            'password',
            'otp_code',
        ]);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query
                ->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('email', 'like', '%' . $filters['search'] . '%')
                ->orWhere('username', 'like', '%' . $filters['search'] . '%')
                ->orWhere('phone', 'like', '%' . $filters['search'] . '%');
        });
    }

    public function scopeGetRules(Builder $builder, $id = "")
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . "$id," . "id"],
            'phone' => ['required', 'unique:users,phone,' . "$id," . "id"],
            'address' => ['string'],
            'username' => ['required', 'unique:users,username,' . "$id," . "id", 'max:15'],
            // 'role' => ['required', 'in:admin,user'],
            'password' => ['required']
        ];
    }

    public function scopeGetMessages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'email.required' => 'هذا الحقل مطلوب',
            'email.unique' => 'الايميل موجود مسبقا',
            'phone.required' => 'هذا الحقل مطلوب',
            'phone.unique' => 'رقم الهاتف موجود مسبقا',
            'username.required' => 'هذا الحقل مطلوب',
            'username.unique' => 'هذا الاسم مستخدم مسبقا',
            'password.required' => 'هذا الحقل مطلوب',
        ];
    }

    public function scopeStoreModel(Builder $builder, array $data = [])
    {
        $user = $builder->create($data);
        $user->syncRoles($data['role']);
        return $user ? $user : false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {
        if ($data["password"]) {
            $data["password"] = Hash::make($data["password"]);
        } else {
            unset($data["password"]);
        }

        $user = $builder->find($id);
        $user->syncRoles($data['role']);

        if ($user) {
            $user = $user->update($data);
            return true;
        }

        return false;
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'owner_id');
    }
}
