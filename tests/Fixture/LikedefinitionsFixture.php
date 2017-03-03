<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikedefinitionsFixture
 *
 */
class LikedefinitionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'DEFINITIONS_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'USERS_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ISLIKE' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ACCOUNT' => ['type' => 'index', 'columns' => ['USERS_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['DEFINITIONS_ID', 'USERS_ID'], 'length' => []],
            'likedefinitions_ibfk_1' => ['type' => 'foreign', 'columns' => ['DEFINITIONS_ID'], 'references' => ['definitions', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'likedefinitions_ibfk_2' => ['type' => 'foreign', 'columns' => ['USERS_ID'], 'references' => ['users', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'DEFINITIONS_ID' => 1,
            'USERS_ID' => 1,
            'ISLIKE' => 1
        ],
    ];
}
