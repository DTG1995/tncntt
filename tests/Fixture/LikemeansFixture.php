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
        'ACCOUNT' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ISLIKE' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ACCOUNT' => ['type' => 'index', 'columns' => ['ACCOUNT'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['IDMEAN', 'ACCOUNT'], 'length' => []],
            'likemeans_ibfk_1' => ['type' => 'foreign', 'columns' => ['IDMEAN'], 'references' => ['means', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'likemeans_ibfk_2' => ['type' => 'foreign', 'columns' => ['ACCOUNT'], 'references' => ['accounts', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'ACCOUNT' => 1,
            'ISLIKE' => 1
        ],
    ];
}
