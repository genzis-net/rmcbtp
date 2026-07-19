<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Material;
use App\Models\Achievement;
use App\Models\Project;
use App\Models\Reference;
use App\Models\Album;
use App\Models\AlbumImage;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        $adminPassword = env('ADMIN_PASSWORD', 'password');

        User::updateOrCreate(
            ['email' => $adminEmail],
            [
                'name' => env('ADMIN_NAME', 'RMC BTP Admin'),
                'password' => Hash::make($adminPassword),
                'email_verified_at' => now(),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'Test Manager',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'is_admin' => false,
            ]
        );

        // Create Blog Posts (Articles) - matching actual table structure
        $blogPosts = [
            [
                'title_en' => 'Modern Construction Techniques in 2024',
                'title_fr' => 'Techniques de Construction Modernes en 2024',
                'content_en' => 'Discover the latest innovative construction techniques that are revolutionizing the building industry. From sustainable materials to smart construction methods, learn how modern technology is shaping the future of construction.',
                'content_fr' => 'Découvrez les dernières techniques de construction innovantes qui révolutionnent l\'industrie du bâtiment. Des matériaux durables aux méthodes de construction intelligentes, apprenez comment la technologie moderne façonne l\'avenir de la construction.',
                'status' => true,
            ],
            [
                'title_en' => 'Sustainable Architecture Solutions',
                'title_fr' => 'Solutions d\'Architecture Durable',
                'content_en' => 'Explore sustainable architecture solutions that reduce environmental impact while maintaining aesthetic appeal and functionality. Learn about green building materials and energy-efficient designs.',
                'content_fr' => 'Explorez les solutions d\'architecture durable qui réduisent l\'impact environnemental tout en maintenant l\'attrait esthétique et la fonctionnalité. Découvrez les matériaux de construction verts et les conceptions écoénergétiques.',
                'status' => true,
            ],
            [
                'title_en' => 'Project Management Best Practices',
                'title_fr' => 'Meilleures Pratiques de Gestion de Projet',
                'content_en' => 'Essential project management strategies for successful construction projects. From planning to execution, discover the key principles that ensure projects are completed on time and within budget.',
                'content_fr' => 'Stratégies essentielles de gestion de projet pour des projets de construction réussis. De la planification à l\'exécution, découvrez les principes clés qui garantissent que les projets sont terminés à temps et dans les limites du budget.',
                'status' => false,
            ],
        ];

        foreach ($blogPosts as $post) {
            $slug = Str::slug($post['title_en']);
            if (!Article::where('slug', $slug)->exists()) {
                Article::create([
                    'title_en' => $post['title_en'],
                    'title_fr' => $post['title_fr'],
                    'content_en' => $post['content_en'],
                    'content_fr' => $post['content_fr'],
                    'slug' => $slug,
                    'status' => $post['status'],
                    'user_id' => 1,
                ]);
            }
        }

        // Create Testimonials - matching actual table structure (client, content_en, content_fr)
        $testimonials = [
            [
                'client' => 'Jean Dupont - Dupont Construction',
                'content_en' => 'RMC BTP delivered exceptional quality work on our commercial project. Their attention to detail and professional approach exceeded our expectations.',
                'content_fr' => 'RMC BTP a livré un travail de qualité exceptionnelle sur notre projet commercial. Leur attention aux détails et leur approche professionnelle ont dépassé nos attentes.',
            ],
            [
                'client' => 'Marie Johnson - Johnson Real Estate',
                'content_en' => 'Outstanding service and craftsmanship. The team was punctual, efficient, and delivered results that truly impressed our clients.',
                'content_fr' => 'Service et savoir-faire exceptionnels. L\'équipe était ponctuelle, efficace et a livré des résultats qui ont vraiment impressionné nos clients.',
            ],
            [
                'client' => 'Paul Martin - Martin Developments',
                'content_en' => 'Professional team with excellent project management skills. They completed our renovation project ahead of schedule.',
                'content_fr' => 'Équipe professionnelle avec d\'excellentes compétences en gestion de projet. Ils ont terminé notre projet de rénovation avant les délais.',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        // Create References/Projects - matching actual table structure
        $references = [
            [
                'title_en' => 'Modern Office Complex',
                'title_fr' => 'Complexe de Bureaux Moderne',
                'content_en' => 'A state-of-the-art office complex featuring sustainable design and modern amenities',
                'content_fr' => 'Un complexe de bureaux ultramoderne avec un design durable et des équipements modernes',
                'client' => 'Douala Business Center',
                'year' => 2023,
                'project_type' => 'commercial',
                'location' => 'Douala, Cameroon',
                'user_id' => 1,
            ],
            [
                'title_en' => 'Luxury Residential Villa',
                'title_fr' => 'Villa Résidentielle de Luxe',
                'content_en' => 'Elegant luxury villa with premium finishes and smart home technology',
                'content_fr' => 'Villa de luxe élégante avec des finitions haut de gamme et la technologie de maison intelligente',
                'client' => 'Private Client',
                'year' => 2023,
                'project_type' => 'residential',
                'location' => 'Yaoundé, Cameroon',
                'user_id' => 1,
            ],
            [
                'title_en' => 'Industrial Warehouse',
                'title_fr' => 'Entrepôt Industriel',
                'content_en' => 'Large-scale industrial warehouse with advanced logistics systems',
                'content_fr' => 'Entrepôt industriel à grande échelle avec des systèmes logistiques avancés',
                'client' => 'Logistics Corp',
                'year' => 2023,
                'project_type' => 'industrial',
                'location' => 'Limbe, Cameroon',
                'user_id' => 1,
            ],
        ];

        foreach ($references as $reference) {
            Reference::create($reference);
        }

        // Create Albums - matching actual table structure (name, slug only)
        $albums = [
            [
                'name' => 'Construction Progress',
                'slug' => 'construction-progress',
            ],
            [
                'name' => 'Completed Projects',
                'slug' => 'completed-projects',
            ],
            [
                'name' => 'Team Gallery',
                'slug' => 'team-gallery',
            ],
        ];

        foreach ($albums as $album) {
            if (!Album::where('slug', $album['slug'])->exists()) {
                Album::create($album);
            }
        }

        $steel = Material::firstOrCreate(
            ['name_en' => 'Steel'],
            ['name_fr' => 'Acier']
        );
        $wood = Material::firstOrCreate(
            ['name_en' => 'Wood'],
            ['name_fr' => 'Bois']
        );

        $quinCat = Category::firstOrCreate(
            ['catalog' => Product::CATALOG_QUINCAILLERIE, 'name_en' => 'Fasteners'],
            ['name_fr' => 'Fixations', 'description_en' => 'Bolts, screws and hardware', 'description_fr' => 'Boulons, vis et quincaillerie']
        );
        $decorCat = Category::firstOrCreate(
            ['catalog' => Product::CATALOG_SIMS_DECOR, 'name_en' => 'Living room'],
            ['name_fr' => 'Salon', 'description_en' => 'Furniture for living spaces', 'description_fr' => 'Mobilier pour espaces de vie']
        );

        $quinSub = Subcategory::firstOrCreate(
            ['cat_id' => $quinCat->id, 'name_en' => 'Bolts'],
            ['name_fr' => 'Boulons']
        );
        $decorSub = Subcategory::firstOrCreate(
            ['cat_id' => $decorCat->id, 'name_en' => 'Sofas'],
            ['name_fr' => 'Canapés']
        );

        $products = [
            [
                'name' => 'Hex Bolt M10',
                'name_en' => 'Hex Bolt M10',
                'name_fr' => 'Boulon hexagonal M10',
                'catalog' => Product::CATALOG_QUINCAILLERIE,
                'subcat_id' => $quinSub->id,
                'material_id' => $steel->id,
                'id_number' => 'SQ-BOLT-M10',
                'uniq_id' => 'SQ-BOLT-M10',
                'quantity' => 500,
                'price' => 850,
                'is_featured' => true,
                'is_active' => true,
                'description_en' => 'Galvanized hex bolt, M10. Ideal for structural assemblies.',
                'description_fr' => 'Boulon hexagonal galvanisé, M10. Idéal pour les assemblages structurels.',
            ],
            [
                'name' => 'Wood Screw Pack',
                'name_en' => 'Wood Screw Pack',
                'name_fr' => 'Lot de vis à bois',
                'catalog' => Product::CATALOG_QUINCAILLERIE,
                'subcat_id' => $quinSub->id,
                'material_id' => $steel->id,
                'id_number' => 'SQ-SCREW-WOOD',
                'uniq_id' => 'SQ-SCREW-WOOD',
                'quantity' => 200,
                'price' => 3500,
                'is_active' => true,
                'description_en' => 'Assorted wood screws for cabinetry and framing.',
                'description_fr' => 'Vis à bois assorties pour menuiserie et ossature.',
            ],
            [
                'name' => 'Linen Sofa 3-Seater',
                'name_en' => 'Linen Sofa 3-Seater',
                'name_fr' => 'Canapé lin 3 places',
                'catalog' => Product::CATALOG_SIMS_DECOR,
                'subcat_id' => $decorSub->id,
                'material_id' => $wood->id,
                'id_number' => 'SD-SOFA-3',
                'uniq_id' => 'SD-SOFA-3',
                'quantity' => 8,
                'price' => 450000,
                'is_featured' => true,
                'is_active' => true,
                'description_en' => 'Comfortable 3-seater sofa in natural linen for modern living rooms.',
                'description_fr' => 'Canapé confortable 3 places en lin naturel pour salons modernes.',
            ],
            [
                'name' => 'Oak Side Table',
                'name_en' => 'Oak Side Table',
                'name_fr' => 'Table d\'appoint en chêne',
                'catalog' => Product::CATALOG_SIMS_DECOR,
                'subcat_id' => $decorSub->id,
                'material_id' => $wood->id,
                'id_number' => 'SD-TABLE-OAK',
                'uniq_id' => 'SD-TABLE-OAK',
                'quantity' => 15,
                'price' => 125000,
                'is_active' => true,
                'description_en' => 'Solid oak side table with a warm natural finish.',
                'description_fr' => 'Table d\'appoint en chêne massif avec une finition naturelle chaleureuse.',
            ],
            [
                'name' => 'Archived Sample Bolt',
                'name_en' => 'Archived Sample Bolt',
                'name_fr' => 'Boulon d\'échantillon archivé',
                'catalog' => Product::CATALOG_QUINCAILLERIE,
                'subcat_id' => $quinSub->id,
                'material_id' => $steel->id,
                'id_number' => 'SQ-ARCHIVED',
                'uniq_id' => 'SQ-ARCHIVED',
                'quantity' => 0,
                'price' => 100,
                'is_active' => false,
                'description_en' => 'Inactive product used to verify public catalog scoping.',
                'description_fr' => 'Produit inactif utilisé pour vérifier le filtrage du catalogue public.',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['uniq_id' => $product['uniq_id']],
                $product
            );
        }

        // Create Galleries data
        $galleries = [
            ['created_at' => now(), 'updated_at' => now()],
            ['created_at' => now(), 'updated_at' => now()],
            ['created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }

        // Create Achievements if table has more columns
        if (Schema::hasTable('achievements')) {
            try {
                $achievement_columns = collect(DB::select('DESCRIBE achievements'))->pluck('Field');
                if ($achievement_columns->contains('title_en')) {
                    $achievements = [
                        [
                            'title_en' => '500+ Projects Completed',
                            'title_fr' => '500+ Projets Terminés',
                            'description_en' => 'Successfully completed over 500 construction projects',
                            'description_fr' => 'Plus de 500 projets de construction terminés avec succès',
                            'number' => 500,
                            'icon' => 'fa-building',
                        ],
                        [
                            'title_en' => '15 Years Experience',
                            'title_fr' => '15 Ans d\'Expérience',
                            'description_en' => 'Over 15 years in construction industry',
                            'description_fr' => 'Plus de 15 ans dans l\'industrie de la construction',
                            'number' => 15,
                            'icon' => 'fa-calendar',
                        ],
                    ];

                    foreach ($achievements as $achievement) {
                        Achievement::create($achievement);
                    }
                } else {
                    // Simple achievements table
                    Achievement::create(['created_at' => now(), 'updated_at' => now()]);
                    Achievement::create(['created_at' => now(), 'updated_at' => now()]);
                }
            } catch (\Exception $e) {
                // Skip if there's an issue with achievements table
            }
        }

        $this->command->info('✅ Test data created successfully!');
        $this->command->info('📊 Created:');
        $this->command->info('   - 2 Users (admin + test manager)');
        $this->command->info('   - 3 Blog Posts (Articles)');
        $this->command->info('   - 3 Testimonials');
        $this->command->info('   - 3 References/Projects');
        $this->command->info('   - 3 Albums');
        $this->command->info('   - Categories/subcategories for Quincaillerie + Decor');
        $this->command->info('   - 4 active catalog products (+ 1 inactive)');
        $this->command->info('   - 3 Galleries');
        $this->command->info('   - 2+ Achievements');
        $this->command->info('');
        $this->command->info('🔑 Admin Login (from ADMIN_EMAIL / ADMIN_PASSWORD env):');
        $this->command->info('   Email: ' . $adminEmail);
        $this->command->info('   Password: (see ADMIN_PASSWORD in .env)');
    }
}
