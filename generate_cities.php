<?php

$provinces_url = "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json";
$provinces_json = file_get_contents($provinces_url);
$provinces = json_decode($provinces_json, true);

$all_cities = [];

foreach ($provinces as $prov) {
    $kab_url = "https://www.emsifa.com/api-wilayah-indonesia/api/regencies/" . $prov['id'] . ".json";
    $kab_json = file_get_contents($kab_url);
    if ($kab_json) {
        $kabs = json_decode($kab_json, true);
        foreach ($kabs as $kab) {
            $all_cities[] = [
                'id' => $kab['id'],
                'name' => $kab['name']
            ];
        }
    }
}

usort($all_cities, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});

file_put_contents(__DIR__ . '/public/cities.json', json_encode($all_cities));
echo "Cities generated successfully. Total: " . count($all_cities);
