<?php

namespace really4you\E\Sign\Traits;

use really4you\E\Sign\Helper\StrHelp;

trait Properties
{
    /**
     * set properties
     *
     * @param array $option
     * @throws \ReflectionException
     */
    public function setProperties(array $option)
    {
        $ref    = new \ReflectionClass($this);
        $class  = $ref->getName();
        $perfix = isset($this->prefix) ? $this->prefix : 'set';

        // set default properties
        if(isset($this->defaultProperties)) {
            foreach ($this->defaultProperties as $propert)
            {
                $method = StrHelp::studly($propert);
                if((property_exists($this,$propert))
                    && (method_exists($this,$perfix.$method))) {
                    call_user_func([$class,$perfix.$method]);
                }
            }
        }

        foreach ($option as $name=>$value)
        {
            $method = StrHelp::studly($name);
            if((property_exists($this,$name))
                && (method_exists($this,$perfix.$method))) {
                call_user_func([$class,$perfix.$method],
                    $value);
            }
        }

        return;
    }
}