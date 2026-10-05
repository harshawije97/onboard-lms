<?php

namespace App\Enums;

enum ContentType: string
{
    case DOCS = 'documents';
    case VIDEOS = 'videos';
    case AUDIOS = 'audios';
    case EXTERNAL = 'external_resources';
    case PRESENTATION = 'presentation_videos';
}
