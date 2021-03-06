<?php 
namespace Yang;
class Hash {
    const HASH = PASSWORD_BCRYPT;
    const COST = 12;

	public static function hash($password){
		$passwordHash = password_hash($password, self::HASH, ['cost'=>self::COST]);
		if(password_needs_rehash($passwordHash, self::HASH, ['cost'=>self::COST])){
			$passwordHash = self::hash($password);
		}
		return $passwordHash;
	}

	public static function verify($password, $passwordHash){
		if(password_verify($password, $passwordHash)) return true;
		return '0';
	}
}
 ?>