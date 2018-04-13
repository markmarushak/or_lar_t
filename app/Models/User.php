<?php

namespace Corals\User\Models;

use Corals\Foundation\Traits\HashTrait;
use Corals\Foundation\Transformers\PresentableTrait;
use Corals\Modules\Subscriptions\Traits\Billable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Spatie\Permission\Traits\HasRoles;
use Yajra\Auditable\AuditableTrait;

class User extends Authenticatable implements HasMediaConversions
{
    use Notifiable, HashTrait, HasRoles, PresentableTrait, LogsActivity, HasMediaTrait, Billable, AuditableTrait;

    /**
     *  Model configuration.
     * @var string
     */
    public $config = 'user.models.user';

    protected static $logAttributes = ['name', 'email'];
    protected static $ignoreChangedAttributes = ['remember_token'];

    public function __construct(array $attributes = [])
    {
        $config = config($this->config);

        if (isset($config['presenter'])) {
            $this->setPresenter(new $config['presenter']);
            unset($config['presenter']);
        }

        foreach ($config as $key => $val) {
            if (property_exists(get_called_class(), $key)) {
                $this->$key = $val;
            }
        }

        return parent::__construct($attributes);
    }

    public function amazonorders(){
        return $this->hasMany(Amazonorder::class);
    }

    public function hasPermissionTo($permission, $guardName = null): bool
    {
        if (isSuperUser()) {
            return true;
        }

        if (is_string($permission)) {
            $permission = app(Permission::class)->findByName(
                $permission,
                $guardName ?? $this->getDefaultGuardName()
            );
        }

        return $this->hasDirectPermission($permission) || $this->hasPermissionViaRole($permission);
    }

    protected $appends = ['picture', 'picture_thumb'];

    protected $dates = ['trial_ends_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'job_title', 'mobile', 'integration_id', 'card_brand', 'card_last_four', 'trial_ends_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getPictureAttribute()
    {
        $media = $this->getFirstMedia('user-picture');
        if ($media) {
            return $media->getUrl();
        } else {
            $id = $this->attributes['id'] ?? 1;
            $avatar = 'avatar_' . ($id % 10) . '.png';
            return url(asset(config($this->config . '.default_picture') . $avatar));
        }
    }

    public function getPictureThumbAttribute()
    {
        $media = $this->getFirstMedia('user-picture');
        if ($media) {
            return $media->getUrl('thumb');
        } else {
            $id = $this->attributes['id'] ?? 1;
            $avatar = 'avatar_' . ($id % 10) . '.png';
            return url(asset(config($this->config . '.default_picture') . $avatar));
        }
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10);
    }
}
