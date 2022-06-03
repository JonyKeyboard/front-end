<?php

    class Movie {

        public $id;
        public $title;
        public $description;
        public $image;
        public $trailer;
        public $category;
        public $lenght;
        public $user_id;

    }

    interface MovieDAOInterface {

        public function buildMovie($data);
        public function create(Movie $movie);
        public function update(Movie $movie);

    }