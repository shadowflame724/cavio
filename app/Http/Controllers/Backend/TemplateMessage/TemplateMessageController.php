<?php

namespace App\Http\Controllers\Backend\TemplateMessage;

use App\Http\Requests\Backend\TemplateMessage\ManageTemplateMessageRequest;
use App\Http\Requests\Backend\TemplateMessage\UpdateTemplateMessageRequest;
use App\Http\Requests\Backend\TemplateMessage\StoreTemplateMessageRequest;
use App\Models\TemplateMessage\TemplateMessage;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\TemplateMessage\TemplateMessageRepository;
use Yajra\Datatables\Facades\Datatables;

class TemplateMessageController extends Controller
{

    /**
     * @var TemplateMessageRepository
     */
    protected $templateMessage;

    /**
     * @param TemplateMessageRepository $templateMessage
     */
    public function __construct(TemplateMessageRepository $templateMessage)
    {
        $this->templateMessage = $templateMessage;
    }

    /**
     * @param ManageTemplateMessageRequest $request
     *
     * @return mixed
     */
    public function index(ManageTemplateMessageRequest $request)
    {
        return view('backend.template_messages.index');
    }

    /**
     * @param ManageTemplateMessageRequest $request
     *
     * @return mixed
     */
    public function table(ManageTemplateMessageRequest $request)
    {
        return Datatables::of($this->templateMessage->getForDataTable())
            ->addColumn('actions', function ($templateMessage) {
                return '<a href="'.route('admin.template-messages.edit', array('templateMessage' => $templateMessage->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="'.route('admin.template-messages.destroy', array('templateMessage' => $templateMessage->id)).'"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="'.csrf_token().'">
</form>
</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * @param ManageTemplateMessageRequest $request
     *
     * @return mixed
     */
    public function create(ManageTemplateMessageRequest $request)
    {
        return view('backend.template_messages.create');
    }

    /**
     * @param StoreTemplateMessageRequest $request
     *
     * @return mixed
     */
    public function store(StoreTemplateMessageRequest $request)
    {
        $this->templateMessage->create($request->all());

        return redirect()->route('admin.template-messages.index')->withFlashSuccess(trans('alerts.backend.templateMessage.created'));
    }

    /**
     * @param TemplateMessage $templateMessage
     * @param ManageTemplateMessageRequest $request
     *
     * @return mixed
     */
    public function edit(TemplateMessage $templateMessage, ManageTemplateMessageRequest $request)
    {
        return view('backend.template_messages.edit', [
            'templateMessage' => $templateMessage,
        ]);
    }

    /**
     * @param TemplateMessage $templateMessage
     * @param UpdateTemplateMessageRequest $request
     *
     * @return mixed
     */
    public function update(TemplateMessage $templateMessage, UpdateTemplateMessageRequest $request)
    {
        $this->templateMessage->update($templateMessage, $request->all());

        return redirect()->route('admin.template-messages.index')->withFlashSuccess(trans('alerts.backend.templateMessage.updated'));
    }

    /**
     * @param TemplateMessage $templateMessage
     * @param ManageTemplateMessageRequest $request
     *
     * @return mixed
     */
    public function destroy(TemplateMessage $templateMessage, ManageTemplateMessageRequest $request)
    {
        $this->templateMessage->delete($templateMessage);

        return redirect()->route('admin.template-messages.index')->withFlashSuccess(trans('alerts.backend.templateMessage.deleted'));
    }
}
