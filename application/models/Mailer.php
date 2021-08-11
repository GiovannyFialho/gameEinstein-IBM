<? if (!defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

Class Mailer extends CI_Model {

    private $mail;
    private $host;
    private $from;
    private $name;
    private $userName;
    private $password;
    private $port;
    private $secure;
    public $to;
    public $subject;
    public $template;
    
    public function initialize($to, $subject, $template)
    {
        $this->load->library('phpmailer_lib');
        
        $this->mail = $this->phpmailer_lib->load();
        $this->host = MAIL_HOST;
        $this->from = MAIL_FROM;
        $this->name = MAIL_NAME;
        $this->userName = MAIL_USER;
        $this->password = MAIL_PASS;
        $this->port = MAIL_PORT;
        $this->secure = MAIL_SECURE;
        $this->to = $to;
        $this->subject = $subject;
        $this->template = $template;
    }

    public function send () {
        
        try {
            // SMTP configuration
            $this->mail->isSMTP();
            $this->mail->SMTPAuth = true;
            $this->mail->Host     = $this->host;
            $this->mail->Username = $this->userName;
            $this->mail->Password = $this->password;
            $this->mail->SMTPSecure = $this->secure;
            $this->mail->SMTPAutoTLS = $this->secure;
            $this->mail->Port     = $this->port;
            $this->mail->CharSet  = "UTF-8";
    
            $this->mail->setFrom($this->from,$this->name);
            
            // Add a recipient
            $this->mail->addAddress($this->to);
    
            // Email subject
            $this->mail->Subject = $this->subject;
    
            // Set email format to HTML
            $this->mail->isHTML(true);
    
            // Email body content
            $this->mail->Body = $this->template;

            if ($this->mail->send()) {
                return true;
            }
        } catch (Exception $e) {
            return $e->errorMessage();
        }

        
    }
}