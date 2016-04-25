<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "po_po".
 *
 * @property integer $1
 * @property string $2
 * @property string $3
 * @property string $4
 * @property string $5
 * @property string $6
 * @property string $7
 * @property string $8
 * @property string $9
 * @property string $10
 * @property string $11
 * @property string $12
 * @property string $13
 * @property string $14
 * @property string $15
 * @property string $16
 * @property string $17
 * @property string $18
 * @property string $19
 * @property string $20
 * @property string $21
 * @property string $22
 * @property string $23
 * @property string $24
 * @property string $25
 * @property string $26
 * @property string $27
 * @property string $28
 * @property string $29
 * @property string $30
 * @property string $31
 * @property string $32
 * @property string $33
 * @property string $34
 * @property string $35
 * @property string $36
 * @property string $37
 * @property string $38
 * @property string $39
 */
class Pool extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'po_po';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
            '19' => '19',
            '20' => '20',
            '21' => '21',
            '22' => '22',
            '23' => '23',
            '24' => '24',
            '25' => '25',
            '26' => '26',
            '27' => '27',
            '28' => '28',
            '29' => '29',
            '30' => '30',
            '31' => '31',
            '32' => '32',
            '33' => '33',
            '34' => '34',
            '35' => '35',
            '36' => '36',
            '37' => '37',
            '38' => '38',
            '39' => '39',
        ];
    }
}
