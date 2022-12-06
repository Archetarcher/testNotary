<?php

namespace App\Observers;

use App\Mail\RecordApproveMail;
use App\Models\Record;
use Illuminate\Support\Facades\Mail;

class RecordObserver
{
    public function created(Record $record){
        Mail::to($record->email)->send(
            new RecordApproveMail($record)
        );
    }
}
