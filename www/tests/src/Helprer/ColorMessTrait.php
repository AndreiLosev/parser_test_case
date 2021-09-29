<?php

namespace Sotbit\Parsertest\Helprer;

trait ColorMessTrait
{
    protected static function setSpace(string $mes, string $type): string {
        $len = strlen($mes);
        $space = ' ';
        for ($i=  0; $i < $len+3; $i++) {
            $space .= ' ';
        }
        $n = PHP_EOL;
        return "  <{$type}>{$space}</>{$n}  <{$type}>  {$mes}  </>{$n}  <{$type}>{$space}</>";
    }

    protected static function infoMess(string $mes): string
    {
        return self::setSpace($mes, 'info');
    }

    protected static function commentMess(string $mes): string
    {
        return self::setSpace($mes, 'comment');
    }

    protected static function questionMess(string $mes): string
    {
        return self::setSpace($mes, 'question');
    }

    protected static function errorMess(string $mes): string
    {
        return self::setSpace($mes, 'error');
    }
}