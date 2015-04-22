<?php
namespace Acme\MinticBundle\Entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this tempide file, choose Tools | Tempides
 * and open the tempide in the editor.
 */

/**
 * Description of Point
 *
 * @author mujuanp
 */
class Coll {

    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public $id;
    public $name;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

}
