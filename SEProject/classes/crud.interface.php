<?php

namespace core\logic;

interface Crud
{
	public function create($object);
	public function read($id=-1);
	public function update($object, $id);
	public function delete($id);
}