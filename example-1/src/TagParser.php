<?php

namespace App;

class TagParser 
{
    public function parse(string $tags): array
    {
        // return [$tags];
        // return explode(', ', $tags);

        // ! keterangan:
        /**
         * tanda / awal dan tanda / akhir itu tanda mulai dan akhir
         * tanda koma (,)   : split berdasarkan koma
         * tanda tanya (?)  : karakter sebelumnya itu opsional (boleh ada boleh tidak), contoh disitu karakter sebelumnya adalah spasi
         * tanda yang dikurung [] : karakter yang dikurung itu harus ada, contoh disitu karakter yang dikurung adalah koma (,) dan pipe (|)
         */
        return preg_split('/ ?[,|-] ?/', $tags); // preg_split() adalah fungsi yang mengubah string menjadi array
    }
}