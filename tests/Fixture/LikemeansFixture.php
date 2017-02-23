<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikemeansFixture
 *
 */
class LikemeansFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'IDMEAN' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'EMAIL' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ISLIKE' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'EMAIL' => ['type' => 'index', 'columns' => ['EMAIL'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['IDMEAN', 'EMAIL'], 'length' => []],
            'likemeans_ibfk_1' => ['type' => 'foreign', 'columns' => ['IDMEAN'], 'references' => ['means', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'likemeans_ibfk_2' => ['type' => 'foreign', 'columns' => ['EMAIL'], 'references' => ['accounts', 'EMAIL'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'IDMEAN' => 1,
            'EMAIL' => '906a5675-d4fc-4315-b074-974310ff0fbb',
            'ISLIKE' => 1
        ],
    ];
}
