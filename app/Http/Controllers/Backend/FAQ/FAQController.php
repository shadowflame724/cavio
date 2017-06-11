<?php

namespace App\Http\Controllers\Backend\FAQ;

use App\Http\Requests\Backend\FAQ\ManageFAQRequest;
use App\Http\Requests\Backend\FAQ\UpdateFAQRequest;
use App\Http\Requests\Backend\FAQ\StoreFAQRequest;
use App\Models\FAQ\FAQ;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\FAQ\FAQRepository;

class FAQController extends Controller
{

    /**
     * @var FAQRepository
     */
    protected $faq;

    /**
     * @param FAQRepository $faq
     */
    public function __construct(FAQRepository $faq)
    {
        $this->faq = $faq;
    }

    /**
     * @param ManageFAQRequest $request
     *
     * @return mixed
     */
    public function index(ManageFAQRequest $request)
    {
        return view('backend.faqs.index');
    }

    /**
     * @param ManageFAQRequest $request
     *
     * @return mixed
     */
    public function create(ManageFAQRequest $request)
    {
        return view('backend.faqs.create');
    }

    /**
     * @param StoreFAQRequest $request
     *
     * @return mixed
     */
    public function store(StoreFAQRequest $request)
    {
        $this->faq->create($request->only('question', 'answer'));

        return redirect()->route('admin.faq.index')->withFlashSuccess(trans('alerts.backend.faq.created'));
    }

    /**
     * @param FAQ $faq
     * @param ManageFAQRequest $request
     *
     * @return mixed
     */
    public function edit(FAQ $faq, ManageFAQRequest $request)
    {
        return view('backend.faqs.edit', [
            'faq' => $faq,
        ]);
    }

    /**
     * @param FAQ $faq
     * @param UpdateFAQRequest $request
     *
     * @return mixed
     */
    public function update(FAQ $faq, UpdateFAQRequest $request)
    {
        $this->faq->update($faq, $request->only('question', 'answer'));

        return redirect()->route('admin.faq.index')->withFlashSuccess(trans('alerts.backend.faq.updated'));
    }

    /**
     * @param FAQ $faq
     * @param ManageFAQRequest $request
     *
     * @return mixed
     */
    public function destroy(FAQ $faq, ManageFAQRequest $request)
    {
        $this->faq->delete($faq);

        return redirect()->route('admin.faq.index')->withFlashSuccess(trans('alerts.backend.faq.deleted'));
    }
}
