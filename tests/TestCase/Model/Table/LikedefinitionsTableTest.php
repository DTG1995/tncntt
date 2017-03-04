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
        'app.d_e_f_i_n_i_t_i_o_n_s',
        'app.words',
        'app.means',
        'app.users',
        'app.commentdefinitions',
        'app.definitions',
        'app.categorys',
        'app.commentdefinitions',
        'app.commentmeans',
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
}
