<?php namespace App\Ip2Country;

class Ip2Country {

    /**
     * Takes an IPv4 address and returns the associated country.
     *
     * @param   string  $ipAddress  Optional, The Ipv4 address to lookup, defaults to users IP address
     * @param   string  $response   Optional, Desired response string, 'country_name' or default 'country_code'
     *
     * @return  string  Associated 2 letter country code or country name
     */
    public static function get($ipAddress = null, $response = 'country_code')
    {
        $ipAddress = $ipAddress ?: $_SERVER['REMOTE_ADDR'];

        $user_ip = ip2long($ipAddress);

        $query = \DB::table('laravel_ip2country')
            ->where('start_ip_long', '<=', $user_ip)
            ->where('end_ip_long', '>=', $user_ip);

        if (\Config::get('ip2country::cache_results')) $query->remember(\Config::get('ip2country::cache_results'));

        $results = $query->first();

        $defaults = array(
            // If IP address is not found, what country is returned
            'default_country_code' => 'CA',
            'default_country_name' => 'Canada',

            // Since our data will change, at most, once a month. Cache the Ip lookup for a day
            // Default: 1 day. Set to 0 or null to disable.
            'cache_results' => 60 * 24
        );

        return count($results) ?  $results->{$response} : $defaults;

        return ;
    }

    /**
     * Convenience alias function for getting the full country name instead of the country code
     *
     * @param   null    $ipAddress  Optinoal
     *
     * @return  string  The name of the country where the IP address is from
     */
    public static function getFull($ipAddress = null)
    {
        return Ip2Country::get($ipAddress, 'country_name');
    }
}