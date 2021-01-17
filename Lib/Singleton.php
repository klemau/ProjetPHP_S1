namespace Tool/Singleton;

class Singleton
{
	private static $singleton = null;

	private function __construct(){}

	public static function getInstance(){
		if (self::$singleton == null)
			self::$singleton = new Singleton;
		return self::$singleton;
	} 
}