<?php

namespace app\models;

use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `app\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * Результаты поиска по каталогу программ
     */
    public function getSearchResult($search) {
        if ($search == '') {
            return self::find()->all();
        }
        $search = $this->cleanSearchString($search);
        if (empty($search)) {
            return [];
        }

        $query = self::find()
            ->orWhere(['like', 'name', $search])
            ->OrWhere(['like', 'description', $search])
            ->OrWhere(['like', 'short_description', $search]);
        $products = $query
            ->asArray()
            ->all();

        return $products;
    }

    /**
     * Вспомогательная функция, очищает строку поискового запроса с сайта
     * от всякого мусора
     */
    protected function cleanSearchString($search) {
        $search = iconv_substr($search, 0, 64);
        // удаляем все, кроме букв и цифр
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
        // сжимаем двойные пробелы
        $search = preg_replace('#\s+#u', ' ', $search);
        $search = trim($search);
        return $search;
    }

}
