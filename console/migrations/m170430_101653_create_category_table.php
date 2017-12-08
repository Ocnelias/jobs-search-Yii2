<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m170430_101653_create_category_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'category' => $this->string()->null(),
        ]);
		
      Yii::$app->db->createCommand()->batchInsert('category', ['category'], [
		
['Accounting'],
['Administrative/Clerical'],
['Arts/Entertainment/Media'],
['Automotive'],
['Biotechnology'],
['Business'],
['Construction'],
['Customer Service'],
['Education'],
['Engineering'],
['Executive'],
['Facilities'],
['Financial Services'],
['Government'],
['Healthcare'],
['Hospitality'],
['Human Resources'],
['Information Technology'],
['Insurance'],
['Law Enforcement'],
['Legal'],
['Manufacturing/Production'],
['Marketing'],
['Other'],
['Real Estate'],
['Retail/Wholesale'],
['Sales'],
['Science'],
['Telecommunications'],
['Transportation/Warehouse'],
  
  ])->execute();  
  
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable('category');
    }

}
