<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class);
    }

    public function scopeFilter($query, array $filters)
    {
        // $query->when($filters['extracurricular'] ?? false, function ($query, $extracurricular) {
        // 	return $query->whereHas('extracurricular', function ($query) use ($extracurricular) {
        // 		$query->where('slug', $extracurricular);
        // 	});
        // });

        $query->when($filters['search'] ?? false, function ($query, $search) {
        	return $query->where('nama', 'like', '%'. $search .'%')
                    	 ->orWhere('email', 'like', '%'. $search .'%');
        });
    }
}
