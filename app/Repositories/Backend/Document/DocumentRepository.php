<?php

namespace App\Repositories\Backend\Document;

use App\Models\Document\Document;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Document\DocumentCreated;
use App\Events\Backend\Document\DocumentDeleted;
use App\Events\Backend\Document\DocumentUpdated;

/**
 * Class DocumentRepository.
 */
class DocumentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Document::class;

    /**
     * @param string $document_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($document_by = 'sort', $sort = 'asc')
    {
        return $this->query()
            ->DocumentBy($document_by, $sort)
            ->get();
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('documents_table') . '.id',
                config('documents_table') . '.name',
                config('documents_table') . '.type',
                config('documents_table') . '.link',
                config('documents_table') . '.created_at',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        DB::transaction(function () use ($input) {
            $document = self::MODEL;
            $document = new $document();
            $document->type = $input['type'];
            $document->name = $input['name'];
            $document->link = $input['link'];

            if ($document->save()) {
                event(new DocumentCreated($document, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.documents.create_error'));
        });
    }


    /**
     * @param Model $document
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $document, array $input)
    {
        DB::transaction(function () use ($document, $input) {
            $document->name = $input['name'];
            $document->link = $input['link'];
            $document->type = $input['type'];

            if ($document->save()) {

                event(new DocumentUpdated($document, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.documents.update_error'));
        });
    }

    /**
     * @param Model $document
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $document)
    {
        DB::transaction(function () use ($document) {

            if ($document->delete()) {
                event(new DocumentDeleted($document));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.documents.delete_error'));
        });
    }
}
