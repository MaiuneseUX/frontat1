<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Track;

class AlbumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            // Adicione os outros álbuns e faixas conforme necessário
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
                    'duration' => '3:00', // Defina a duração da faixa conforme necessário
                ]);
            }
        }
    }
}
