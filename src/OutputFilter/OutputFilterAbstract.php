<?php
namespace ProgrammingCat\Array2Code\OutputFilter;

abstract class OutputFilterAbstract {
    public function name() :string {}
    /**
     * $data配列をコード文字列に変換して返す
     * @param array $data 配列。変数名をキーにした連想配列
     */
    public function output($data) :string {}

}