<?php
namespace Acme\MinticBundle\Entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Point
 *
 * @author mujuanp
 */
class Point {

    function __construct($lat, $lng) {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public $lat;
    public $lng;

    function getLat() {
        return $this->lat;
    }

    function getLng() {
        return $this->lng;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

    function setLng($lng) {
        $this->lng = $lng;
    }

}
