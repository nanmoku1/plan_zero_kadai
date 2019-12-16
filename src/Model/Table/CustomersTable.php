<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \App\Model\Table\PrevesTable&\Cake\ORM\Association\BelongsTo $Preves
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersTable extends Table
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

        $this->setTable('customers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Prefs', [
            'foreignKey' => 'pref_id',
            'fields'=>['name'],
            'joinType' => 'LEFT',
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
            ->notEmptyString('name', "全ての項目は必須です。")
            ->add('name', 'custom1', [
                'rule' => function ($value, $context) {
                    // \Cake\Error\Debugger::log(var_export($value, true));
                    if(!preg_match('/^[^ -~｡-ﾟ\x00-\x1f\t]+$/u', $value)){ //全角のみか否か。半角が混ざっていればfalse
                        return false;
                    }
                    else if(mb_strlen($value) > 50){ //50文字以内か否か。51文字異常ならばfalse
                        return false;
                    }
                    return true;
                },
                'message' => '氏名は、全角50文字以内でご入力下さい。'
            ])
            ;

        $validator
            ->scalar('tel')
            ->notEmptyString('tel', "全ての項目は必須です。")
            ->add('tel', 'custom2', [
                'rule' => function ($value, $context) {
                    \Cake\Error\Debugger::log(var_export($value, true));
                    if(!preg_match('/^[0-9]+$/u', $value)){ //半角数値のみか否か。半角数値以外が混ざっていればfalse
                        return false;
                    }
                    return true;
                },
                'message' => '電話番号は、半角数字のみでご入力ください。'
            ])
            ->add('tel', 'custom3', [
                'rule' => function ($value, $context) {
                    if(mb_strlen($value) > 50){ //50文字以内か否か。51文字異常ならばfalse
                        return false;
                    }
                    return true;
                },
                'message' => '電話番号は、半角50文字以内でご入力ください。'
            ]);

        $validator
        ->integer('pref_id')
        ->add('pref_id', 'custom4', [
            'rule' => function ($value, $context) {
                return ($value == 0 ? false:true);
            },
            'message' => '全ての項目は必須です。'
        ])
        ;

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['pref_id'], 'prefs'));

    //     return $rules;
    // }
}
