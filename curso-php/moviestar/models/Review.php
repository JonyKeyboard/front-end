<?php

    class Review {

        public $id;
        public $rating;
        public $review;
        public $users_id;
        public $movies_id;

    }

    interface ReviewDAOInterface {

        public function buildMovie($data);
        public function create(Movie $movie);
        public function update(Movie $movie);

    }