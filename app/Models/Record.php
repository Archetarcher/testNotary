<?php

namespace App\Models;

use App\Enums\RecordTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
      'first_name',
      'last_name',
      'date',
      'type',
      'email',
      'user_id',
    ];
    protected $appends = ['recordType'];
    public function getDateAttribute($value){
        return Carbon::create($value)->format('Y-m-d');
    }

    public function getRecordTypeAttribute(){
        return RecordTypeEnum::VALUES[$this->type];
    }
}
