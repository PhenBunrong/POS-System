<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class BrandTestCrud extends TestCase
{
    public function setUp():void 
    {
        parent::setUp();

        //Login as Admin
        $this->post('/admin/login',['email'=>'superadmin@gmail.com','password'=>'12345678']);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function ViewList()
    {
        $brand = factory(Brand::class)->create()->toArray();

        $response = $this->get(route('brand.index'));

        $responseData = $response['crud']->getEntries()->toArray();
        // curd = crud::get,all 

        $response->assertViewIs('crud::list');

        $this->assertTrue($brand==end($responseData));
    }

    /** @test */
    public function ShowBrand()
    {
        $brand = factory(Brand::class)->create();
        
        $response = $this->get(route('brand.show', $brand->id));

        $response->assertViewIs('crud::show');
        $response->assertViewHas('entry', $brand);
    }

    /** @test */
    public function CreateBrand()
    {
        $brand = factory(Brand::class)->make()->toArray();

        $response = $this->post(route('brand.store', $brand));

        $response->assertRedirect('/admin/brand');
        $this->assertDatabaseHas('brands', $brand);
    }

    /** @test */
    public function UpdateBrand()
    {
        $brand = factory(Brand::class)->create();

        $brandEdit = factory(Brand::class)->make(
            [
                'id' => $brand->id
            ]
        )->toArray();

        $response = $this->put(route('brand.update',$brand->id),$brandEdit);
        $response->assertRedirect('admin/brand');
        $this->assertDatabaseHas('brands', $brandEdit);
    }

    /** @test */
    public function DeleteBrand()
    {
        $brand = factory(Brand::class)->create();

        $response = $this->delete(route('brand.destroy', $brand->id));
        $response->assertSuccessful();
        $this->assertDatabaseMissing('brands', $brand->toArray());
    }

    /** @test */
    public function ValidateNullName()
    {
        $brand = factory(Brand::class)->make(['name' => null])->toArray();

        $response = $this->post(route('brand.store', $brand));
        $response->assertSessionHasErrors(['name' => 'The name field is required.']);
    }

    /** @test */
    public function ValidateMust2CharactName()
    {
        $brand = factory(Brand::class)->make(['name' => 'a'])->toArray();

        $response = $this->post(route('brand.store', $brand));
        $response->assertSessionHasErrors(['name' => 'The name must be at least 2 characters.']);
    }

    /** @test */
    public function ValidateMust50CharactName()
    {
        $brand = factory(Brand::class)->make(['name' => \Str::random(51)])->toArray();

        $response = $this->post(route('brand.store', $brand));
        
        $response->assertSessionHasErrors(['name'=>'The name may not be greater than 50 characters.']);
    }
}
