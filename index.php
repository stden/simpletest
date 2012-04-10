<?php
if (!defined('SIMPLE_TEST')) {
    define('SIMPLE_TEST', ''); // simpletest/
}
require_once SIMPLE_TEST . 'unit_tester.php';
require_once SIMPLE_TEST . 'reporter.php';
require_once 'classes/log.php';

class TestOfLogging extends UnitTestCase
{
    function TestOfLogging()
    {
        parent::__construct('Log class test');
    }

    function testCreatingNewFile()
    {
        @unlink('temp/test.log');
        $log = new Log('temp/test.log');
        $log->message('Should write this to a file');
        $this->assertTrue(file_exists('temp/test.log'), 'File created');
    }
}

$test = new TestOfLogging();
$test->run(new HtmlReporter());
?>