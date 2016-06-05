<?php
/**
 * @author Mohamed Saeed <msaeed027@gmail.com>
 */

class TelnetClient {

	private $fp;

	/**
	 * __construct
	 * 
	 * @param string $ip server ip or host
	 * @param string port
	 * @param integer timeout in seconds default 30 seconds
	 */
	public function __construct ($ip, $port, $timeout = 30) {
		
		$this->fp = stream_socket_client("tcp://$ip:$port", $errno, $errstr, $timeout);
		if (!$this->fp) {
			throw new Exception('$errstr ($errno)');
		}

    	stream_set_blocking($this->fp, true);
	}

	/**
	 * login
	 *
	 * @param string $login
	 * @param string $password
	 * @return string stream
	 */
	public function login ($login, $password) {
		$this->write($login);
		$this->write($password);
    	return $this->read();
	}

	/**
	 * exec
	 *
	 * @param string $cmd command to execute
	 * @return string stream
	 */
	public function exec ($cmd) {
		$this->write($cmd);
    	return $this->read();
	}

	/**
	 * eof
	 *
	 * end of file or you can say simulate clicking on enter provide cross-platform compatibility 
	 */
	public function eof () {
		return PHP_EOL;
	}

	/**
	 * read
	 *
	 * read entier stream
	 */
	private function read () {
		return stream_get_contents($this->fp);
	}

	/**
	 * write
	 *
	 * write and execute commands
	 */
	private function write ($cmd) {
		fwrite($this->fp, $cmd . PHP_EOL);
	}

}