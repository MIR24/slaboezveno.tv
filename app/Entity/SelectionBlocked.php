<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\SelectionBlocked
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionBlocked newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionBlocked newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionBlocked query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionBlocked whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionBlocked whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionBlocked whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionBlocked whereUserId($value)
 * @mixin \Eloquent
 */
class SelectionBlocked extends Model
{
    public $table = "selection_blocked";
}
