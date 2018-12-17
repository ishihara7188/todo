<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    const STATUS = [
        1 => ['label' => '未', 'class' => 'label-danger'],
        2 => ['label' => '着手', 'class' => 'label-info'],
        3 => ['label' => '完', 'class' => ''],
    ];

    public function getStatusLabelAttribute(){
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute(){
        $status = $this->attributes['status'];
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['class'];
    }

    public function getFormattedDueDateAttribute(){
        return Carbon::createFromFormat(
            'Y-m-d', $this->attributes['due_date']
            )->format('Y/m/d');
    }
}
