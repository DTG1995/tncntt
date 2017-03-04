<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentdefinitionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommentdefinitionsTable Test Case
 */
class CommentdefinitionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommentdefinitionsTable
     */
    public $Commentdefinitions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.commentdefinitions',
        'app.definitions',
        'app.words',
        'app.means',
        'app.users',
        'app.commentdefinitions',
        'app.user',
        'app.commentmeans',
        'app.likedefinitions',
        'app.d_e_f_i_n_i_t_i_o_n_s',
        'app.likedefinitions',
        'app.likemeans',
        'app.m_e_a_n_s',
        'app.means',
        'app.commentmeans',
        'app.likemeans',
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
        $config = TableRegistry::exists('Commentdefinitions') ? [] : ['className' => 'App\Model\Table\CommentdefinitionsTable'];
        $this->Commentdefinitions = TableRegistry::get('Commentdefinitions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Commentdefinitions);

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
