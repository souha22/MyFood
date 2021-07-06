<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210701162138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE ligne_commande_menu_menu');
        $this->addSql('DROP TABLE ligne_commande_produit_produit');
        $this->addSql('DROP TABLE menu_offre');
        $this->addSql('ALTER TABLE ligne_commande_menu DROP FOREIGN KEY FK_1D0A3A1182EA2E54');
        $this->addSql('DROP INDEX IDX_1D0A3A1182EA2E54 ON ligne_commande_menu');
        $this->addSql('ALTER TABLE ligne_commande_menu DROP commande_id');
        $this->addSql('ALTER TABLE ligne_commande_produit DROP FOREIGN KEY FK_5BAB3E3882EA2E54');
        $this->addSql('DROP INDEX IDX_5BAB3E3882EA2E54 ON ligne_commande_produit');
        $this->addSql('ALTER TABLE ligne_commande_produit DROP commande_id');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93FCFA10B');
        $this->addSql('DROP INDEX IDX_7D053A93FCFA10B ON menu');
        $this->addSql('ALTER TABLE menu DROP id_restaurant_id');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('DROP INDEX IDX_29A5EC27BCF5E72D ON produit');
        $this->addSql('ALTER TABLE produit DROP categorie_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, id_menu_id INT DEFAULT NULL, id_produit_id INT DEFAULT NULL, id_commande_id INT DEFAULT NULL, id_utilisateur_id INT DEFAULT NULL, quantite INT DEFAULT NULL, INDEX IDX_3170B74BC6EE5C49 (id_utilisateur_id), INDEX IDX_3170B74B124A4062 (id_menu_id), INDEX IDX_3170B74BAABEFE2C (id_produit_id), INDEX IDX_3170B74B9AF8E3A3 (id_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ligne_commande_menu_menu (ligne_commande_menu_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_10CD05B5BED93B0D (ligne_commande_menu_id), INDEX IDX_10CD05B5CCD7E912 (menu_id), PRIMARY KEY(ligne_commande_menu_id, menu_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ligne_commande_produit_produit (ligne_commande_produit_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_CF81846A4CF8105E (ligne_commande_produit_id), INDEX IDX_CF81846AF347EFB (produit_id), PRIMARY KEY(ligne_commande_produit_id, produit_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu_offre (menu_id INT NOT NULL, offre_id INT NOT NULL, INDEX IDX_3E2AA508CCD7E912 (menu_id), INDEX IDX_3E2AA5084CC8505A (offre_id), PRIMARY KEY(menu_id, offre_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B124A4062 FOREIGN KEY (id_menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B9AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE ligne_commande_menu_menu ADD CONSTRAINT FK_10CD05B5BED93B0D FOREIGN KEY (ligne_commande_menu_id) REFERENCES ligne_commande_menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande_menu_menu ADD CONSTRAINT FK_10CD05B5CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande_produit_produit ADD CONSTRAINT FK_CF81846A4CF8105E FOREIGN KEY (ligne_commande_produit_id) REFERENCES ligne_commande_produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande_produit_produit ADD CONSTRAINT FK_CF81846AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_offre ADD CONSTRAINT FK_3E2AA5084CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_offre ADD CONSTRAINT FK_3E2AA508CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande_menu ADD commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_commande_menu ADD CONSTRAINT FK_1D0A3A1182EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_1D0A3A1182EA2E54 ON ligne_commande_menu (commande_id)');
        $this->addSql('ALTER TABLE ligne_commande_produit ADD commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_commande_produit ADD CONSTRAINT FK_5BAB3E3882EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_5BAB3E3882EA2E54 ON ligne_commande_produit (commande_id)');
        $this->addSql('ALTER TABLE menu ADD id_restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93FCFA10B FOREIGN KEY (id_restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93FCFA10B ON menu (id_restaurant_id)');
        $this->addSql('ALTER TABLE produit ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
    }
}
