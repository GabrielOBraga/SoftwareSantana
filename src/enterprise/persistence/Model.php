<?php

declare (strict_types=1);

namespace src\enterprise\persistence;

class Model
{
    public static function load(int $id): PersistenceInterface
    {
        $contents=file_get_contents(static::getClassName().".txt");
        $strings= explode(PHP_EOL,$contents);
        $attribute=static::getIdAttribute();

        foreach ($strings as $str){
            $obj=unserialize($str);
            if ($id==(int)$obj->$attribute){
                return $obj;
            }
        }
        throw new IDnotFound();
    }
    public function delete()
    {
        $contents=file_get_contents($this->getClassName().".txt");
        $strings= explode(PHP_EOL,$contents);
        if ( $key=array_search( serialize($this), $strings)){
            if ($key === FALSE){
                throw new IDnotFound($this->getClassName()." Não encontrado");
            }
            unset($strings[$key]);
        }
        file_put_contents($this->getClassName() . ".txt", implode(
            PHP_EOL, $strings));
    }

    public function save()
    {
        $contents=file_get_contents($this->getClassName().".txt");
        $strings=[];
        if(!($contents==FALSE)){
            $strings= explode(PHP_EOL,$contents);
            $attribute=$this->getIdAttribute();
            foreach ($strings as &$str) {
                $obj = unserialize($str);
                if ($this->$attribute == $obj->$attribute) {
                    $str = serialize($this);
                    file_put_contents($this->getClassName() . ".txt", implode(
                        PHP_EOL, $strings));
                    return true;
                }
            }
        }
        $strings[]=serialize($this);
        file_put_contents($this->getClassName() . ".txt", implode(
            PHP_EOL, $strings));
    }


    public function getIdAttribute()
    {
        return $this->getIdAttribute();
    }
    static public function  getClassName()
    {
        return $this->getClassName();
    }

}