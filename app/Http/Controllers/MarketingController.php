<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class MarketingController extends Controller
{
    /**
     * Display the Moda Italia marketing landing page.
     */
    public function index(): Response
    {
        return Inertia::render('Marketing', [
            'amazonUrl' => 'https://www.amazon.co.uk',
            'featured' => $this->featured(),
            'categories' => $this->categories(),
            'listings' => $this->listings(),
        ]);
    }

    /**
     * The hero-featured poster.
     *
     * @return array{id: int, title: string, place: string, price: string, originalPrice: ?string, size: string, inStock: bool}
     */
    private function featured(): array
    {
        return [
            'id' => 1,
            'title' => 'Seven Sisters Travel Poster',
            'place' => 'Cuckmere Haven, Sussex',
            'price' => '16.99',
            'originalPrice' => null,
            'size' => 'A4 / A3 / A2',
            'inStock' => true,
        ];
    }

    /**
     * Shop-by-region category cards.
     *
     * @return list<array{name: string, emoji: string, description: string, count: int}>
     */
    private function categories(): array
    {
        return [
            ['name' => 'Coastal', 'emoji' => '🌊', 'description' => 'Cliffs, coves and seaside towns.', 'count' => 18],
            ['name' => 'Cityscapes', 'emoji' => '🏙️', 'description' => 'Iconic British skylines and streets.', 'count' => 12],
            ['name' => 'Countryside', 'emoji' => '🌾', 'description' => 'Rolling hills, dales and moors.', 'count' => 15],
            ['name' => 'Landmarks', 'emoji' => '🏰', 'description' => 'Castles, piers and monuments.', 'count' => 9],
        ];
    }

    /**
     * The poster collection listing.
     *
     * @return list<array{id: int, title: string, place: string, price: string, originalPrice: ?string, size: string, inStock: bool}>
     */
    private function listings(): array
    {
        return [
            ['id' => 1, 'title' => 'Seven Sisters', 'place' => 'Cuckmere Haven, Sussex', 'price' => '16.99', 'originalPrice' => null, 'size' => 'A3', 'inStock' => true],
            ['id' => 2, 'title' => 'Durdle Door', 'place' => 'Jurassic Coast, Dorset', 'price' => '16.99', 'originalPrice' => '21.99', 'size' => 'A3', 'inStock' => true],
            ['id' => 3, 'title' => 'St Michael\'s Mount', 'place' => 'Marazion, Cornwall', 'price' => '18.99', 'originalPrice' => null, 'size' => 'A2', 'inStock' => true],
            ['id' => 4, 'title' => 'Brighton Palace Pier', 'place' => 'Brighton, East Sussex', 'price' => '15.99', 'originalPrice' => null, 'size' => 'A3', 'inStock' => true],
            ['id' => 5, 'title' => 'Lake Windermere', 'place' => 'Lake District, Cumbria', 'price' => '17.99', 'originalPrice' => null, 'size' => 'A2', 'inStock' => true],
            ['id' => 6, 'title' => 'Edinburgh Old Town', 'place' => 'Edinburgh, Scotland', 'price' => '16.99', 'originalPrice' => null, 'size' => 'A3', 'inStock' => false],
            ['id' => 7, 'title' => 'Bamburgh Castle', 'place' => 'Northumberland Coast', 'price' => '18.99', 'originalPrice' => '22.99', 'size' => 'A2', 'inStock' => true],
            ['id' => 8, 'title' => 'The Cotswolds', 'place' => 'Bibury, Gloucestershire', 'price' => '15.99', 'originalPrice' => null, 'size' => 'A3', 'inStock' => true],
        ];
    }
}
