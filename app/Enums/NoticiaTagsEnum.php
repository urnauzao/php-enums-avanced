<?php
namespace App\Enums;

use App\Interfaces\AtivoInterface;

enum NoticiaTagsEnum:string implements AtivoInterface
// enum NoticiaTagsEnum:string
{
    case NOTICIA = 'Notícia';
    case CONTAS = 'Contas';
    case NOVIDADES = 'Novidades';
    case CERTIFICADO_EXPIRANDO = 'Certificado Expirando';
    case CERTIFICADO_VENCIDO = 'Certificado Vencido';
    case CONTA_INATIVADA = 'Conta inativada';

    case ML = 'Mercado Livre';
    case AMERICANAS = 'Americanas Marketplace';
    case KABUM = 'Kabum';
    case AMAZON = 'Amazon';
    case MADEIRAMADEIRA = 'Madeira Madeira';
    case LEROYMERLIN = 'Leroy Merlin';
    case SHEEN = 'Sheen';
    case ALIEXPRESS = 'Ali Express';
    case VIA = 'Via';
    case MAGALU = 'Magazine Luiza';
    case NETSHOES = 'Netshoes';
    case SHOPEE = 'Shopee';
    case DESCONHECIDO = 'Desconhecido';

    public const MAGAZINELUIZA = self::MAGALU;
    public const MERCADOLIVRE = self::ML;
    
    public function id() : int {
        return match ($this){
            self::ML => 1,
            self::AMERICANAS => 2,
            self::KABUM => 3,
            self::AMAZON => 4,
            self::MADEIRAMADEIRA => 5,
            self::LEROYMERLIN => 6,
            self::SHEEN => 7,
            self::VIA => 8,
            self::ALIEXPRESS => 9,
            self::MAGALU => 10,
            self::NETSHOES => 10,
            self::SHOPEE => 12,
            default => 0
        };
    }

    public static function getById(int $id) : self
    {
        return match ($id){
            1 => self::ML,
            2 => self::AMERICANAS,
            3 => self::KABUM,
            4 => self::AMAZON,
            5 => self::MADEIRAMADEIRA,
            6 => self::LEROYMERLIN,
            7 => self::SHEEN,
            8 => self::VIA,
            9 => self::ALIEXPRESS,
            10 => self::MAGALU,
            10 => self::NETSHOES,
            12 => self::SHOPEE,
            default => self::DESCONHECIDO
        };
    }

    public static function getValueById(int $id) : string
    {
        return match ($id){
            1 => self::ML->value,
            2 => self::AMERICANAS->value,
            3 => self::KABUM->value,
            4 => self::AMAZON->value,
            5 => self::MADEIRAMADEIRA->value,
            6 => self::LEROYMERLIN->value,
            7 => self::SHEEN->value,
            8 => self::VIA->value,
            9 => self::ALIEXPRESS->value,
            10 => self::MAGALU->value,
            10 => self::NETSHOES->value,
            12 => self::SHOPEE->value,
            default => self::DESCONHECIDO->value
        };
    }

    public static function getByTag(string $tag) : self {
        // O método TryFrom() traduz uma string ou int no caso de enum correspondente, se houver.
        // Se não houver um caso correspondente definido, ele retornará nulo.
        // Enquanto o ::from lança uma exception se não existir, o ::tryFrom retorna nulo.
        return self::tryFrom( trim($tag) ) ?? self::DESCONHECIDO;
    }

    public function isActive(): bool
    {
        return match($this){
            self::ML, self::AMERICANAS, self::KABUM, self::AMAZON, self::MADEIRAMADEIRA, self::LEROYMERLIN => true,
            default => false
        };
    }

    public static function fromName(string $name){
        return constant("self::$name");
    }
}