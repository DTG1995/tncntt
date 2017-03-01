<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DefinitionsFixture
 *
 */
class DefinitionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'WORD_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DEFINE' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        'ACCOUNT' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'CONTRIBUTE' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'IDCATE' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IDWORD' => ['type' => 'index', 'columns' => ['WORD_ID'], 'length' => []],
            'ACCOUNT' => ['type' => 'index', 'columns' => ['ACCOUNT'], 'length' => []],
            'IDCATE' => ['type' => 'index', 'columns' => ['IDCATE'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'definitions_ibfk_1' => ['type' => 'foreign', 'columns' => ['WORD_ID'], 'references' => ['words', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'definitions_ibfk_2' => ['type' => 'foreign', 'columns' => ['ACCOUNT'], 'references' => ['accounts', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'definitions_ibfk_3' => ['type' => 'foreign', 'columns' => ['IDCATE'], 'references' => ['categorys', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'ID' => 1,
            'WORD_ID' => 1,
            'DEFINE' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'ACCOUNT' => 1,
            'CONTRIBUTE' => 1,
            'IDCATE' => 1
        ],
    ];
}
