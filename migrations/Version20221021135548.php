<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221021135548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_prive ADD util_mp_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE message_prive ADD CONSTRAINT FK_2DB3B2621724753 FOREIGN KEY (util_mp_id_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DB3B2621724753 ON message_prive (util_mp_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_prive DROP FOREIGN KEY FK_2DB3B2621724753');
        $this->addSql('DROP INDEX UNIQ_2DB3B2621724753 ON message_prive');
        $this->addSql('ALTER TABLE message_prive DROP util_mp_id_id');
    }
}
