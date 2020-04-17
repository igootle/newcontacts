<?php

namespace App;

// use App\Scopes\FilterScope;
// use App\Scopes\SearchScope;
// use App\Scopes\ContactSearchScope;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\FilterSearchScope;

class Contact extends Model
{
    use FilterSearchScope;
    protected $fillable = ['first_name', 'last_name','email', 'phone', 'address', 'company_id', 'user_id'];

    public $filterColumns = ['company_id'];
    public $searchColumns = ['first_name', 'last_name', 'email'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query)
    {
      return $query->orderBy('id', 'desc');
    }

    // public function getRouteKeyName()
    // {
    //   return 'first_name';
    // }


    // protected static function boot()
    // {
    //   parent::boot();

    //   static::addGlobalScope(new FilterScope);
    //   static::addGlobalScope(new ContactSearchScope);
    // }


    // public function scopeFilter($query)
    // {
    //   if ($companyId = request('company_id')) {
    //       $query->where('company_id', $companyId);
    //   }
    //   if($search = request('search')) {
    //     $query->where('first_name', 'LIKE', "%{$search}%");
    //   }
    //   return $query;

    // }
}
