<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191229195257 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE channel ADD COLUMN extvlcopt VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__channel AS SELECT id, title, url, logo_filename, tvgid, note, created_at, group_id FROM "channel"');
        $this->addSql('DROP TABLE "channel"');
        $this->addSql('CREATE TABLE "channel" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, logo_filename VARCHAR(255) DEFAULT NULL, tvgid VARCHAR(255) DEFAULT NULL, note CLOB DEFAULT NULL, created_at DATETIME NOT NULL, group_id INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO "channel" (id, title, url, logo_filename, tvgid, note, created_at, group_id) SELECT id, title, url, logo_filename, tvgid, note, created_at, group_id FROM __temp__channel');
        $this->addSql('DROP TABLE __temp__channel');
    }
}
