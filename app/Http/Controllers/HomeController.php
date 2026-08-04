<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $announcements = [
            'Free shipping on all orders above $150',
            'New Apex Noir collection just dropped',
            'Limited Q3 intake now open — join the waitlist',
        ];

        $brand = [
            'name' => 'Parfume.me',
        ];

        $slides = [
            [
                'image' => asset('storage/image/mykonos1.png'),
                'title' => 'Mykonos Breeze',
                'subtitle' => 'Fresh citrus for focused mornings',
            ],
            [
                'image' => asset('storage/image/mykonos2.jpg'),
                'title' => 'Mykonos Noir',
                'subtitle' => 'Deep woods for late-night work',
            ],
            [
                'image' => asset('storage/image/mykonos3.jpg'),
                'title' => 'Mykonos Amber',
                'subtitle' => 'Warm tones for creative flow',
            ],
            [
                'image' => asset('storage/image/mykonos4.jpg'),
                'title' => 'Mykonos Reset',
                'subtitle' => 'Clean scent for a clear mind',
            ],
        ];

        $hero = [
            'headline' => 'Sophisticated <br> Productivity',
            'subheadline' => 'The scent-driven productivity system.',
            'description' => 'Combine your workflow tools with our exclusive fragrance line, crafted to sharpen focus and elevate performance.',
        ];

        $stats = [
            ['value' => '12K+', 'label' => 'ACTIVE USERS', 'desc' => 'Across 40+ countries'],
            ['value' => '98%', 'label' => 'SATISFACTION', 'desc' => 'Based on user surveys'],
            ['value' => '4.9', 'label' => 'AVG RATING', 'desc' => 'From verified reviews'],
            ['value' => '24/7', 'label' => 'SUPPORT', 'desc' => 'Always available'],
        ];

        $product = [
            'image' => asset('storage/image/Dinamist-parfu.me.JPG'),
            'tag' => 'Best Seller',
            'notes' => [
                ['label' => 'TOP NOTE', 'title' => 'Bergamot', 'desc' => 'Bright & sharp'],
                ['label' => 'HEART', 'title' => 'Cedarwood', 'desc' => 'Grounded & warm'],
                ['label' => 'BASE', 'title' => 'Musk', 'desc' => 'Long-lasting'],
            ],
            'variants' => [
                ['no' => '01', 'name' => 'EAU DE PARFUM'],
                ['no' => '02', 'name' => 'TRAVEL SIZE'],
                ['no' => '03', 'name' => 'GIFT SET'],
                ['no' => '04', 'name' => 'REFILL'],
            ],
        ];

        return view('customer.home', compact(
            'announcements',
            'brand',
            'slides',
            'hero',
            'stats',
            'product'
        ));
    }
}