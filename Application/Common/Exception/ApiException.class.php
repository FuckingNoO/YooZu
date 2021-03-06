<?php
	
	namespace Common\Exception;
	use Think\Exception;
	
	class ApiException extends Exception
	{
		private $extra;

        public function __construct($message, $code = 0, $extra = array())
      {
           parent::__construct($message, $code);
           $this->extra = $extra;
      }

        public function getExtra()
      {
           return $this->extra;
      }

	}
