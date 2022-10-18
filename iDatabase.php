<?php


/**
 *
 * @author JulianJ
 */
interface iDatabase {
    public function open():void;
    public function insert($record);
    public function query($name, $string);
    public function delete($name, $string);
    public function close():void;
    //put your code here
}
