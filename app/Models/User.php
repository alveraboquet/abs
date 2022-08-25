<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'personal_sales' => 'decimal:4',
        'direct_sales' => 'decimal:4',
        'group_sales' => 'decimal:4',
        'usdt_wallet' => 'decimal:4',
        'roi_wallet' => 'decimal:4',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $with = ['userRanking'];


    public function children()
    {
        return $this->hasMany(User::class, 'referral')->with('children');
    }
    public function parent()
    {
        return $this->belongsTo(User::class, 'referral');
    }
    public function userRanking()
    {
        return $this->belongsTo(Ranking::class, 'ranking', 'id');
    }

    /*  protected function status(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                switch ($value) {
                    case 1: {
                            return 'Active';
                        }
                    case 0: {
                            return 'Invactive';
                        }
                    default: {
                            return 'Unknown';
                        }
                }
            },
        );
    } */

    public function frontImg(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) => ($value ? '/uploads/' . $attribute['id'] . '/' . $value : null)
        );
    }

    public function backImg(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) => ($value ? '/uploads/' . $attribute['id'] . '/' . $value : null)
        );
    }

    public function passportImg(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) => ($value ? '/uploads/' . $attribute['id'] . '/' . $value : null)
        );
    }

    public function holdImg(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) => ($value ? '/uploads/' . $attribute['id'] . '/' . $value : null)
        );
    }

    public function utilsImg(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) => ($value ? '/uploads/' . $attribute['id'] . '/' . $value : null)
        );
    }
}
