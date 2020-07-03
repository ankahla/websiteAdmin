<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200703181728 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Load demo data';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');
        // table fos_user
        $this->addSql('INSERT INTO fos_user (id, email, username, username_canonical, email_canonical, enabled, salt, password, last_login, confirmation_token, password_requested_at, roles, first_name, last_name, function, avatar, phone, mobile, fb, skype) 
VALUES (1, \'demo@demo.com\', \'demo\', \'demo\', \'demo@demo.com\', 1, \'xJph8b5XLuPHzQFb.03XIx3DSQw36gparshyVl73eXU\', \'$2y$13$Rvg5th2tFVmLwcb/JRKv1.gISXbuD9jICTaPrja6imDKtXuSv6zyu\', \'2020-07-03 19:32:16\', null, null, \'a:1:{i:0;s:10:"ROLE_ADMIN";}\', null, null, null, null, null, null, null, null);');
        // table `cms`
        $this->addSql("INSERT INTO `cms` (`id`, `id_website`, `admin_url`, `type`, `login`, `password`, `contact`) VALUES
(1, 2, 'http://www.test1.com/administrator', 'Joomla', 'test', '123456', 'info@contact.com'),
(2, 3, 'http://www.test2.com/administrator', 'Joomla', 'test', '123456', 'info@contact.com');");
        // table `dbs`
        $this->addSql("INSERT INTO `dbs` (`id`, `id_website`, `host`, `db`, `login`, `passwd`) VALUES
(2, 2, 'localhost', 'dev_db1', 'dev_u1', '123456'),
(3, 3, 'localhost', 'dev_db2', 'dev_u2', '123456'),
(4, 3, 'localhost', 'dev_db3', 'dev_u3', '123456');");
        // table email_acc
        $this->addSql("INSERT INTO `email_acc` (`id`, `id_website`, `email`, `password`) VALUES (2, 3, 'info@test3.com', 'infoxspreads');");
        // table ftp_acc
        $this->addSql("INSERT INTO `ftp_accounts` (`id`, `id_website`, `host`, `login`, `passwd`) VALUES
(3, 2, 'test2.com', 'axein260', 'axe2012'),
(4, 3, 'test3', 'xspre267', 'spreads2012');");
        // table social acc
        $this->addSql("INSERT INTO `social_acc` (`id`, `id_website`, `link`, `login`, `passwd`) VALUES
(1, 2, 'https://fr-fr.facebook.com/pages/Crea-Digital/429075217148118', 'hidden ', 'pass'),
(2, 3, 'http://www.viadeo.com/fr/company/crea-digital-sousse', 'hidden@hidden.net', 'pass');");
        // table website
        $this->addSql("INSERT INTO `website` (`id`, `domain`, `ip`, `cpanel`, `cplogin`, `cppass`, `pop3`, `smtp`, `webmail`, `dns1`, `dns2`, `billing`, `billinglogin`, `billingpass`, `notes`, `owner`, `upd_date`, `created_date`) VALUES
(2, 'test2.com', '70.33.246.40', 'http://test2/cpanel', 'test', 'axe2012', 'mail.test2.com', 'mail.axeinvest.com', 'http://test2.com/webmail', 'ns1.test2.com', 'ns2.test2.com', 'https://billing.test2.eu', '202270', 'test22012', '', 'Jimmy', '2013-12-15 05:19:59', '0000-00-00 00:00:00'),
(3, 'test3.com', '70.33.246.170', 'http://test3/cpanel', 'test', 'xspreads2012', 'mail.test3.com', 'mail.test3.com', 'http://test3.com/webmail', 'ns1.test3.com', 'ns2.test3.com', 'https://billing.test3.eu', '211902', 'test32012', '', 'Jimmy', '2013-12-15 05:37:03', '2013-12-15 05:37:03');");
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');
        $this->addSql('DELETE FROM fos_user WHERE id = 1');
        $this->addSql('DELETE FROM cms WHERE id IN (1,2)');
        $this->addSql('DELETE FROM dbs WHERE id IN (2,3,4)');
        $this->addSql('DELETE FROM email_acc WHERE id = 2');
        $this->addSql('DELETE FROM ftp_accounts WHERE id IN (3,4)');
        $this->addSql('DELETE FROM social_acc WHERE id IN (1,2)');
        $this->addSql('DELETE FROM website WHERE id IN (2,3)');
    }
}
