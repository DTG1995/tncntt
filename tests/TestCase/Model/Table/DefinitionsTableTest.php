<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DefinitionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DefinitionsTable Test Case
 */
class DefinitionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DefinitionsTable
     */
    public $Definitions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.definitions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Definitions') ? [] : ['className' => 'App\Model\Table\DefinitionsTable'];
        $this->Definitions = TableRegistry::get('Definitions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Definitions);

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
}
