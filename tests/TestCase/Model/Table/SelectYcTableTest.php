<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SelectYcTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SelectYcTable Test Case
 */
class SelectYcTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SelectYcTable
     */
    public $SelectYc;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SelectYc',
        'app.Ycs',
        'app.YcLists',
        'app.PicGens',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SelectYc') ? [] : ['className' => SelectYcTable::class];
        $this->SelectYc = TableRegistry::getTableLocator()->get('SelectYc', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SelectYc);

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
