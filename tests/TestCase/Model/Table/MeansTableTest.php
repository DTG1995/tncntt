<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeansTable Test Case
 */
class MeansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MeansTable
     */
    public $Means;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.means'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Means') ? [] : ['className' => 'App\Model\Table\MeansTable'];
        $this->Means = TableRegistry::get('Means', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Means);

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
