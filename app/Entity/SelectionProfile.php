<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\SelectionProfile
 *
 * @property int $id
 * @property int $user_id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $birthday
 * @property string $country_of_residence
 * @property string $city_of_residence
 * @property string $contact_phone
 * @property string $link_to_social_network
 * @property string $link_to_video_card
 * @property int $agree_to_processing_of_personal_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereAgreeToProcessingOfPersonalData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereCityOfResidence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereCountryOfResidence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereLinkToSocialNetwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereLinkToVideoCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\SelectionProfile whereUserId($value)
 * @mixin \Eloquent
 */
class SelectionProfile extends Model
{
    public $table = "selection_profile";
}
