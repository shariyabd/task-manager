<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Testing',
            'Development',
            'Design',
            'Marketing',
            'Sales',
            'Customer Support',
            'Finance',
            'Human Resources',
            'Project Management',
            'Quality Assurance',
            'Research and Development',
            'Operations',
            'Content Creation',
            'Legal',
            'Health and Safety',
            'Training and Education',
            'Event Planning',
            'Public Relations',
            'IT Management',
            'Product Management',
            'Other',
        ];

        foreach ($categories as $category) {
            $slug = Str::slug($category);
            Category::create([
                'name' => $category,
                'slug' => $slug
        
        ]);
        }
    }
}
