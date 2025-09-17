<?php

namespace neyric\Qonto\Model;

class Attachment
{
    public string $id;

    /**
     * @var \DateTime
     */
    public \DateTime $created_at;

    public string $file_name;

    /**
     * @var string
     * NOTE: the api doc specifize int, but it is not the case
     */
    public string $file_size;

    public string $file_content_type;

    public string $url;
}