<?php

use Carbon\Carbon;

/**
 * Checks if a given single character is consonant or vowel
 * @param string $char
 * @return bool
 */
function is_vowel(string $char): bool
{
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    foreach ($vowels as $str) {
        if ($str === $char) {
            return true;
        }
    }
    return false;
}

/**
 * Greeting on header portion of Dashboard
 * @return string
 */
function greet()
{
    $hour = now()->format('H');
    if ($hour < 12) {
        return 'Good morning ';
    }
    if ($hour < 16) {
        return 'Good afternoon ';
    }
    return 'Good evening ';
}


function get_all_countries()
{
    $countries = app(PragmaRX\Countries\Package\Countries::class)
        ->all()
        ->map(function ($country) {
            $commonName = $country->name->common;

            $languages = $country->languages ?? collect();

            $language = $languages->keys()->first() ?? null;

            $nativeNames = $country->name->native ?? null;

            if (
                filled($language) &&
                filled($nativeNames) &&
                filled($nativeNames[$language]) ?? null
            ) {
                $native = $nativeNames[$language]['common'] ?? null;
            }

            if (blank($native ?? null) && filled($nativeNames)) {
                $native = $nativeNames->first()['common'] ?? null;
            }

            $native = $native ?? $commonName;

            if ($native !== $commonName && filled($native)) {
                $native = "$native ($commonName)";
            }

            return $native;
        })
//        ->values()
        ->toArray();
    return collect($countries);
}

/**
 * Filters all incoming input values and encodes tags
 * @param $value
 * @param int $filter
 * @return mixed
 */
function sanitize($value, $filter = FILTER_SANITIZE_STRING)
{
    return filter_var(htmlentities(trim($value)), $filter);
}

/**
 * Get a country in any specified cca version
 * @param $country_code
 * @param null $country_cca
 * @return mixed
 */
function get_country($country_code, $country_cca = null)
{
    if ($country_cca !== null) {
        return app(PragmaRX\Countries\Package\Countries::class)->where($country_cca, $country_code)->first();
    }
    return app(PragmaRX\Countries\Package\Countries::class)->where('cca3', $country_code)->first();
}

/**
 * Gets a state from a given country code
 * @param $country_code
 * @param $state_code
 * @param null $country_cca
 * @return null
 */
function get_state($country_code, $state_code, $country_cca = null)
{
    $states = get_all_states($country_code, $country_cca);

    if ($states && count($states) > 0) {
        return $states->where('postal', $state_code)->first();
    }
    return null;
}

function get_all_states($country_code, $country_cca = null)
{

    $app = app(PragmaRX\Countries\Package\Countries::class);

    if ($country_cca !== null) {
        $app = $app->where($country_cca, $country_code)->first();
    } else {
        $app = $app->where('cca3', $country_code)->first();
    }
    if ($app && count($app) > 0) {
        $app = $app->hydrateStates();
    }
    if ($app && count($app) > 0) {
        return $app->states;
    }
    return null;
}

function get_country_name($country_code, $country_cca = null)
{
    $country = get_country($country_code, $country_cca);
    if ($country && $country->count() > 0) {
        return $country['name']['common'] ?? $country['name']['official'];
    }
    return null;
}

function get_country_state($country_code, $state_code, $country_cca = null)
{
    $state = get_state($country_code, $state_code, $country_cca);
    if (isset($state) && $state && $state->count() > 0) {
        $state_details = $state;
        return $state_details['name'] ?? $state_details['alt_names'][0];
    }
    return null;

}

/**
 * If the given image is an array, it picks the first image in the item and returns it
 * @param $images
 *
 */
function display_image($images)
{
    if (!is_string($images)) {
        return $images[0];
    }
    return $images;
}

/**
 * poping off the first image and returning the rest
 * @param $images
 * @return array|null
 */
function display_other_images($images)
{
    if (is_array($images)) {
        $arr = [];
        foreach ($images as $key => $item) {
            if ($key != 0) {
                $arr[] = $item;
            }
        }
        return $arr ?? null;
    }
    return null;
}


/**
 * Converts a given sum to another currency
 * @param $amount
 * @param $from
 * @param $to
 * @return float
 */
function convert_currency($amount = 0, $from = 'NGN', $to = 'NGN')
{
    if ($to)
        return (float)\AmrShawky\Currency::convert()->amount($amount)->from($from)->to($to)->get();
    return $amount;
}

function get_currency_from_location($location = null)
{
    if (!$location) {
        // Successfully retrieved position.
        $location = get_user_location();
        $country = get_country($location, 'cca2');
        $currency = $country->hydrateCurrencies()->currencies->first();
        return isset($currency['iso']['code']) ? $currency['iso']['code'] : null;
    }
    return null;
}


function get_user_location()
{
    $position = Stevebauman\Location\Facades\Location::get();
    if ($position) {
        $get_country = get_country($position->countryCode, 'cca2');
        if ($get_country) return $get_country['cca3'];
    }
    return null;
}
