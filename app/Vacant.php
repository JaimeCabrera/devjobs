<?php

namespace App;

use App\User;
use App\Salary;
use App\Category;
use App\Candidate;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    protected  $fillable = [
        'title','description','image','skills','category_id','experience_id','location_id','salary_id'
    ];

    // relacion de vacante con categoria 1:1
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    // realcion 1:1 vacante:salario
    public function salary()
    {
        return $this->belongsTo(Salary::class,'salary_id');
    }
    // relacion 1:1 vacante: experiencia
    public function experience()
    {
        return $this->belongsTo(Experience::class,'experience_id');
    }
    // relacion 1:1 vacante:location
    public function location()
    {
        return $this->belongsTo(location::class,'location_id');
    }
    // relacion 1:1 vacant:user->reclutador
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    // relacion 1:n vacant:candidates
    public function candidates()
    {
        return $this->hasMany(Candidate::class,'vacant_id');
    }
}
