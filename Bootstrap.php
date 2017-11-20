<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\im;

use Yii;
use yii\base\Event;
use yii\base\BootstrapInterface;
use yuncms\core\helpers\ShortURL;
use yuncms\user\models\User;
use xutl\tim\ImJob;

/**
 * Class Bootstrap
 * @package yuncms\im
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        Event::on(User::className(), User::AFTER_CREATE, function ($event) {
            Yii::$app->queue->push(new ImJob([
                'action' => ImJob::ACTION_ACCOUNT_CREATE,
                'params' => [
                    'Identifier' => ShortURL::encode($event->sender->id),
                    'Nick' => $event->sender->nickname,
                    //'FaceUrl'
                ],
            ]));
        });
    }
}