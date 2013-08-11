<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReadEmail
 *
 * @author nngao
 */
class ReadEmail {
    public function readEmails(){
        /* connect to gmail */
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'etagsaas@gmail.com';
        $password = 'achacha123@$';

        /* try to connect */
        $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

        /* grab emails */
        $emails = imap_search($inbox,'ALL');

        /* if emails are returned, cycle through each... */
        if($emails) {
                /* put the newest emails on top */
          rsort($emails);

        } 

        
        /* return emails array */
        return array('emails'=>$emails,'inbox'=>$inbox);
    }
}

?>
