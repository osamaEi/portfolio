<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public const CACHE_KEY = 'settings.all';

    /**
     * Editable contact details, keyed by setting name, with the config values
     * in config/portfolio.php acting as defaults until they're overridden.
     */
    public static function defaults(): array
    {
        return [
            'contact_office' => config('portfolio.location'),
            'contact_phone' => config('portfolio.phone'),
            'contact_hours' => 'Everyday 09 am - 07 pm',
            'contact_email' => config('portfolio.contact_email'),
        ];
    }

    /**
     * All settings merged over their defaults. Cached, since the public
     * contact section reads these on every page render.
     */
    public static function all_values(): array
    {
        $stored = Cache::rememberForever(self::CACHE_KEY, function () {
            return static::query()->pluck('value', 'key')->all();
        });

        // Blank values fall back to the default rather than rendering empty.
        return collect(static::defaults())
            ->map(fn ($default, $key) => filled($stored[$key] ?? null) ? $stored[$key] : $default)
            ->all();
    }

    public static function get(string $key): ?string
    {
        return static::all_values()[$key] ?? null;
    }

    public static function put(string $key, ?string $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget(self::CACHE_KEY);
    }
}
