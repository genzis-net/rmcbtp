<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        $settings = static::allCached();

        return array_key_exists($key, $settings) ? $settings[$key] : $default;
    }

    public static function setValue(string $key, mixed $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value === null ? null : (string) $value]
        );

        Cache::forget('app.settings');
    }

    public static function setMany(array $values): void
    {
        foreach ($values as $key => $value) {
            static::updateOrCreate(
                ['key' => $key],
                ['value' => $value === null ? null : (string) $value]
            );
        }

        Cache::forget('app.settings');
    }

    public static function allCached(): array
    {
        return Cache::rememberForever('app.settings', function () {
            return static::query()->pluck('value', 'key')->all();
        });
    }
}
