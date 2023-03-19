<?php
namespace App\Repositories;

use App\Models\VisaDocument;
use App\Repositories\Interfaces\VisaDocumentRepositoryInterface;

class VisaDocumentRepository implements VisaDocumentRepositoryInterface
{
    public function create($userId, $documentPath, $documentType)
    {
        $visaDocument = new VisaDocument;
        $visaDocument->user_id = $userId;
        $visaDocument->document_file = $documentPath;
        $visaDocument->document_type = $documentType;
        $visaDocument->save();
    }
}