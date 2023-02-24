<?php

namespace App;

class Ldap
{

    protected $connection;

    public function __construct()
    {
        $this->connection = ldap_connect(env('LDAP_SERVER'));

        ldap_set_option($this->connection, LDAP_OPT_PROTOCOL_VERSION, env('LDAP_VERSION'));
    }

    public function bind($username, $password)
    {
        return @ldap_bind($this->connection, $username, $password);
    }
    public function validCredentials($username, $password)
    {
        return $this->bind($username, $password);
    }


    public function search_user($username)
    {
        $entries = null;

        $filter = "(uid=$username)";
        $result = ldap_search($this->connection, env('LDAP_BASE_DN'), $filter) or exit("No se puede realizar la busqueda");
        $entries = ldap_first_entry($this->connection, $result);

        return $entries;
    }
    public function getEmail($data)
    {
        $mail = ldap_get_values($this->connection, $data, 'mail');
        return $mail[0];
    }

    public function getUsername($data)
    {
        $user = ldap_get_values($this->connection, $data, 'uid');
        return $user[0];
    }

    public function getCommonName($data)
    {
        $cn = ldap_get_values($this->connection, $data, 'cn');
        return $cn[0];
    }

    public function getGivenName($data)
    {
        $gn = ldap_get_values($this->connection, $data, 'givenName');
        return $gn[0];
    }


}

?>