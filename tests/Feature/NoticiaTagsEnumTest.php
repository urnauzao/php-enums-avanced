<?php

namespace Tests\Feature;

use App\Enums\NoticiaTagsEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=NoticiaTagsEnumTest
# sail artisan test --filter=NoticiaTagsEnumTest
class NoticiaTagsEnumTest extends TestCase
{
    # sail artisan test --filter=NoticiaTagsEnumTest::test_get_value
    public function test_get_value(){
        $this->assertEquals("Mercado Livre", NoticiaTagsEnum::ML->value);
    }

    # sail artisan test --filter=NoticiaTagsEnumTest::test_main_enum
    public function test_main_enum(){
        $enums = NoticiaTagsEnum::cases();
        $this->assertNotEmpty($enums);
        // dump($enums);
    }

    # sail artisan test --filter=NoticiaTagsEnumTest::test_function_type
    public function test_function_type(){
        $enum = NoticiaTagsEnum::ML;
        $result = $this->onlyNoticiaTagsEnum($enum);
        $this->assertNotEmpty($result);
        $this->assertEquals($enum->value, $result);
    }

    public function onlyNoticiaTagsEnum(NoticiaTagsEnum $enum){
        return $enum->value;
    }

    # sail artisan test --filter=NoticiaTagsEnumTest::test_get_by_id
    public function test_get_by_id(){
        $enum = NoticiaTagsEnum::getById(10);
        $this->assertEquals('Magazine Luiza', $enum->value);
        $this->assertEquals(10, $enum->id());
        // NoticiaTagsEnum::MAGALU->id();
    }

    # sail artisan test --filter=NoticiaTagsEnumTest::test_get_value_by_id
    public function test_get_value_by_id(){
        $enum = NoticiaTagsEnum::getValueById(10);
        $this->assertEquals('Magazine Luiza', $enum);
    }

    # sail artisan test --filter=NoticiaTagsEnumTest::test_access_by_const
    public function test_access_by_const(){
        $enum = NoticiaTagsEnum::MAGAZINELUIZA;
        $this->assertEquals('Magazine Luiza', $enum->value);
    }

    # sail artisan test --filter=NoticiaTagsEnumTest::test_by_tag
    public function test_by_tag(){
        $enum = NoticiaTagsEnum::getByTag("Mercado Livre");
        $this->assertEquals(NoticiaTagsEnum::MERCADOLIVRE->value, $enum->value);
    }

    # sail artisan test --filter=NoticiaTagsEnumTest::test_dynamic_key
    public function test_dynamic_key(){
        $key = "LEROYMERLIN";
        $enum = NoticiaTagsEnum::fromName($key);
        $this->assertEquals(NoticiaTagsEnum::LEROYMERLIN->value, $enum->value);
    }

    # sail artisan test --filter=NoticiaTagsEnumTest::test_with_interface
    public function test_with_interface(){
        $key = "LEROYMERLIN";
        $enum1 = NoticiaTagsEnum::fromName($key);
        $this->assertTrue($enum1->isActive());
        $enum2 = NoticiaTagsEnum::SHOPEE;
        $this->assertFalse($enum2->isActive());
        $enum3 = NoticiaTagsEnum::MERCADOLIVRE;
        $this->assertTrue($enum3->isActive());
    }
}
