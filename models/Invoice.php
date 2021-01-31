<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property float $sum
 * @property int $status
 */
class Invoice extends \yii\db\ActiveRecord
{
    const STATUS_PENDING = 0;
    const STATUS_FAIL = 1;
    const STATUS_ACCEPTED = 9;
    const STATUS_SUCCESS = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sum'], 'required'],
            [['sum'], 'number'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sum' => 'Sum',
            'status' => 'Status',
        ];
    }
}
