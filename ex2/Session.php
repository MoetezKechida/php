
<?php
    class Session{
        private $session;
        private $sessionid;
        
        public function __construct()
        {
            if(session_status() !== PHP_SESSION_ACTIVE) session_start();
            $this->session=&$_SESSION;
            $this->sessionid = session_id();
        }

        public function start() {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
        }

        public function set($key, $value) {
            $this->session[$key] = $value;
        }

        public function isset($key)
        {
            if(isset($this->session[$key]))
            {
                return true;
            }
            else 
            {
                return false;
            }
        }

        public function get($key) {
            if (isset($this->session[$key])) 
            {
                return  $this->session[$key];
            } 
            else 
            {
                return null;
            }
        }

        public function status(){
            return session_status();
        }

        public function remove($key) {
            if (isset($this->session[$key])) {
                unset($this->session[$key]);
            }
        }

        public function getSessionId()
        {
            return $this->sessionid;
        }

        public function destroy()
        {
            if($this->status() === PHP_SESSION_ACTIVE) {
                session_unset();
                session_destroy();
                $this->sessionid=NULL;
            }
        }
        
    }
?>

