<?php

namespace really4you\E\Sign\Traits;

use really4you\E\Sign\Helper\StrHelp;

trait Properties
{
    /**
     * 设置属性
     *
     * @param array $option
     * @throws \ReflectionException
     */
    public function setProperties(array $option)
    {
        $ref   = new \ReflectionClass($this);
        $class = $ref->getName();
        $perfix = property_exists($this,$this->prefix) ? : 'set';

        // 默认属性
        if(!empty($defaultP = $this->defaultProperties)){
            foreach ($defaultP as $propert){
                $method = StrHelp::studly($propert);

                if( (property_exists($this,$propert)) &&
                    (method_exists($this,$perfix.$method)) ){
                    call_user_func([$class,$perfix.$method]);
                }
            }
        }

        foreach ($option as $name=>$value) {
            $method = StrHelp::studly($name);

            if( (property_exists($this,$name)) &&
                (method_exists($this,$perfix.$method)) ){
                call_user_func([$class,$perfix.$method],
                    $value);
            }
        }

        return;
    }
}