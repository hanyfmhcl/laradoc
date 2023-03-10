<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Doc extends Model implements HasMedia
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Tenantable, InteractsWithMedia, Auditable;

    public $table = 'docs';

    public $orderable = [
        'id',
    ];

    protected $appends = [
        'upload',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $filterable = [
        'id',
        'national_id_card_no.national_id_card_no',
        'trip_type.trip_type',
        'doctype.type',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function nationalIdCardNo()
    {
        return $this->belongsToMany(MembersManagement::class);
    }

    public function tripType()
    {
        return $this->belongsToMany(Trip::class);
    }

    public function doctype()
    {
        return $this->belongsToMany(Document::class);
    }

    public function getUploadAttribute()
    {
        return $this->getMedia('doc_upload')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
