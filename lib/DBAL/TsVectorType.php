<?php
namespace PBald\PostgreSearchBundle\DBAL;
 
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
 
class TsVectorType extends Type
{
    public function getName()
    {
        return 'tsvector';
    }
 
    public function canRequireSQLConversion()
    {
        return true;
    }
 
    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return "TSVECTOR";
    }
 
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }
 
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform)
    {
        return sprintf("to_tsvector('russian',%s)", $sqlExpr);
    }
 
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (is_array($value)) {
            $value = implode(" ", $value);
        }
        return $value;
    }
}
