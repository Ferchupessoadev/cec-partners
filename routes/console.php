<?php

use App\Models\Cuotas;
use App\Models\Partner;
use App\Models\Settings;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('cuotas', function () {
    $this->comment(Settings::query()->select('value')->where('key', 'membership_fee')->first()->value);
});

Artisan::command('create_cuotas', function () {
    $this->comment('Generando cuotas mensuales...');

    $amount_membership_fee = Settings::where('key', 'membership_fee')->value('value');

    Partner::chunk(50, function ($partners) use ($amount_membership_fee) {
        foreach ($partners as $partner) {
            $alreadyExists = Cuotas::where('partner_id', $partner->id)
                ->where('period', now()->format('m-Y'))
                ->exists();

            if (!$alreadyExists && $partner->active) {
                Cuotas::create([
                    'partner_id' => $partner->id,
                    'amount' => $amount_membership_fee,
                    'date_of_payment' => null,
                    'period' => now()->format('m-Y'),
                    'status' => 'pendiente'
                ]);
            }
        }
    });

    $this->info('Cuotas generadas correctamente.');
});

Schedule::call(function () {
    $partners = Partner::all();

    $amount_membership_fee = Settings::query()->select()->where('key', 'membership_fee')->first()->value;

    foreach ($partners as $partner) {
        Cuotas::create([
            'partner_id' => $partner->id,
            'amount' => $amount_membership_fee,
            'date_of_payment' => null,
            'period' => now()->format('m-Y'),
            'status' => 'pendiente'
        ]);
    }
})->monthly();
