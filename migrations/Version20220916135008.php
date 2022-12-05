<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220916135008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_util VARCHAR(40) NOT NULL, prenom_util VARCHAR(40) NOT NULL, pseudo_util VARCHAR(20) NOT NULL, email_util VARCHAR(70) NOT NULL, pass_util VARCHAR(40) NOT NULL, age_util TINYINT(1) NOT NULL, date_crea DATETIME NOT NULL, actif_util TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('DROP TABLE utilisateur');
    }
}
