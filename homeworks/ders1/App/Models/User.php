<?php

namespace App\Models;

class User
{
    public static $instance;
    public static $parameters = [];

    /**
     * @return User
     */
    public static function getInstance()
    {
        if (!self::$instance){
            self::$instance = new User();
        }
        return self::$instance;
    }

    /**
     * @param null $name
     * @return User
     */
    public static function setName($name = null)
    {
        self::$parameters['name'] = $name;
        return self::getInstance();
    }

    /**
     * @param null $age
     * @return User
     */
    public static function setAge($age = null)
    {
        self::$parameters['age'] = $age;
        return self::getInstance();
    }

    /**
     * @param null $phone
     * @return User
     */
    public static function setPhone($phone = null)
    {
        self::$parameters['phone'] = $phone;
        return self::getInstance();
    }


    /**
     * @param array $keys
     * @return array
     */
    public static function getData(array $keys = [])
    {
        if (empty($keys)){
            return self::$parameters;
        }
        else{
            $selectedParametrs      = [];
            foreach ($keys as $key){
                $selectedParametrs[$key] = self::$parameters[$key];
            }

            return $selectedParametrs;
        }
    }

    /**
     * @return mixed|string
     */
    public static function getName()
    {
        return isset(self::$parameters['name']) ? self::$parameters['name'] : ['errors'=>'Ad daxil edilməyib'];
    }

    /**
     * @return mixed|string
     */
    public static function getAge()
    {
        return isset(self::$parameters['age']) ? self::$parameters['age'] : ['errors'=>'Yaş daxil edilməyib'];
    }

    /**
     * @return mixed|string
     */
    public static function getPhone()
    {
        return isset(self::$parameters['phone']) ? self::$parameters['phone'] : ['errors'=>'Telefon nömrəsi daxil edilməyib'];
    }
}