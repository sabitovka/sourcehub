<?php

use yii\db\Migration;

/**
 * Class m221125_093115_fill_projects_table
 */
class m221125_093115_fill_projects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'username' => 'Migration User 1',
            'email' => 'foo@bar.io',
            'password' => '1234'
        ]);
        $this->insert('users', [
            'username' => 'Migration User 2',
            'email' => 'foo1@bar.io',
            'password' => '1234'
        ]);
        $this->insert('users', [
            'username' => 'Migration User 3',
            'email' => 'foo2@bar.io',
            'password' => '1234'
        ]);

        #region projects
        $this->insert('projects', [
            'name' => '7-Zip',
            'urlname' => 'sevenzip',
            'short_description' => 'Бесплатный файловый архиватор для чрезвычайно высокого сжатия',
            'description' => '7-Zip - это файловый архиватор с высокой степенью сжатия. Вы можете использовать 7-Zip на любом компьютере,
                включая компьютер в коммерческой организации. Вам не нужно регистрироваться или платить за 7-Zip. 7-Zip работает для
                Windows 7, Vista, XP, 2008, 2003, 2000, NT, ME и 98. И есть порт версии командной строки для Linux / Unix.
                Большая часть исходного кода находится под лицензией GNU LGPL. Код unRAR находится под смешанной лицензией с
                ограничениями GNU LGPL + unRAR. Проверьте лицензию для получения подробной информации.',
            'category_id' => 3,
            'license_id' => 6,
            'platform_id' => 7,
            'user_id' => 1
        ]);

        $this->insert('projects', [
            'name' => 'XAMPP',
            'urlname' => 'xampp',
            'short_description' => 'Простой в установке дистрибутив Apache, содержащий MySQL, PHP и Perl',
            'description' => 'XAMPP - это очень простой в установке дистрибутив Apache для Linux, Solaris, Windows и Mac OS X.
                Пакет включает в себя веб-сервер Apache, MySQL, PHP, Perl, FTP-сервер и phpMyAdmin.',
            'category_id' => 1,
            'license_id' => 5,
            'platform_id' => 7,
            'user_id' => 2
        ]);

        $this->insert('projects', [
            'name' => 'MinGW - Minimalist GNU for Windows',
            'urlname' => 'mingw',
            'short_description' => 'Нативный порт Windows для GNU Compiler Collection (GCC)',
            'description' => 'Этот проект находится в процессе перехода к osdn.net/projects/mingw , вы можете продолжать следовать за нами там.

            MinGW: собственный порт Windows для GNU Compiler Collection (GCC), со свободно распространяемыми библиотеками импорта и файлами заголовков для создания
                собственных приложений Windows; включает расширения среды выполнения MSVC для поддержки функциональности C99. Все программное обеспечение
                MinGW будет выполняться на 64-разрядных платформах Windows.',
            'category_id' => 1,
            'license_id' => 6,
            'platform_id' => 7,
            'user_id' => 3
        ]);
        #endregion

        #region 7zip
        $this->insert('screenshots', [
            'alt' => '7-Zip 1',
            'filename' => '/upload/projects/1-sevenzip/screenshots/screenshot1.txt',
            'project_id' => 1,
        ]);

        $this->insert('screenshots', [
            'alt' => '7-Zip 2',
            'filename' => '/upload/projects/1-sevenzip/screenshots/screenshot2.txt',
            'project_id' => 1,
        ]);

        $this->insert('files', [
            'filename' => '/upload/projects/1-sevenzip/files/install-win.txt',
            'name' => '7-Zip Windows.exe',
            'project_id' => 1,
        ]);

        $this->insert('files', [
            'filename' => '/upload/projects/1-sevenzip/files/install-mac.txt',
            'name' => '7-Zip MacOS.hz',
            'project_id' => 1,
        ]);
        #endregion

        #region XAMPP
        $this->insert('screenshots', [
            'alt' => 'xampp 1',
            'filename' => '/upload/projects/2-xampp/screenshots/screenshot1.txt',
            'project_id' => 1,
        ]);

        $this->insert('screenshots', [
            'alt' => '7-Zip 2',
            'filename' => '/upload/projects/2-xampp/screenshots/screenshot2.txt',
            'project_id' => 1,
        ]);

        $this->insert('files', [
            'filename' => '/upload/projects/2-xampp/files/install-win.txt',
            'name' => '7-Zip Windows.exe',
            'project_id' => 1,
        ]);

        $this->insert('files', [
            'filename' => '/upload/projects/2-xampp/files/install-mac.txt',
            'name' => '7-Zip MacOS.hz',
            'project_id' => 1,
        ]);
        #endregion

        #region XAMPP
        $this->insert('screenshots', [
            'alt' => 'MinGW 1',
            'filename' => '/upload/projects/3-xampp/screenshots/screenshot1.txt',
            'project_id' => 1,
        ]);

        $this->insert('screenshots', [
            'alt' => '7-MinGW 3',
            'filename' => '/upload/projects/3-xampp/screenshots/screenshot2.txt',
            'project_id' => 1,
        ]);

        $this->insert('files', [
            'filename' => '/upload/projects/3-MinGW/files/install-win.txt',
            'name' => 'MinGW Windows.exe',
            'project_id' => 1,
        ]);
        #endregion

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('files');
        $this->delete('screenshots');
        $this->delete('projects');

        return false;
    }
}
