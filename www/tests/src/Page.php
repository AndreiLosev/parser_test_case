<?php

namespace Sotbit\Parsertest;

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Type\DateTime;
use Error;

class Page
{
    const TestIblockPostFix = 'TEST';
    protected string $pagePath;
    protected int $new_iblock_id;
    protected int $iblock_id;

    public function __construct()
    {
        $this->pagePath = $_SERVER['DOCUMENT_ROOT'] . '/test_public/page_test.php';
        $this->iblock_id = 1;
    }

    public function run()
    {
        $this->copyIblock();
    }

    protected function copyIblock()
    {
        $old_iblock = IblockTable::query()
            ->setSelect(['*'])
            ->where('ID', $this->iblock_id)
            ->fetch();

        $new_iblock = IblockTable::query()
            ->setSelect(['*'])
            ->where('CODE', $old_iblock['CODE'] . self::TestIblockPostFix)
            ->where('NAME', $old_iblock['NAME'] . self::TestIblockPostFix)
            ->fetch();


        if (!empty($new_iblock)) {
            $mess = 'iblock for Tests already exists';
            throw new Error(PHP_EOL . $mess . PHP_EOL . __METHOD__ . PHP_EOL);
        }

        unset($old_iblock['ID']);
        $old_iblock['NAME'] .= self::TestIblockPostFix;
        $old_iblock['CODE'] .= self::TestIblockPostFix;
        $old_iblock['VERSION'] = 1;

        $result = IblockTable::add($old_iblock);
        if (!$result->isSuccess()) {

            $mess = implode(' --- ', $result->getErrorMessages());

            throw new Error(PHP_EOL . $mess . PHP_EOL . __METHOD__ . PHP_EOL);
        }

        $this->new_iblock_id = $result->getId();
    }
}