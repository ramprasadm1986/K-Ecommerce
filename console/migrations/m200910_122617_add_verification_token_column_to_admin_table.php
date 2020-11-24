<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%admin}}`.
 */
class m200910_122617_add_verification_token_column_to_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->addColumn('{{%admin}}', 'verification_token', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
         $this->dropColumn('{{%admin}}', 'verification_token');
    }
}
