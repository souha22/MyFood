<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210707224340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_commande_menu (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, commande_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_1D0A3A11CCD7E912 (menu_id), INDEX IDX_1D0A3A1182EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande_produit (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, commande_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_5BAB3E38F347EFB (produit_id), INDEX IDX_5BAB3E3882EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_commande_menu ADD CONSTRAINT FK_1D0A3A11CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE ligne_commande_menu ADD CONSTRAINT FK_1D0A3A1182EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande_produit ADD CONSTRAINT FK_5BAB3E38F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_commande_produit ADD CONSTRAINT FK_5BAB3E3882EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('DROP TABLE menu_offre');
        $this->addSql('ALTER TABLE commande ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DFB88E14F ON commande (utilisateur_id)');
        $this->addSql('ALTER TABLE ingredient ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93FCFA10B');
        $this->addSql('DROP INDEX IDX_7D053A93FCFA10B ON menu');
        $this->addSql('ALTER TABLE menu CHANGE id_restaurant_id restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93B1E7706E ON menu (restaurant_id)');
        $this->addSql('ALTER TABLE offre ADD menu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FCCD7E912 ON offre (menu_id)');
        $this->addSql('ALTER TABLE produit ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE recette ADD image VARCHAR(255) NOT NULL, ADD nbr_like INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_offre (menu_id INT NOT NULL, offre_id INT NOT NULL, INDEX IDX_3E2AA5084CC8505A (offre_id), INDEX IDX_3E2AA508CCD7E912 (menu_id), PRIMARY KEY(menu_id, offre_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menu_offre ADD CONSTRAINT FK_3E2AA5084CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_offre ADD CONSTRAINT FK_3E2AA508CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE ligne_commande_menu');
        $this->addSql('DROP TABLE ligne_commande_produit');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DFB88E14F');
        $this->addSql('DROP INDEX IDX_6EEAA67DFB88E14F ON commande');
        $this->addSql('ALTER TABLE commande DROP utilisateur_id');
        $this->addSql('ALTER TABLE ingredient DROP image');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93B1E7706E');
        $this->addSql('DROP INDEX IDX_7D053A93B1E7706E ON menu');
        $this->addSql('ALTER TABLE menu CHANGE restaurant_id id_restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93FCFA10B FOREIGN KEY (id_restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93FCFA10B ON menu (id_restaurant_id)');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FCCD7E912');
        $this->addSql('DROP INDEX IDX_AF86866FCCD7E912 ON offre');
        $this->addSql('ALTER TABLE offre DROP menu_id');
        $this->addSql('ALTER TABLE produit DROP image');
        $this->addSql('ALTER TABLE recette DROP image, DROP nbr_like');
    }
}
