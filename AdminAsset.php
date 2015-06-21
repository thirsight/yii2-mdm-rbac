<?php

namespace mdm\rbac;

/**
 * AdminAsset
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class AdminAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@mdm/rbac/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'main.css',
    ];

}
