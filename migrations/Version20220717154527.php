<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220717154527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amendement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, term INT NOT NULL, date_effect DATE NOT NULL, date_ending DATE NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contract (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(100) NOT NULL, name VARCHAR(100) NOT NULL, our_company_quality VARCHAR(100) NOT NULL, partner_quality VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', purpose VARCHAR(100) NOT NULL, territory VARCHAR(100) NOT NULL, term INT NOT NULL, date_effect DATE NOT NULL, date_ending DATE NOT NULL, registration VARCHAR(255) NOT NULL, marketing_rate VARCHAR(255) DEFAULT NULL, monthly_reports VARCHAR(255) DEFAULT NULL, quaterly_reports VARCHAR(255) DEFAULT NULL, sell_objectives LONGTEXT DEFAULT NULL, stocks VARCHAR(255) DEFAULT NULL, retention_period VARCHAR(255) DEFAULT NULL, no_competition LONGTEXT DEFAULT NULL, sell_internet VARCHAR(255) DEFAULT NULL, supply_order LONGTEXT DEFAULT NULL, delivery LONGTEXT DEFAULT NULL, reception LONGTEXT DEFAULT NULL, price INT NOT NULL, price_revision LONGTEXT DEFAULT NULL, payment LONGTEXT DEFAULT NULL, penalties VARCHAR(255) DEFAULT NULL, retention_title LONGTEXT DEFAULT NULL, liability LONGTEXT DEFAULT NULL, insurance LONGTEXT DEFAULT NULL, termination LONGTEXT DEFAULT NULL, termination_consequences LONGTEXT DEFAULT NULL, confidentiality_scope LONGTEXT DEFAULT NULL, applicable_law VARCHAR(255) DEFAULT NULL, dispute VARCHAR(255) DEFAULT NULL, partial_invalidity VARCHAR(255) DEFAULT NULL, entire_agreement VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE amendement');
        $this->addSql('DROP TABLE contract');
        $this->addSql('DROP TABLE status');
    }
}
