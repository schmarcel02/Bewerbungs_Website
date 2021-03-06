<?php

//Diese Klasse stammt von mir
class Fragment
{
    private $viewfile;

    private $properties = array();

    public function __construct($viewfile)
    {
        $this->viewfile = "./../view/fragment/$viewfile.php";
    }

    public function __set($key, $value)
    {
        if (!isset($this->$key)) {
            $this->properties[$key] = $value;
        }
    }

    public function __get($key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }
    }

    public function display()
    {
        extract($this->properties);

        require $this->viewfile;
    }
}

?>