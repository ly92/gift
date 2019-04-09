<?php

use Faker\Generator as Faker;
use App\Models\Post;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $images = ['about-bg.jpg', 'content-bg.jpg', 'home-bg.jpg', 'post-bg.jpg'];
    $title = $faker->sentence(mt_rand(3, 10));
    return [
        'title' => $title,
        'subtitle' => str_limit($faker->text(200), 252),
        'content_raw' => join("\n\n", $faker->paragraphs(mt_rand(3,6))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        'page_image' => $images[mt_rand(0, 3)],
        'meta_description' => "Meta for $title",
        'is_draft' => false,
    ];
});


