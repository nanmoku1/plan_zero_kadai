<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrefsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrefsTable Test Case
 */
class PrefsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrefsTable
     */
    public $Prefs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Prefs',
        'app.Customers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Prefs') ? [] : ['className' => PrefsTable::class];
        $this->Prefs = TableRegistry::getTableLocator()->get('Prefs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prefs);

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
