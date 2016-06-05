# TelnetClient

### Using this library as simple as that:

    $telnetClient = new TelnetClient("127.0.0.1", "23");
    echo $telnetClient->login("telnet", "telnet");
    echo $telnetClient->exec("dir");

#### TelnetClient contractor have three paramters:

    * string $ip server ip or host
    * string port
    * integer timeout in seconds default 30 seconds

#### login method have two paramters:

    * string $login
    * string $password

    ##### return string represent stream

#### exec method have one paramter:

    * string $cmd command to execute

    ##### return string represent stream