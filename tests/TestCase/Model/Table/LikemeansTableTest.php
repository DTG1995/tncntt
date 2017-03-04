<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LikemeansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LikemeansTable Test Case
 */
class LikemeansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LikemeansTable
     */
    public $Likemeans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.likemeans',
        'app.means',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Likemeans') ? [] : ['className' => 'App\Model\Table\LikemeansTable'];
        $this->Likemeans = TableRegistry::get('Likemeans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Likemeans);

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
