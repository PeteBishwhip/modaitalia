<?php

use Inertia\Testing\AssertableInertia as Assert;

it('renders the marketing landing page with listings and categories', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('Marketing')
            ->has('featured')
            ->has('categories', 4)
            ->has('listings', 8)
            ->where('listings.0.title', 'Seven Sisters')
            ->has('listings.0.inStock')
        );
});
