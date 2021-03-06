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
 * @property-read \App\Entity\SelectionQuestion $question
 * @property-read \App\Entity\User $user
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

    protected $fillable = ['user_id', 'question_id', 'questions_started_at'];

    public function question()
    {
        return $this->hasOne(SelectionQuestion::class, 'id', 'question_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
