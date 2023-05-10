<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221014115356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom_util VARCHAR(40) NOT NULL, prenom_util VARCHAR(40) NOT NULL, pseudo_util VARCHAR(20) NOT NULL, age_util TINYINT(1) NOT NULL, date_crea_util DATETIME NOT NULL, actif_util TINYINT(1) NOT NULL, pfp_user VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_public (id INT AUTO_INCREMENT NOT NULL, util_id INT NOT NULL, texte_message VARCHAR(255) DEFAULT NULL, like_message INT NOT NULL, rt_message INT NOT NULL, image VARCHAR(255) DEFAULT NULL, date_crea_message DATETIME NOT NULL, INDEX IDX_C93B312CF5D2E80 (util_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, message_p_id INT DEFAULT NULL, INDEX IDX_AC6340B3A76ED395 (user_id), INDEX IDX_AC6340B37AEEF87B (message_p_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message_public ADD CONSTRAINT FK_C93B312CF5D2E80 FOREIGN KEY (util_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B37AEEF87B FOREIGN KEY (message_p_id) REFERENCES message_public (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_public DROP FOREIGN KEY FK_C93B312CF5D2E80');
        $this->addSql('DROP TABLE message_public');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
