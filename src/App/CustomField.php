<?php

namespace Voice\CustomFields\App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomField extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function parents()
    {
        return $this->hasMany(CustomField::class, 'parent_id');
    }

    public function config()
    {
        return $this->belongsTo(CustomFieldConfig::class, 'custom_field_config_id');
    }

}