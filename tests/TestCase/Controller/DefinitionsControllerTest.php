<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DefinitionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\DefinitionsController Test Case
 */
class DefinitionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.definitions',
        'app.words',
        'app.means',
        'app.users',
        'app.commentdefinitions',
        'app.commentmeans',
        'app.likedefinitions',
        'app.d_e_f_i_n_i_t_i_o_n_s',
        'app.commentdefinitions',
        'app.likedefinitions',
        'app.likemeans',
        'app.m_e_a_n_s',
        'app.means',
        'app.commentmeans',
        'app.likemeans',
        'app.definitions'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
