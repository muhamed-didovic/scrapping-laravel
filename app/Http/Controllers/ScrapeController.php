<?php

namespace App\Http\Controllers;

use App\Data;
use App\Device;
use Goutte;
use Illuminate\Http\Request;

use App\Http\Requests;

class ScrapeController extends Controller
{
    public function index()
    {
        $crawler = [];
        for ($i = 1; $i <= 8; $i++) {
            $crawler[] = Goutte::request('GET', 'http://209.234.181.18:880/auto/00' . $i);
        }
        //dd(22);
        $counter = 0;
        foreach ($crawler as $c) {
            [$deviceName, $jsonData] = $this->scrape($c);
            //todo: add error handling
            if (!empty($deviceName)) {
                $counter++;
                $device = Device::whereName($deviceName)->first();
                Data::create([
                    'device_id' => $device->id,
                    'data' => $jsonData
                ]);
            }
        }
        return view('water', compact('crawler', 'counter'));
    }

    /**
     * @param $crawler
     * @return array
     */
    public function scrape($crawler)
    {
        $deviceName = $crawler->filter('body p font b')->text();

        //todo: better solution?
        $keys = $crawler->filter('table tr td:first-child')->extract(array('_text'));
        $values = $crawler->filter('table tr td:last-child')->extract(array('_text'));

        //SANITIZE
        //todo: remove empty fields and check the length of arrays

        //remove first items 'Name' and 'Value'
        array_shift($keys);
        array_shift($values);

        //dd($keys);
        $keys = array_map('trim', $keys);
        $values = array_map('trim', $values);

        $k = array_map(function ($key) {
            $key = trim(html_entity_decode($key), " \t\n\r\0\x0B\xC2\xA0");
            $key = str_replace("&nbsp; ", "", $key);
            $key = str_replace("&nbsp;", "", $key);
            $key = str_replace("&nbsp", "", $key);
            return $key;
        }, $keys);

        $v = array_map(function ($value) {
            $value = trim(html_entity_decode($value), " \t\n\r\0\x0B\xC2\xA0");
            $value = str_replace("&nbsp; ", "", $value);
            $value = str_replace("&nbsp;", "", $value);
            $value = str_replace("&nbsp", "", $value);
            return $value;
        }, $values);
        
        //check if we get data
        if (empty($v)) {
            return [[], []];
        }
    
        //check if devices are OFFLINE or no DATA is available like '-----'
        $invalidTokens = ['OFFLINE', '-----', 'Authorization Required', ''];
        
        if (collect($v)->contains(function($a) use ($invalidTokens){
            if (in_array($a, $invalidTokens)) {
                return true;
            }
        })){
            return [[], []];
        }
        
//        if ($v[0] === ''
//            || $v[1] === 'OFFLINE'
//            || $v[0] === ''
//            || $v[1] === '-----'
//        ) {
//            return [[], []];
//        }

        $jsonData = json_encode(array_combine($k, $v));
        return array($deviceName, $jsonData);
    }

}
