<?php
namespace ProgrammingCat\Array2Code\OutputFilter;

class PHPCode {
    const QUOTE_SINGLE = "'";
    const QUOTE_DOUBLE = '"';
    const QUOTE_BACK = '`';
    const EMPTY_DEF = '""';

    const TAB_STOP = " ";    // 
    const INDENT_SIZE = 4;

    public function name() :string {
        return "PHPソースコード";
    }
    public function output($data) :string {
        if (empty($data) || !$this->is_array($data)) return self::EMPTY_DEF;
        // 配列をコードに。
        $src = "";
        foreach ($data as $key=>$val) {
            $src .= sprintf('$%s = %s;', $key, $this->_convert_value($val, 0));
            $src .= "\n";
        }
        return $src;
    }
    protected function _convert_key($key) {
        if ($this->is_string($key)) {
            return self::QUOTE_SINGLE . $key . self::QUOTE_SINGLE;
        }
        if ($this->is_number($key)) {
            return strval($key);
        }
        return $key;
    }
    protected function _convert_value($val, $indent=1) {
        if ($this->is_array($val)) {
            return "[" . $this->_convert_array_def($val, $indent+1) . "]";
        }
        return $this->_convert_primitives($val);
    }
    protected function _indent($indent=0) {
        return str_pad("", self::TAB_STOP, $indent*self::INDENT_SIZE);
    }
    protected function _convert_primitives($val) {
        if ($this->is_null($val)) {
            return "NULL";
        }
        if ($this->is_string($val)) {
            return self::QUOTE_SINGLE . $val . self::QUOTE_SINGLE;
        }
        if ($this->is_number($val)) {
            return strval($val);
        }
        return self::EMPTY_DEF;
    }
    protected function _convert_array_def($val, $indent) {
        if (!$this->is_array($val)) return self::EMPTY_DEF;
        $src = "";
        foreach ($val as $_k=>$_v) {
            $src .= sprintf('%s => %s,', $this->_convert_key($_k), $this->_convert_value($_v, $indent+1));
        }
        return $src;
    }
    protected function is_null($val) {
        return is_null($val);
    }
    protected function is_array($val) {
        return is_array($val);
    }
    protected function is_string($val) {
        return is_string($val);
    }
    protected function is_number($val) {
        return is_int($val) || is_float($val) || is_double($val);
    }

    protected function _php_open_tag() {
        return "<?php\n";
    }

}