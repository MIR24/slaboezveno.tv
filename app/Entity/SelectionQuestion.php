<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\SelectionQuestion
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionQuestion whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SelectionQuestion extends Model
{
    public $table = "selection_question";
}
