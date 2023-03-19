<?php

namespace App\Repositories\Interfaces;

interface VisaDocumentRepositoryInterface
{
    public function create($userId, $documentPath, $documentType);

}