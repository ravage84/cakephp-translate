<?php
namespace Translate\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Translate\Model\Table\TranslateDomainsTable;

/**
 * Translate\Model\Table\TranslateDomainsTable Test Case
 */
class TranslateDomainsTableTest extends TestCase {

	/**
	 * Test subject
	 *
	 * @var \Translate\Model\Table\TranslateDomainsTable
	 */
	public $TranslateDomains;

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = [
		'plugin.translate.translate_domains',
		'plugin.translate.translate_projects',
		'plugin.translate.translate_strings',
	];

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('TranslateDomains') ? [] : ['className' => 'Translate\Model\Table\TranslateDomainsTable'];
		$this->TranslateDomains = TableRegistry::get('TranslateDomains', $config);
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->TranslateDomains);

		parent::tearDown();
	}

	/**
	 * @return void
	 */
	public function testInstance() {
		$this->assertInstanceOf(TranslateDomainsTable::class, $this->TranslateDomains);
	}

	/**
	 * @return void
	 */
	public function testSave() {
		$data = [
			'name' => 'default',
			'translate_project_id' => 1,
		];
		$entity = $this->TranslateDomains->newEntity($data);
		$result = $this->TranslateDomains->save($entity);

		$this->assertTrue((bool)$result);
	}

	/**
	 * Test statistics method
	 *
	 * @return void
	 */
	public function testStatistics() {
		$this->markTestIncomplete('Not implemented yet.');
	}

}
