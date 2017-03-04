<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LikedefinitionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LikedefinitionsTable Test Case
 */
class LikedefinitionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LikedefinitionsTable
     */
    public $Likedefinitions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.likedefinitions',
        'app.definitions',
        'app.words',
        'app.users',
        'app.categorys',
        'app.means',
        'app.commentdefinitions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Likedefinitions') ? [] : ['className' => 'App\Model\Table\LikedefinitionsTable'];
        $this->Likedefinitions = TableRegistry::get('Likedefinitions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Likedefinitions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
