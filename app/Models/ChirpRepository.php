<?php

interface ChirpRepository {
    public function getAllChirps();
    public function getChirpById($id);
    public function createChirp(Chirp $chirp);

}
?>
