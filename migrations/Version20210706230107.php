<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210706230107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_commande_menu ADD menu_id INT DEFAULT NULL, ADD commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_commande_menu ADD CONSTRAINT FK_1D0A3A11CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE ligne_commande_menu ADD CONSTRAINT FK_1D0A3A1182EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_1D0A3A11CCD7E912 ON ligne_commande_menu (menu_id)');
        $this->addSql('CREATE INDEX IDX_1D0A3A1182EA2E54 ON ligne_commande_menu (commande_id)');
        $this->addSql('ALTER TABLE ligne_commande_produit ADD produit_id INT DEFAULT NULL, ADD commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_commande_produit ADD CONSTRAINT FK_5BAB3E38F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_commande_produit ADD CONSTRAINT FK_5BAB3E3882EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_5BAB3E38F347EFB ON ligne_commande_produit (produit_id)');
        $this->addSql('CREATE INDEX IDX_5BAB3E3882EA2E54 ON ligne_commande_produit (commande_id)');
        $this->addSql('ALTER TABLE menu ADD restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93B1E7706E ON menu (restaurant_id)');
        $this->addSql('ALTER TABLE produit ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_commande_menu DROP FOREIGN KEY FK_1D0A3A11CCD7E912');
        $this->addSql('ALTER TABLE ligne_commande_menu DROP FOREIGN KEY FK_1D0A3A1182EA2E54');
        $this->addSql('DROP INDEX IDX_1D0A3A11CCD7E912 ON ligne_commande_menu');
        $this->addSql('DROP INDEX IDX_1D0A3A1182EA2E54 ON ligne_commande_menu');
        $this->addSql('ALTER TABLE ligne_commande_menu DROP menu_id, DROP commande_id');
        $this->addSql('ALTER TABLE ligne_commande_produit DROP FOREIGN KEY FK_5BAB3E38F347EFB');
        $this->addSql('ALTER TABLE ligne_commande_produit DROP FOREIGN KEY FK_5BAB3E3882EA2E54');
        $this->addSql('DROP INDEX IDX_5BAB3E38F347EFB ON ligne_commande_produit');
        $this->addSql('DROP INDEX IDX_5BAB3E3882EA2E54 ON ligne_commande_produit');
        $this->addSql('ALTER TABLE ligne_commande_produit DROP produit_id, DROP commande_id');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93B1E7706E');
        $this->addSql('DROP INDEX IDX_7D053A93B1E7706E ON menu');
        $this->addSql('ALTER TABLE menu DROP restaurant_id');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('DROP INDEX IDX_29A5EC27BCF5E72D ON produit');
        $this->addSql('ALTER TABLE produit DROP categorie_id');
    }
}
