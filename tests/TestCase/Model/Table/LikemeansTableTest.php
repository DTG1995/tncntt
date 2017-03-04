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
        'app.m_e_a_n_s',
        'app.words',
        'app.means',
        'app.users',
        'app.commentdefinitions',
        'app.definitions',
        'app.categorys',
        'app.commentdefinitions',
        'app.likedefinitions',
        'app.commentmeans',
        'app.likedefinitions',
        'app.likemeans',
        'app.means',
        'app.commentmeans',
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
}
