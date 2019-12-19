<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prefs Model
 *
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\HasMany $Customers
 *
 * @method \App\Model\Entity\Pref get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pref newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pref[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pref|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pref saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pref patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pref[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pref findOrCreate($search, callable $callback = null, $options = [])
 */
class PrefsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('prefs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Customers', [
            'foreignKey' => 'pref_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 10)
            ->notEmptyString('name');

        return $validator;
    }

    public function SelectChoicePrefs(bool $isEmpty = false, string $emptyStr = "")
    {
        $prefs = $this->find()->select(["value"=>"id", "text"=>"name"])->enableHydration(false)->toArray();
        if($isEmpty) array_unshift($prefs, ["text"=>(!empty($emptyStr) ? $emptyStr:""), "value"=>0]);
        return $prefs;
    }
}
