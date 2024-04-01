<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar álbuns e faixas
        $albums = [
            [
                'name' => 'Tião Carreiro e Pardinho (1972)',
                'tracks' => [
                    'Boi Soberano',
                    'Rei do Gado',
                    'Amargurado',
                    'Pagode em Brasília',
                ]
            ],
            [
                'name' => 'Coração do Brasil (1975)',
                'tracks' => [
                    'Amor e Saudade',
                    'Beijinho Doce',
                    'Pardinho Matador',
                    'Fogo de Amor',
                ]
            ],
            // Adicionar mais álbuns conforme necessário
        ];

        foreach ($albums as $albumData) {
            $album = Album::create([
                'name' => $albumData['name'],
                'release_year' => substr($albumData['name'], -5, 4), // Extrair o ano do nome do álbum
            ]);

            foreach ($albumData['tracks'] as $trackTitle) {
                Track::create([
                    'title' => $trackTitle,
                    'album_id' => $album->id,
                ]);
            }
        }
    }
}
