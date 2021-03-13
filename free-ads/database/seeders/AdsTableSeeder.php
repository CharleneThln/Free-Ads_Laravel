<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsTableSeeder extends Seeder
{    
    static $title = [
        'Peluche Totoro',
        'Cours de code',
        'Peluche Fluffy',
        'Vélo',
        'Lego Duplo',
        'Collection DVD Ghibli',
        'Ordi Ubuntu qui ne bug jamais',
        'Service de création de site web'
    ];

    static $slug = [
        'Une peluche collector géante de Mon Voisin Totoro, en très bon état.',
        'Propose cours de code - PHP, Laravel, Apache...',
        'Très belle peluche qui fera le bonheur de tous.',
        'Vélo électrique idéal pour circuler en milieu urbain.',
        'Vends set de lego pour enfant, pas cher.',
        'Tous les films réalisés par le célèbre studio japonais.',
        'Un ordi tout bien paramétré, garanti sans aucun bug possible',
        'Réalisation de site web magnifiques et sécurisés'
    ];

    static $content = [
        'Une peluche collector géante de Mon Voisin Totoro, en très bon état. Une peluche collector géante de Mon Voisin Totoro, en très bon état. Une peluche collector géante de Mon Voisin Totoro, en très bon état. Une peluche collector géante de Mon Voisin Totoro, en très bon état.',
        'Propose cours de code - PHP, Laravel, Apache... Propose cours de code - PHP, Laravel, Apache... Propose cours de code - PHP, Laravel, Apache... Propose cours de code - PHP, Laravel, Apache...',
        'Très belle peluche qui fera le bonheur de tous. Très belle peluche qui fera le bonheur de tous. Très belle peluche qui fera le bonheur de tous. Très belle peluche qui fera le bonheur de tous. Très belle peluche qui fera le bonheur de tous.',
        'Vélo électrique idéal pour circuler en milieu urbain. Vélo électrique idéal pour circuler en milieu urbain.Vélo électrique idéal pour circuler en milieu urbain.Vélo électrique idéal pour circuler en milieu urbain.',
        'Vends set de lego pour enfant, pas cher Vends set de lego pour enfant, pas cher Vends set de lego pour enfant, pas cher Vends set de lego pour enfant, pas cher Vends set de lego pour enfant, pas cher',
        'Tous les films réalisés par le célèbre studio japonais.Tous les films réalisés par le célèbre studio japonais.Tous les films réalisés par le célèbre studio japonais.Tous les films réalisés par le célèbre studio japonais.Tous les films réalisés par le célèbre studio japonais.',
        'Un ordi tout bien paramétré, garanti sans aucun bug possibleUn ordi tout bien paramétré, garanti sans aucun bug possibleUn ordi tout bien paramétré, garanti sans aucun bug possibleUn ordi tout bien paramétré, garanti sans aucun bug possible',
        'Réalisation de site web magnifiques et sécurisésRéalisation de site web magnifiques et sécurisésRéalisation de site web magnifiques et sécurisésRéalisation de site web magnifiques et sécurisés Réalisation de site web magnifiques et sécurisés'
    ];

    static $image = [
        'https://www.ma-peluche.fr/wp-content/uploads/2020/09/ttm.jpg',
        'https://c8.alamy.com/compfr/2c7dttg/concept-de-formation-a-la-securite-des-donnees-et-a-la-programmation-homme-ecrivant-du-code-php-sur-le-tableau-blanc-2c7dttg.jpg',
        'https://cdn.shopify.com/s/files/1/0279/5752/6562/products/Doudou-Licorne-br--XXL-85-cm-Badyba-les-meilleurs-doudous-1606672082_2000x.jpg?v=1606672089',
        'https://static1.altermove.com/30917-large_default/velo-de-ville-electrique-vog-city-origin-21.jpg',
        'https://www.lego.com/cdn/cs/set/assets/blt0cbaea95ab6a4456/10895.jpg?fit=bounds&format=jpg&quality=80&width=1500&height=1500&dpr=1',
        'https://images-eu.ssl-images-amazon.com/images/I/517REC18J1L.__AC_SX300_SY300_QL70_ML2_.jpg',
        'https://www.materiel-informatique-occasion.com/images/pz_station-de-travail-occasion-hp-z840-2x-xeon-e5-2670v3-2-x-12-cores-128go-ram-ecc-512go-ssd-nvidia-rtx2070-super-windows10-pro-64bits-garantie-2-ans_4444.jpg', 
        'https://www.poush.be/wp-content/uploads/2019/02/blog-responsive-design.jpg'
    ];

    static $userid = [1, 2, 3, 4, 5, 1, 2, 2];

    static $price = [12, 75, 15, 970, 40, 80, 200, 350 ];

    static $location = ['Marseille', 'Bali', 'Aix-en-Provence', 'Marseille', 'Aix-en-Provence', 'Marseille', 'Bali', 'Bali'];

    static $category_id = [2, 1, 2, 3, 2, 4, 5, 1];

    public function run()
    {
        
        DB::table('ads')->delete();

        for ($i = 0; $i < sizeof(AdsTableSeeder::$title); $i++) {
            DB::table('ads')->insert([
                'title' => AdsTableSeeder::$title[$i],
                'slug' => AdsTableSeeder::$slug[$i],
                'content' => AdsTableSeeder::$content[$i],
                'image' => AdsTableSeeder::$image[$i],
                'users_id' => AdsTableSeeder::$userid[$i],   //users_id aurait du être nommé user_id 
                "created_at" => now(),
                'deleted_at' => NULL,
                'price' => AdsTableSeeder::$price[$i],
                'location' => AdsTableSeeder::$location[$i],
                'categories_id' => AdsTableSeeder::$category_id[$i]
            ]);

        }
        
    }
}
