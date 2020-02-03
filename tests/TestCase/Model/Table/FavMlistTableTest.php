<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavMlistTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavMlistTable Test Case
 */
class FavMlistTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FavMlistTable
     */
    public $FavMlist;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FavMlist',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FavMlist') ? [] : ['className' => FavMlistTable::class];
        $this->FavMlist = TableRegistry::getTableLocator()->get('FavMlist', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FavMlist);

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
