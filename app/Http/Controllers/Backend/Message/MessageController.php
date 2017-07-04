<?php

namespace App\Http\Controllers\Backend\Message;

use App\Http\Requests\Backend\Message\ManageMessageRequest;
use App\Models\Message\Message;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;

class MessageController extends Controller
{
    /**
     * @param ManageMessageRequest $request
     *
     * @return mixed
     */
    public function index(ManageMessageRequest $request)
    {
        return view('backend.messages.index');
    }

    public function table()
    {
        $messages = Message::select(['id', 'name', 'email', 'status', 'created_at']);

        return Datatables::of($messages)
            ->editColumn('name', function ($message) {
                return view('backend.messages.unread-label', ['message' => $message]);
            })
            ->editColumn('created_at', function ($message) {
                return $message->created_at ? with(new Carbon($message->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($message) {
                return '<a href="' . route('admin.message.show', array('message' => $message->id)) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"></i></a>
                ';
            })
            ->rawColumns(['actions', 'name'])
            ->make(true);
    }

    /**
     * @param Message $message
     *
     * @return mixed
     */
    public function show(Message $message)
    {
        $message->status = 1;
        $message->save();

        return view('backend.messages.show', [
            'message' => $message,
        ]);
    }

    /**
     * @param Message $message
     * @param ManageMessageRequest $request
     *
     * @return mixed
     */
    public function destroy(Message $message, ManageMessageRequest $request)
    {
        $this->message->delete($message);

        return redirect()->route('admin.message.index')->withFlashSuccess(trans('alerts.backend.message.deleted'));
    }
}
