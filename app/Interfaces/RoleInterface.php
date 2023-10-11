<?php

namespace App\Interfaces;

interface RoleInterface {
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($id);

    public function delete($id);

}