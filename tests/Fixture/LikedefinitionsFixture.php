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
        'IDDEFINITION' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'EMAIL' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ISLIKE' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'EMAIL' => ['type' => 'index', 'columns' => ['EMAIL'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['IDDEFINITION', 'EMAIL'], 'length' => []],
            'likedefinitions_ibfk_1' => ['type' => 'foreign', 'columns' => ['IDDEFINITION'], 'references' => ['definitions', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'likedefinitions_ibfk_2' => ['type' => 'foreign', 'columns' => ['EMAIL'], 'references' => ['accounts', 'EMAIL'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'IDDEFINITION' => 1,
            'EMAIL' => '2c10dcab-dbe6-40da-bbd1-cf316fa90957',
            'ISLIKE' => 1
        ],
    ];
}
