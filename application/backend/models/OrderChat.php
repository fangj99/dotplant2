<?php

namespace app\backend\models;

use app\models\User;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_chat".
 *
 * @property string $id
 * @property string $order_id
 * @property string $user_id
 * @property string $date
 * @property string $message
 */
class OrderChat extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_chat}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'message'], 'required'],
            [['order_id', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['message'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'date' => Yii::t('app', 'Date'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
