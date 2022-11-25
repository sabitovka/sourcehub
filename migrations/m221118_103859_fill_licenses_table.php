<?php

use yii\db\Migration;

/**
 * Class m221118_103859_fill_licenses_table
 */
class m221118_103859_fill_licenses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('licenses', [
            'name' => 'Apache 2.0',
            'full_text' => 'https://opensource.org/licenses/Apache-2.0',
        ]);
        $this->insert('licenses', [
            'name' => 'GNU GPL',
            'full_text' => 'https://opensource.org/licenses/gpl-license',
        ]);
        $this->insert('licenses', [
            'name' => 'Mozilla Public License Version 2.0',
            'full_text' => 'https://opensource.org/licenses/MPL-2.0',
        ]);
        $this->insert('licenses', [
            'name' => 'MIT',
            'full_text' => 'https://opensource.org/licenses/MIT',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('licenses');

    }
}
