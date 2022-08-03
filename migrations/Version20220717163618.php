<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220717163618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amendement ADD contract_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE amendement ADD CONSTRAINT FK_DAF098C42576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id)');
        $this->addSql('CREATE INDEX IDX_DAF098C42576E0FD ON amendement (contract_id)');
        $this->addSql('ALTER TABLE contract ADD category_id INT DEFAULT NULL, ADD our_company_id INT DEFAULT NULL, ADD partner_id INT DEFAULT NULL, ADD status_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F285912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859FB0FC9A6 FOREIGN KEY (our_company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F28599393F8FE FOREIGN KEY (partner_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F28596BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E98F285912469DE2 ON contract (category_id)');
        $this->addSql('CREATE INDEX IDX_E98F2859FB0FC9A6 ON contract (our_company_id)');
        $this->addSql('CREATE INDEX IDX_E98F28599393F8FE ON contract (partner_id)');
        $this->addSql('CREATE INDEX IDX_E98F28596BF700BD ON contract (status_id)');
        $this->addSql('CREATE INDEX IDX_E98F2859A76ED395 ON contract (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amendement DROP FOREIGN KEY FK_DAF098C42576E0FD');
        $this->addSql('DROP INDEX IDX_DAF098C42576E0FD ON amendement');
        $this->addSql('ALTER TABLE amendement DROP contract_id');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F285912469DE2');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F2859FB0FC9A6');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F28599393F8FE');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F28596BF700BD');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F2859A76ED395');
        $this->addSql('DROP INDEX IDX_E98F285912469DE2 ON contract');
        $this->addSql('DROP INDEX IDX_E98F2859FB0FC9A6 ON contract');
        $this->addSql('DROP INDEX IDX_E98F28599393F8FE ON contract');
        $this->addSql('DROP INDEX IDX_E98F28596BF700BD ON contract');
        $this->addSql('DROP INDEX IDX_E98F2859A76ED395 ON contract');
        $this->addSql('ALTER TABLE contract DROP category_id, DROP our_company_id, DROP partner_id, DROP status_id, DROP user_id');
    }
}
