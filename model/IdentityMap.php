<?php
/*
 * This file is part of SPF.
 *
 * Copyright (c) 2011 Simon Downes <simon@simondownes.co.uk>
 * 
 * Distributed under the MIT License, a copy of which is available in the
 * LICENSE file that was bundled with this package, or online at:
 * https://github.com/simon-downes/spf
 */

namespace spf\model;

/**
 * IdentityMap acts as a request-level cache for domain objects, to ensure that only
 * one instance of an object exists.
 */
class IdentityMap {
	
	protected $store;
	
	public function __construct() {
		$this->store = array();
	}
	
	public function has( $id ) {
		return isset($this->store[$id]);
	}
	
	public function set( $id, $object ) {
		$this->store[$id] = $object;
	}
	
	public function get( $id ) {
		
		if( !$this->has($id) )
			throw new Exception("Object not found: '$id'");
		
		return $this->store[$id];
		
	}
	
	public function has_object( $object ) {
		return $this->has($object->getId());
	}
	
	public function get_object( $object ) {
		return $this->get($object->getId());
	}
	
}

// EOF