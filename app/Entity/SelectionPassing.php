<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\SelectionPassing
 *
 * @property int $id
 * @property int $user_id
 * @property int $question_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $answered_at
 * @property string|null $questions_started_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing whereAnsweredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionPassing whereQuestionsStartedAt($value)
 * @mixin \Eloquent
 */
class SelectionPassing extends Model
{
    public $table = "selection_passing";

    public function question()
    {
        return $this->hasOne(SelectionQuestion::class);
    }
}
