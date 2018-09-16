<?php
namespace ProgrammingCat\Array2Code;

class Array2Code {
    public function php() {
        $this->engine = "PHPCode";
        return $this;
    }

    public function convert($data) {
        $classname = __NAMESPACE__.'\\OutputFilter\\'.$this->engine;
        $engine = new $classname;
        return $engine->output($data);
    }
}