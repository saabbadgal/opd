<?php

namespace App\Model\Organization;

use Illuminate\Database\Eloquent\Model;

class OrgCm extends Model
{
    protected $fillable = ['org_id', 'logo', 'welcome_note', 'social_media'];
}
