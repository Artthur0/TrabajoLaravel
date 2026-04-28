<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{

    public function run(): void
    {
        $canciones = [
            ['titulo' => 'Starboy', 'artista' => 'The Weeknd', 'fecha' => '2016'],
            ['titulo' => 'Ella Baila Sola', 'artista' => 'Eslabon Armado, Peso Pluma', 'fecha' => '2023'],
            ['titulo' => 'Bohemian Rhapsody', 'artista' => 'Queen', 'fecha' => '1975'],
            ['titulo' => 'Monaco', 'artista' => 'Bad Bunny', 'fecha' => '2023'],
            ['titulo' => 'Blinding Lights', 'artista' => 'The Weeknd', 'fecha' => '2019'],
            ['titulo' => 'LALA', 'artista' => 'Myke Towers', 'fecha' => '2023'],
            ['titulo' => 'Thunderstruck', 'artista' => 'AC/DC', 'fecha' => '1990'],
            ['titulo' => 'Die With A Smile', 'artista' => 'Lady Gaga, Bruno Mars', 'fecha' => '2024'],
            ['titulo' => 'Qwerty', 'artista' => 'Linkin Park', 'fecha' => '2006'],
            ['titulo' => 'Godzilla', 'artista' => 'Eminem, Juice WRLD', 'fecha' => '2020'],
        ];

        foreach ($canciones as $cancion) {
            Song::create($cancion);
        }
    }
}
