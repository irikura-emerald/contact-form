<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mail_address',
        'telephonenumber',
        'message'
    ];

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function getPartOfMessage(): string
    {
        $messageLength = 100;
        $partOfMessage = mb_substr($this->message, 0, $messageLength);
        $isShort = strlen($partOfMessage) < strlen($this->message);
        return $partOfMessage . ($isShort ? '...' : '');
    }
}
