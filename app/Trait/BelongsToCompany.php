<?php

namespace App\Trait;

use App\Models\Scopes\CompanyScope;

trait BelongsToCompany
{
    protected static function bootedBelongsToCompany()
    {
        static::addGlobalScope(new CompanyScope);

        static::creating(function ($client){
            if(session()->has('company_id')){
                $client->company_id = session()->get('company_id');
            }
        });

        static::updating(function ($client){
            if(session()->has('company_id')){
                $client->company_id = session()->get('company_id');
            }
        });
    }
}
