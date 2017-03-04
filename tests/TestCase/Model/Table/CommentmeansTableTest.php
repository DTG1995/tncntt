<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentmeansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommentmeansTable Test Case
 */
class CommentmeansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommentmeansTable
     */
    public $Commentmeans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.commentmeans',
        'app.means',
        'app.words',
        'app.definitions',
        'app.users',
        'app.commentdefinitions',
        'app.likedefinitions',
        'app.likemeans',
        'app.categorys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Commentmeans') ? [] : ['className' => 'App\Model\Table\CommentmeansTable'];
        $this->Commentmeans = TableRegistry::get('Commentmeans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Commentmeans);

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
