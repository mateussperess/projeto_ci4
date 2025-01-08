<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = '';
    public string $fromName   = '';
    public string $protocol   = 'smtp';
    public string $SMTPHost   = '';
    public string $SMTPUser   = '';
    public string $SMTPPass   = '';
    public int $SMTPPort     = 587;
    public string $SMTPCrypto = 'tls';
    public string $mailType   = 'html';
    public bool $validate    = true;

    public function __construct()
    {
        $this->fromEmail = env('EMAIL_FROM');
        $this->fromName  = env('EMAIL_FROM_NAME');
        $this->SMTPHost  = env('EMAIL_SMTP_HOST');
        $this->SMTPUser  = env('EMAIL_SMTP_USER');
        $this->SMTPPass  = env('EMAIL_SMTP_PASS');
        $this->SMTPPort  = (int) env('EMAIL_SMTP_PORT', 587);
    }
}
