<?php

namespace App\Console\Commands;

use App\Entity\SelectionProfile;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class SelectionProfileExport extends Command
{
    private const INTERVAL = 'now - 1 day - 1 hours';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:selection:profile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export filled profiles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {
        $labels = [
            'ФИО',
            'Город проживания',
            'Контактный телефон',
            'Email',
            'Профессия',
            'Дата рождения',
            'Видеовизитка',
            'Соцсеть',
        ];
        $columns = [
            'selection_profile.name as name',
            'city_of_residence',
            'contact_phone',
            'users.email as email',
            'profession',
            'birthday_string',
            'link_to_video_card',
            'link_to_social_network',
        ];

        $dateBegin = new \DateTimeImmutable(self::INTERVAL);

        /** @var Collection $profiles */
        $profiles = SelectionProfile::select($columns)
            ->leftJoin('users', 'selection_profile.user_id', '=', 'users.id')
//            ->where('selection_profile.created_at', '>', $dateBegin)
            ->orderBy('selection_profile.created_at', 'asc')
            ->get();

        $list = $profiles->toArray();
        array_unshift($list, $labels);

//        $dateFrom = $dateBegin->format("YmdHis");
//        $dateTo = (new \DateTimeImmutable('now'))->format("YmdHis");
//        $fp = fopen("public/csv/slaboe_zveno_profiles_from_${dateFrom}_to_${dateTo}.csv", 'w');
        $fp = fopen("public/csv/slaboe_zveno_profiles.csv", 'w');
        foreach ($list as $fields) {
            fputcsv($fp, $fields, ';', '"');
        }
        fclose($fp);
    }
}
