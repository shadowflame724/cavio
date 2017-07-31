<?php

namespace App\Http\Controllers\Backend\Document;

use App\Http\Requests\Backend\Document\ManageDocumentRequest;
use App\Http\Requests\Backend\Document\UpdateDocumentRequest;
use App\Http\Requests\Backend\Document\StoreDocumentRequest;
use App\Models\Document\Document;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Document\DocumentRepository;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;


class DocumentController extends Controller
{

    /**
     * @var DocumentRepository
     */
    protected $document;

    /**
     * @param DocumentRepository $document
     */
    public function __construct(DocumentRepository $document)
    {
        $this->document = $document;
    }

    /**
     * @param ManageDocumentRequest $request
     *
     * @return mixed
     */
    public function index(ManageDocumentRequest $request)
    {
        return view('backend.documents.index');
    }
    
    public function table()
    {
        return Datatables::of($this->document->getForDataTable())
            ->editColumn('created_at', function ($document) {
                return $document->created_at ? with(new Carbon($document->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->editColumn('type', '
            @if($type == 0)
            DESIGN KIT
            @elseif($type == 1)
            PRESS KIT
            @else
            FLASH INFO
            @endif
            ')
            ->addColumn('actions', function ($document) {
                return '<a href="'.route('admin.documents.edit', array('document' => $document->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="'.route('admin.documents.destroy', array('document' => $document->id)).'"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="'.csrf_token().'">
</form>
</a>';
            })
            ->rawColumns(['actions', 'link', 'type'])
            ->make(true);
    }

    /**
     * @param ManageDocumentRequest $request
     *
     * @return mixed
     */
    public function create(ManageDocumentRequest $request)
    {
        return view('backend.documents.create');
    }

    /**
     * @param StoreDocumentRequest $request
     *
     * @return mixed
     */
    public function store(StoreDocumentRequest $request)
    {
        $this->document->create($request->all());

        return redirect()->route('admin.documents.index')->withFlashSuccess(trans('alerts.backend.documents.created'));
    }

    /**
     * @param Document $document
     * @param ManageDocumentRequest $request
     *
     * @return mixed
     */
    public function edit(Document $document, ManageDocumentRequest $request)
    {
        return view('backend.documents.edit', [
            'document' => $document,
        ]);
    }

    /**
     * @param Document $document
     * @param UpdateDocumentRequest $request
     *
     * @return mixed
     */
    public function update(Document $document, UpdateDocumentRequest $request)
    {
        $this->document->update($document, $request->all());

        return redirect()->route('admin.documents.index')->withFlashSuccess(trans('alerts.backend.documents.updated'));
    }

    /**
     * @param Document $document
     * @param ManageDocumentRequest $request
     *
     * @return mixed
     */
    public function destroy(Document $document, ManageDocumentRequest $request)
    {
        $this->document->delete($document);

        return redirect()->route('admin.documents.index')->withFlashSuccess(trans('alerts.backend.documents.deleted'));
    }
}
