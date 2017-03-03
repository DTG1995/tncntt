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
        'MEANS_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'USERS_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ISLIKE' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ACCOUNT' => ['type' => 'index', 'columns' => ['USERS_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['MEANS_ID', 'USERS_ID'], 'length' => []],
            'likemeans_ibfk_1' => ['type' => 'foreign', 'columns' => ['MEANS_ID'], 'references' => ['means', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'likemeans_ibfk_2' => ['type' => 'foreign', 'columns' => ['USERS_ID'], 'references' => ['users', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'MEANS_ID' => 1,
            'USERS_ID' => 1,
            'ISLIKE' => 1
        ],
    ];
}
