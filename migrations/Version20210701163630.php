<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210701163630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu ADD offre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A934CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('CREATE INDEX IDX_7D053A934CC8505A ON menu (offre_id)');
        $this->addSql('ALTER TABLE offre ADD menu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FCCD7E912 ON offre (menu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A934CC8505A');
        $this->addSql('DROP INDEX IDX_7D053A934CC8505A ON menu');
        $this->addSql('ALTER TABLE menu DROP offre_id');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FCCD7E912');
        $this->addSql('DROP INDEX IDX_AF86866FCCD7E912 ON offre');
        $this->addSql('ALTER TABLE offre DROP menu_id');
    }
}
