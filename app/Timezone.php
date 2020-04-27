<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{

    /**
     * Returns an array of all Timezone strings
     * 
     * @return array
     */
    public static function allTimezones()
    {
        return [

            self::PACIFIC_KWAJALEIN,
            self::PACIFIC_MIDWAY,
            self::PACIFIC_APIA,
            self::PACIFIC_HONOLULU,
            self::AMERICA_ANCHORAGE,
            self::AMERICA_LOS_ANGELES,
            self::AMERICA_TIJUANA,
            self::AMERICA_PHOENIX,
            self::AMERICA_DENVER,
            self::AMERICA_CHIHUAHUA,
            self::AMERICA_CHIHUAHUA,
            self::AMERICA_MAZATLAN,
            self::AMERICA_CHICAGO,
            self::AMERICA_MANAGUA,
            self::AMERICA_MEXICO_CITY,
            self::AMERICA_MEXICO_CITY,
            self::AMERICA_MONTERREY,
            self::AMERICA_REGINA,
            self::AMERICA_NEW_YORK,
            self::AMERICA_INDIANA_INDIANAPOLIS,
            self::AMERICA_BOGOTA,
            self::AMERICA_LIMA,
            self::AMERICA_BOGOTA,
            self::AMERICA_HALIFAX,
            self::AMERICA_CARACAS,
            self::AMERICA_LA_PAZ,
            self::AMERICA_SANTIAGO,
            self::AMERICA_ST_JOHNS,
            self::AMERICA_SAO_PAULO,
            self::AMERICA_ARGENTINA_BUENOS_AIRES,
            self::AMERICA_ARGENTINA_BUENOS_AIRES,
            self::AMERICA_GODTHAB,
            self::AMERICA_NORONHA,
            self::ATLANTIC_AZORES,
            self::ATLANTIC_CAPE_VERDE,
            self::AFRICA_CASABLANCA,
            self::EUROPE_LONDON,
            self::EUROPE_LONDON,
            self::EUROPE_LISBON,
            self::EUROPE_LONDON,
            self::AFRICA_MONROVIA,
            self::EUROPE_AMSTERDAM,
            self::EUROPE_BELGRADE,
            self::EUROPE_BERLIN,
            self::EUROPE_BERLIN,
            self::EUROPE_BRATISLAVA,
            self::EUROPE_BRUSSELS,
            self::EUROPE_BUDAPEST,
            self::EUROPE_COPENHAGEN,
            self::EUROPE_LJUBLJANA,
            self::EUROPE_MADRID,
            self::EUROPE_PARIS,
            self::EUROPE_PRAGUE,
            self::EUROPE_ROME,
            self::EUROPE_SARAJEVO,
            self::EUROPE_SKOPJE,
            self::EUROPE_STOCKHOLM,
            self::EUROPE_VIENNA,
            self::EUROPE_WARSAW,
            self::AFRICA_LAGOS,
            self::EUROPE_ZAGREB,
            self::EUROPE_ATHENS,
            self::EUROPE_BUCHAREST,
            self::AFRICA_CAIRO,
            self::AFRICA_HARARE,
            self::EUROPE_HELSINKI,
            self::EUROPE_ISTANBUL,
            self::ASIA_JERUSALEM,
            self::EUROPE_KIEV,
            self::EUROPE_MINSK,
            self::AFRICA_JOHANNESBURG,
            self::EUROPE_RIGA,
            self::EUROPE_SOFIA,
            self::EUROPE_TALLINN,
            self::EUROPE_VILNIUS,
            self::ASIA_BAGHDAD,
            self::ASIA_KUWAIT,
            self::EUROPE_MOSCOW,
            self::AFRICA_NAIROBI,
            self::ASIA_RIYADH,
            self::EUROPE_MOSCOW,
            self::EUROPE_VOLGOGRAD,
            self::ASIA_TEHRAN,
            self::ASIA_MUSCAT,
            self::ASIA_BAKU,
            self::ASIA_MUSCAT,
            self::ASIA_TBILISI,
            self::ASIA_YEREVAN,
            self::ASIA_KABUL,
            self::ASIA_YEKATERINBURG,
            self::ASIA_KARACHI,
            self::ASIA_KARACHI,
            self::ASIA_TASHKENT,
            self::ASIA_KOLKATA,
            self::ASIA_KOLKATA,
            self::ASIA_KOLKATA,
            self::ASIA_KOLKATA,
            self::ASIA_KATHMANDU,
            self::ASIA_ALMATY,
            self::ASIA_DHAKA,
            self::ASIA_DHAKA,
            self::ASIA_NOVOSIBIRSK,
            self::ASIA_COLOMBO,
            self::ASIA_RANGOON,
            self::ASIA_BANGKOK,
            self::ASIA_BANGKOK,
            self::ASIA_JAKARTA,
            self::ASIA_KRASNOYARSK,
            self::ASIA_HONG_KONG,
            self::ASIA_CHONGQING,
            self::ASIA_HONG_KONG,
            self::ASIA_IRKUTSK,
            self::ASIA_KUALA_LUMPUR,
            self::AUSTRALIA_PERTH,
            self::ASIA_SINGAPORE,
            self::ASIA_TAIPEI,
            self::ASIA_IRKUTSK,
            self::ASIA_URUMQI,
            self::ASIA_TOKYO,
            self::ASIA_TOKYO,
            self::ASIA_SEOUL,
            self::ASIA_TOKYO,
            self::ASIA_YAKUTSK,
            self::AUSTRALIA_ADELAIDE,
            self::AUSTRALIA_DARWIN,
            self::AUSTRALIA_BRISBANE,
            self::AUSTRALIA_SYDNEY,
            self::PACIFIC_GUAM,
            self::AUSTRALIA_HOBART,
            self::AUSTRALIA_MELBOURNE,
            self::PACIFIC_PORT_MORESBY,
            self::AUSTRALIA_SYDNEY,
            self::ASIA_VLADIVOSTOK,
            self::ASIA_MAGADAN,
            self::ASIA_MAGADAN,
            self::ASIA_MAGADAN,
            self::PACIFIC_AUCKLAND,
            self::PACIFIC_FIJI,
            self::ASIA_KAMCHATKA,
            self::PACIFIC_FIJI,
            self::PACIFIC_AUCKLAND,
            self::PACIFIC_TONGATAPU
        ];
    }

    const PACIFIC_KWAJALEIN = 'Pacific/Kwajalein';
    const PACIFIC_MIDWAY = 'Pacific/Midway';
    const PACIFIC_APIA = 'Pacific/Apia';
    const PACIFIC_HONOLULU = 'Pacific/Honolulu';
    const AMERICA_ANCHORAGE = 'America/Anchorage';
    const AMERICA_LOS_ANGELES = 'America/Los_Angeles';
    const AMERICA_TIJUANA = 'America/Tijuana';
    const AMERICA_PHOENIX = 'America/Phoenix';
    const AMERICA_DENVER = 'America/Denver';
    const AMERICA_CHIHUAHUA = 'America/Chihuahua';
    const AMERICA_MAZATLAN = 'America/Mazatlan';
    const AMERICA_CHICAGO = 'America/Chicago';
    const AMERICA_MANAGUA = 'America/Managua';
    const AMERICA_MEXICO_CITY = 'America/Mexico_City';
    const AMERICA_MONTERREY = 'America/Monterrey';
    const AMERICA_REGINA = 'America/Regina';
    const AMERICA_NEW_YORK = 'America/New_York';
    const AMERICA_INDIANA_INDIANAPOLIS = 'America/Indiana/Indianapolis';
    const AMERICA_BOGOTA = 'America/Bogota';
    const AMERICA_LIMA = 'America/Lima';
    const AMERICA_HALIFAX = 'America/Halifax';
    const AMERICA_CARACAS = 'America/Caracas';
    const AMERICA_LA_PAZ = 'America/La_Paz';
    const AMERICA_SANTIAGO = 'America/Santiago';
    const AMERICA_ST_JOHNS = 'America/St_Johns';
    const AMERICA_SAO_PAULO = 'America/Sao_Paulo';
    const AMERICA_ARGENTINA_BUENOS_AIRES = 'America/Argentina/Buenos_Aires';
    const AMERICA_GODTHAB = 'America/Godthab';
    const AMERICA_NORONHA = 'America/Noronha';
    const ATLANTIC_AZORES = 'Atlantic/Azores';
    const ATLANTIC_CAPE_VERDE = 'Atlantic/Cape_Verde';
    const AFRICA_CASABLANCA = 'Africa/Casablanca';
    const EUROPE_LONDON = 'Europe/London';
    const EUROPE_LISBON = 'Europe/Lisbon';
    const AFRICA_MONROVIA = 'Africa/Monrovia';
    const EUROPE_AMSTERDAM = 'Europe/Amsterdam';
    const EUROPE_BELGRADE = 'Europe/Belgrade';
    const EUROPE_BERLIN = 'Europe/Berlin';
    const EUROPE_BRATISLAVA = 'Europe/Bratislava';
    const EUROPE_BRUSSELS = 'Europe/Brussels';
    const EUROPE_BUDAPEST = 'Europe/Budapest';
    const EUROPE_COPENHAGEN = 'Europe/Copenhagen';
    const EUROPE_LJUBLJANA = 'Europe/Ljubljana';
    const EUROPE_MADRID = 'Europe/Madrid';
    const EUROPE_PARIS = 'Europe/Paris';
    const EUROPE_PRAGUE = 'Europe/Prague';
    const EUROPE_ROME = 'Europe/Rome';
    const EUROPE_SARAJEVO = 'Europe/Sarajevo';
    const EUROPE_SKOPJE = 'Europe/Skopje';
    const EUROPE_STOCKHOLM = 'Europe/Stockholm';
    const EUROPE_VIENNA = 'Europe/Vienna';
    const EUROPE_WARSAW = 'Europe/Warsaw';
    const AFRICA_LAGOS = 'Africa/Lagos';
    const EUROPE_ZAGREB = 'Europe/Zagreb';
    const EUROPE_ATHENS = 'Europe/Athens';
    const EUROPE_BUCHAREST = 'Europe/Bucharest';
    const AFRICA_CAIRO = 'Africa/Cairo';
    const AFRICA_HARARE = 'Africa/Harare';
    const EUROPE_HELSINKI = 'Europe/Helsinki';
    const EUROPE_ISTANBUL = 'Europe/Istanbul';
    const ASIA_JERUSALEM = 'Asia/Jerusalem';
    const EUROPE_KIEV = 'Europe/Kiev';
    const EUROPE_MINSK = 'Europe/Minsk';
    const AFRICA_JOHANNESBURG = 'Africa/Johannesburg';
    const EUROPE_RIGA = 'Europe/Riga';
    const EUROPE_SOFIA = 'Europe/Sofia';
    const EUROPE_TALLINN = 'Europe/Tallinn';
    const EUROPE_VILNIUS = 'Europe/Vilnius';
    const ASIA_BAGHDAD = 'Asia/Baghdad';
    const ASIA_KUWAIT = 'Asia/Kuwait';
    const AFRICA_NAIROBI = 'Africa/Nairobi';
    const ASIA_RIYADH = 'Asia/Riyadh';
    const EUROPE_MOSCOW = 'Europe/Moscow';
    const EUROPE_VOLGOGRAD = 'Europe/Volgograd';
    const ASIA_TEHRAN = 'Asia/Tehran';
    const ASIA_BAKU = 'Asia/Baku';
    const ASIA_MUSCAT = 'Asia/Muscat';
    const ASIA_TBILISI = 'Asia/Tbilisi';
    const ASIA_YEREVAN = 'Asia/Yerevan';
    const ASIA_KABUL = 'Asia/Kabul';
    const ASIA_YEKATERINBURG = 'Asia/Yekaterinburg';
    const ASIA_KARACHI = 'Asia/Karachi';
    const ASIA_TASHKENT = 'Asia/Tashkent';
    const ASIA_KOLKATA = 'Asia/Kolkata';
    const ASIA_KATHMANDU = 'Asia/Kathmandu';
    const ASIA_ALMATY = 'Asia/Almaty';
    const ASIA_DHAKA = 'Asia/Dhaka';
    const ASIA_NOVOSIBIRSK = 'Asia/Novosibirsk';
    const ASIA_COLOMBO = 'Asia/Colombo';
    const ASIA_RANGOON = 'Asia/Rangoon';
    const ASIA_BANGKOK = 'Asia/Bangkok';
    const ASIA_JAKARTA = 'Asia/Jakarta';
    const ASIA_KRASNOYARSK = 'Asia/Krasnoyarsk';
    const ASIA_CHONGQING = 'Asia/Chongqing';
    const ASIA_HONG_KONG = 'Asia/Hong_Kong';
    const ASIA_KUALA_LUMPUR = 'Asia/Kuala_Lumpur';
    const AUSTRALIA_PERTH = 'Australia/Perth';
    const ASIA_SINGAPORE = 'Asia/Singapore';
    const ASIA_TAIPEI = 'Asia/Taipei';
    const ASIA_IRKUTSK = 'Asia/Irkutsk';
    const ASIA_URUMQI = 'Asia/Urumqi';
    const ASIA_TOKYO = 'Asia/Tokyo';
    const ASIA_SEOUL = 'Asia/Seoul';
    const ASIA_YAKUTSK = 'Asia/Yakutsk';
    const AUSTRALIA_ADELAIDE = 'Australia/Adelaide';
    const AUSTRALIA_DARWIN = 'Australia/Darwin';
    const AUSTRALIA_BRISBANE = 'Australia/Brisbane';
    const PACIFIC_GUAM = 'Pacific/Guam';
    const AUSTRALIA_HOBART = 'Australia/Hobart';
    const AUSTRALIA_MELBOURNE = 'Australia/Melbourne';
    const PACIFIC_PORT_MORESBY = 'Pacific/Port_Moresby';
    const AUSTRALIA_SYDNEY = 'Australia/Sydney';
    const ASIA_VLADIVOSTOK = 'Asia/Vladivostok';
    const ASIA_MAGADAN = 'Asia/Magadan';
    const ASIA_KAMCHATKA = 'Asia/Kamchatka';
    const PACIFIC_FIJI = 'Pacific/Fiji';
    const PACIFIC_AUCKLAND = 'Pacific/Auckland';
    const PACIFIC_TONGATAPU = 'Pacific/Tongatapu';
}
