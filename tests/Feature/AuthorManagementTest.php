<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
     /** @test */
     public function an_author_can_be_created()
     {
        
         $this->withExceptionHandling();
         $this->post('/author', [
            'title' => 'Author Name',
            'dob' => '31/07/1997',
           ]);
           $author = Author::all();

           $this->assertCount(1, $author);
           $this->assertInstanceOf(Carbon::class, $author->first()->dob);
           $this->assertEquals('1997/31/07', $author->first()->dob->format('Y/d/m'));
     }
}
