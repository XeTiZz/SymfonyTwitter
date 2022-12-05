<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221013123718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE message_public ADD util_id INT NOT NULL');
        // $this->addSql('CREATE INDEX IDX_C93B312CF5D2E80 ON message_public (util_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_public DROP FOREIGN KEY FK_C93B312CF5D2E80');
        $this->addSql('DROP INDEX IDX_C93B312CF5D2E80 ON message_public');
        $this->addSql('ALTER TABLE message_public DROP util_id');
    }
}
